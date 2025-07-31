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
        $books = Book::where('available', '>', 0)->get(); // Ambil buku yang tersedia
        $members = Member::all(); // Ambil semua anggota
        $loans = Loan::where('status', 'borrowed')->get(); // Ambil hanya peminjaman dengan status 'borrowed'

        return view('loans.create', compact('books', 'members', 'loans'));
    }

    // Menyimpan data peminjaman buku
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'loan_date' => 'required|date',
            'return_date' => 'required|date',
        ]);

        // Menyimpan data peminjaman
        Loan::create([
            'book_id' => $request->book_id,
            'member_id' => $request->member_id,
            'loan_date' => $request->loan_date,
            'return_date' => $request->return_date,
            'status' => 'borrowed',  // Statusnya adalah 'borrowed'
        ]);

        // Ambil data terbaru untuk ditampilkan
        $loans = Loan::where('status', 'borrowed')->get();

        // Kembalikan response dengan data terbaru
        return response()->json([
            'status' => 'success',
            'loans' => $loans
        ]);
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

    public function history()
    {
        // Mengambil semua data peminjaman dengan status 'returned' (pengembalian)
        $loans = Loan::where('status', 'returned')->get();

        return view('loans.history', compact('loans'));
    }
}
