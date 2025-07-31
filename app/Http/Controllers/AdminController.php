<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Method to show the login form
    public function showLoginForm()
    {
        return view('auth.login'); // Assuming you have a login view for admin
    }

    // Method for admin login
    public function login(Request $request)
    {
        // Add login logic, like checking credentials, etc.
    }

    // Method for showing the admin dashboard
    public function showDashboard()
    {
        // Make sure you pass any data to the dashboard if needed
        return view('admin.dashboard');
    }

    // Method for logout
    public function logout(Request $request)
{
    auth('admin')->logout(); // Log out using the admin guard
    return redirect()->route('admin.login'); // Redirect to the login page
}

}
