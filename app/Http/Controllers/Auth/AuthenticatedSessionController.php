<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        // Validate the login credentials
        $credentials = $request->only('email', 'password');

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Check if the logged-in user is an admin
            if (Auth::user()->role === 'admin') {
                // Redirect to admin dashboard or homepage
                return redirect()->route('home'); // Replace with the correct admin route
            }

            // Redirect to user homepage for regular users
            return redirect()->route('user_homepage'); // Replace with the correct user route
        }

        // If login fails, return back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}



