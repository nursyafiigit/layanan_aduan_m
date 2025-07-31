<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.post');
    Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

// Route for general login and logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route for the dashboard page (protected by auth middleware)
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Add more admin routes here
});

// Route for loans
Route::get('loans/create', [LoanController::class, 'create'])->name('loans.create');
Route::post('loans', [LoanController::class, 'store'])->name('loans.store');

// Route for loan return page
Route::get('loans/{id}/return', [LoanController::class, 'returnForm'])->name('loans.returnForm');
Route::put('loans/{id}/return', [LoanController::class, 'returnBook'])->name('loans.return');

// Loan history
Route::get('loans/history', [LoanController::class, 'history'])->name('loans.history');

// Member routes
Route::resource('members', MemberController::class);
Route::get('members/search', [MemberController::class, 'search'])->name('members.search');

// Category routes
Route::resource('categories', CategoryController::class);

// Book routes
Route::resource('books', BookController::class);
Route::get('books/search', [BookController::class, 'search'])->name('books.search');
