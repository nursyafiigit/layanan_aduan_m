<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Import controllers
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;

// Admin Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Show the login form for admin
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');

// Route for handling the login form submission
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.post');

// Admin dashboard route
Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');

// Admin logout route
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Route for the dashboard page (protected by auth middleware)
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Add more admin routes here
});


// Route untuk tampilan create
Route::get('loans/create', [LoanController::class, 'create'])->name('loans.create');
Route::post('loans', [LoanController::class, 'store'])->name('loans.store');

// Route untuk tampilan pengaturan pengembalian
Route::get('loans/{id}/return', [LoanController::class, 'returnForm'])->name('loans.returnForm');
Route::put('loans/{id}/return', [LoanController::class, 'returnBook'])->name('loans.return');

// Menampilkan riwayat peminjaman
Route::get('loans/history', [LoanController::class, 'history'])->name('loans.history');

Route::resource('members', MemberController::class);

// Routes untuk Category
Route::resource('categories', CategoryController::class);

// Routes untuk Book
Route::resource('books', BookController::class);

// Pencarian anggota
Route::get('members/search', [MemberController::class, 'search'])->name('members.search');

// Pencarian buku
Route::get('books/search', [BookController::class, 'search'])->name('books.search');
