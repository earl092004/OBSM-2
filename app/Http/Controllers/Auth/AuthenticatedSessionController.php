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

        $credentials = $request->only('email', 'password');

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Check if the user is admin or regular user
            if (Auth::user()->role === 'admin') {
                return redirect()->route('home'); // Admin homepage route
            }

            return redirect()->route('user_homepage'); // Regular user homepage route
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

}
