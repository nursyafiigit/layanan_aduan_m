<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MemberController;

// Halaman login (guest)
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Semua route hanya untuk user yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::put('/loans/{id}', [LoanController::class, 'update'])->name('loans.update'); // Update peminjaman
    Route::get('/loans', [LoanController::class, 'index'])->name('loans.index');


    Route::get('loans/create', [LoanController::class, 'create'])->name('loans.create');
    Route::get('/loans/{id}/edit', [LoanController::class, 'edit'])->name('loans.edit'); // Menampilkan form edit
    Route::delete('loans/{id}', [LoanController::class, 'destroy'])->name('loans.destroy');


    Route::post('loans', [LoanController::class, 'store'])->name('loans.store');
    Route::get('loans/{id}/return', [LoanController::class, 'returnForm'])->name('loans.returnForm');
    Route::put('loans/{id}/return', [LoanController::class, 'returnBook'])->name('loans.return');
    Route::get('loans/history', [LoanController::class, 'history'])->name('loans.history');

    Route::resource('members', MemberController::class);
    Route::get('members/search', [MemberController::class, 'search'])->name('members.search');

    Route::resource('categories', CategoryController::class);

    Route::resource('books', BookController::class);
    Route::get('books/search', [BookController::class, 'search'])->name('books.search');
});
