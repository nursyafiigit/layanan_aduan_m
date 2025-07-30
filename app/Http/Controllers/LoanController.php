<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Member;

class LoanController extends Controller
{
    // Method untuk menampilkan daftar peminjaman
    public function index()
    {
        // Mengambil semua data peminjaman
        $loans = Loan::all();
        return view('loans.index', compact('loans')); // Menampilkan daftar peminjaman di view
    }
    // app/Http/Controllers/LoanController.php

    // app/Http/Controllers/LoanController.php

    public function returnBook(Request $request, $id)
    {
        // Menemukan peminjaman berdasarkan ID
        $loan = Loan::findOrFail($id);

        // Validasi tanggal pengembalian
        $request->validate([
            'actual_return_date' => 'required|date',
        ]);

        // Memperbarui status dan tanggal pengembalian
        $loan->status = 'returned';  // Mengubah status menjadi 'returned'
        $loan->actual_return_date = $request->actual_return_date;  // Menyimpan tanggal pengembalian
        $loan->save();  // Menyimpan data peminjaman yang diperbarui

        // Mengembalikan buku ke stok (menambahkan jumlah buku yang tersedia)
        $book = Book::findOrFail($loan->book_id);
        $book->increment('available');  // Menambahkan satu buku yang tersedia

        return redirect()->route('loans.index')->with('success', 'Buku berhasil dikembalikan!');
    }

    public function returnForm($id)
    {
        // Menemukan peminjaman berdasarkan ID
        $loan = Loan::findOrFail($id);

        // Mengembalikan view dengan data peminjaman yang ditemukan
        return view('loans.return', compact('loan'));
    }






    // Menampilkan form untuk peminjaman buku
    // app/Http/Controllers/LoanController.php

    // app/Http/Controllers/LoanController.php

    // app/Http/Controllers/LoanController.php

    public function create()
    {
        $books = Book::where('available', '>', 0)->get(); // Ambil buku yang tersedia
        $members = Member::all(); // Ambil semua anggota
        $loans = Loan::where('status', 'borrowed')->get(); // Ambil hanya peminjaman dengan status 'borrowed'

        return view('loans.create', compact('books', 'members', 'loans'));
    }

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
}
