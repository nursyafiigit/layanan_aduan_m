<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Member;

class LoanController extends Controller
{
    // Method untuk menampilkan daftar peminjaman
    public function create()
    {
        $members = Member::all(); // Get all members
        $books = Book::all(); // Get all books
        return view('loans.create', compact('members', 'books'));
    }
    public function edit($id)
    {
        $loan = Loan::findOrFail($id); // Menemukan data pinjaman berdasarkan ID
        $members = Member::all(); // Mengambil semua data anggota
        $books = Book::all(); // Mengambil semua data buku

        return view('loans.edit', compact('loan', 'members', 'books')); // Mengirim data ke view edit
    }



    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'loan_date' => 'required|date',
            'return_date' => 'required|date',
        ]);

        // Menemukan data pinjaman berdasarkan ID
        $loan = Loan::findOrFail($id);

        // Memperbarui data pinjaman
        $loan->member_id = $request->member_id;
        $loan->book_id = $request->book_id;
        $loan->loan_date = $request->loan_date;
        $loan->return_date = $request->return_date;
        $loan->status = 'borrowed'; // Misalnya, status masih 'borrowed' setelah update
        $loan->save(); // Menyimpan perubahan

        // Mengarahkan kembali ke halaman daftar dengan pesan sukses
        return redirect()->route('loans.index')->with('success', 'Peminjaman berhasil diperbarui!');
    }



    // Menyimpan data peminjaman buku
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'loan_date' => 'required|date',
            'return_date' => 'required|date',
        ]);

        // Menyimpan data peminjaman
        $loan = new Loan();
        $loan->member_id = $request->member_id;
        $loan->book_id = $request->book_id;
        $loan->loan_date = $request->loan_date;
        $loan->return_date = $request->return_date;
        $loan->status = 'borrowed'; // Status peminjaman 'borrowed'
        $loan->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('loans.index')->with('success', 'Buku berhasil dipinjam!');
    }


    // Menampilkan form atur pengembalian
    public function returnForm($id)
    {
        $loan = Loan::findOrFail($id);
        return view('loans.return', compact('loan'));
    }

    // Proses pengembalian buku
    public function returnBook(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);

        // Validasi tanggal pengembalian
        $request->validate([
            'actual_return_date' => 'required|date',
        ]);

        // Memperbarui status dan tanggal pengembalian
        $loan->status = 'returned';
        $loan->actual_return_date = $request->actual_return_date;
        $loan->save();

        // Menambahkan buku kembali ke stok
        $book = Book::findOrFail($loan->book_id);
        $book->increment('available');

        return redirect()->route('loans.create')->with('success', 'Buku berhasil dikembalikan!');
    }
    public function index()
    {
        // Fetch the loans and pass them to the view
        $loans = Loan::with('member', 'book')->get(); // Eager load related data (member and book)
        return view('loans.index', compact('loans'));
    }
    public function history()
    {
        // Mengambil semua data peminjaman dengan status 'returned' (pengembalian)
        $loans = Loan::where('status', 'returned')->get();

        return view('loans.history', compact('loans'));
    }

    public function destroy($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->delete();

        return redirect()->route('loans.index')->with('success', 'Peminjaman berhasil dihapus!');
    }
}
