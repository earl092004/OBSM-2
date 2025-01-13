<?php

// app/Http/Controllers/Auth/AuthenticatedSessionController.php
// app/Http/Controllers/Auth/AuthenticatedSessionController.php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Redirect based on user role
        $user = Auth::user();

        // Redirect to home or user_homepage based on role
        if ($user->hasRole('admin')) {
            return redirect()->route('home');  // This assumes 'home' is the admin dashboard
        } else {
            return redirect()->route('user_homepage');  // Redirect to user homepage
        }
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}



    // Other methods
}
