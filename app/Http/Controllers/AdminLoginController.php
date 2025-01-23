<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    // Show login form for admin
    public function showLoginForm()
    {
        return view('page.admin_login');  // Admin login view
    }

    // Handle login for admin
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Check if the logged-in user is an admin
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.home');  // Redirect to the admin dashboard
            }
        }

        // If login fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
