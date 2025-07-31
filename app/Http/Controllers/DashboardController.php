<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\Member;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Data untuk statistik
        $totalBooks = Book::count(); // Jumlah buku
        $availableBooks = Book::where('available', '>', 0)->count(); // Buku yang tersedia
        $totalMembers = Member::count(); // Total member

        // Data untuk grafik peminjaman buku selama satu tahun
        $loanData = Loan::selectRaw('MONTH(loan_date) as month, COUNT(*) as count')
            ->whereYear('loan_date', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Menyusun data untuk Chart.js
        $months = [];
        $loanCounts = [];
        foreach ($loanData as $data) {
            $months[] = $data->month;
            $loanCounts[] = $data->count;
        }

        return view('dashboard.index', compact('totalBooks', 'availableBooks', 'totalMembers', 'months', 'loanCounts'));
    }
    
}
