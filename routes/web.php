<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MemberController;

use App\Http\Controllers\DashboardController;
Route::resource('loans', LoanController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Tampilan form untuk pengembalian buku
Route::get('loans/{id}/return', [LoanController::class, 'returnForm'])->name('loans.returnForm');

// Route untuk memproses pengembalian buku
Route::put('loans/{id}/return', [LoanController::class, 'returnBook'])->name('loans.return');

Route::get('/members/search', [MemberController::class, 'search'])->name('members.search');
Route::resource('members', MemberController::class);
// Routes untuk Loan

// Routes untuk Category
Route::resource('categories', CategoryController::class);

// Routes untuk Book
Route::resource('books', BookController::class);
