<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.admin-login');  // make sure you have this view for the login form
    }

    // Handle the login
    public function login(Request $request)
    {
        // Validate the login form
        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('/admin/dashboard');
        }

        // If authentication fails, redirect back with error message
        return back()->with('error', 'Invalid credentials');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
