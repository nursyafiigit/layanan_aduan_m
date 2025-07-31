<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\DashboardController;


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Add more admin routes here


// Route for loans
Route::get('loans/create', [LoanController::class, 'create'])->name('loans.create');
Route::post('loans', [LoanController::class, 'store'])->name('loans.store');

Route::get('loans/{id}/return', [LoanController::class, 'returnForm'])->name('loans.returnForm');
Route::put('loans/{id}/return', [LoanController::class, 'returnBook'])->name('loans.return');

Route::get('loans/history', [LoanController::class, 'history'])->name('loans.history');

// Member routes
Route::resource('members', MemberController::class);
Route::get('members/search', [MemberController::class, 'search'])->name('members.search');

// Category routes
Route::resource('categories', CategoryController::class);

// Book routes
Route::resource('books', BookController::class);
Route::get('books/search', [BookController::class, 'search'])->name('books.search');
