<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Kernel;
use App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
class UserController extends Controller
{

// public function __construct()
// {
//     $this->middleware(function ($request, $next) {
//         if (auth()->user()->role !== 'admin') {
//             return redirect('/')->with('error', 'Unauthorized access.');
//         }
//         return $next($request);
//     })->only(['adminIndex', 'storeAdmin', 'editAdmin', 'updateAdmin', 'destroyAdmin']);
// }




    // Show all users
    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    // Show admin users
    public function adminIndex()
    {
        $admins = User::where('role', 'admin')->get();
        return view('admin_users', compact('admins'));
    }


// Add functionality to edit/delete admins
public function editAdmin($id)
{
    $admin = User::findOrFail($id);
    return view('edit_admin', compact('admin'));
}

public function updateAdmin(Request $request, $id)
{
    $admin = User::findOrFail($id);
    $admin->update($request->only(['name', 'email', 'subscription_type']));
    return redirect()->route('admin_users.index')->with('success', 'Admin updated successfully.');
}

public function destroyAdmin($id)
{
    User::destroy($id);
    return redirect()->route('admin_users.index')->with('success', 'Admin deleted successfully.');
}

    // Show all books
    public function booksIndex()
    {
        $books = book::all();
        return view('books', compact('books'));
    }

    // Show the user creation form
    public function create()
    {
        return view('create_user');
    }

    // Store a new user

    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->hasRole('admin')) {
                return redirect()->route('admin.home');  // Redirect to admin homepage
            }

            return redirect()->route('user_homepage');  // Redirect to user homepage
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }







    // Display all users in the home view
    public function loadAllUsers()
    {
        $all_users = User::all();
        return view('home', compact('all_users'));
    }

    // Display posts (if required)
//    public function loadAllPost()
// {
//     $all_post = Post::all(); // Assuming you have a Post model.
//     return view('post', ['all_posts' => $all_post]);
// }

    // Store a post (placeholder method)
    public function storePost(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'Details' => 'required|string', // Validate this field correctly.
        ]);

        // Assuming 'Post' model exists.
        // Post::create([
        //     'name' => $request['name'],
        //     'details' => $request['Details'],
        // ]);

        return redirect()->route('post')->with('success', 'Post added successfully.');
    }

//admin user CRUD
public function storeAdmin(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:8',
    ]);

    // Log the validated data for debugging
    logger($validatedData);

    User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'role' => 'admin', // Explicitly set the role to 'admin'
    ]);

    return redirect()->route('admin_users.index')->with('success', 'Admin user added successfully.');
}




// public function logout(Request $request)
// {
//     Auth()->logout();
//         return redirect()->route('home');
// }


//Profile routings


    // Show the profile page
    public function showProfile()
    {
        return view('profile'); // This should return the profile.blade.php
    }



    // Update the profile information
     // Update user profile
     public function updateProfile(Request $request)
{
    if (Auth::check()) {
        $userId = Auth::id();  // Get the authenticated user's ID

        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update the user's name using DB Facade
        DB::table('users')
            ->where('id', $userId)
            ->update([
                'name' => $request->name,
            ]);

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    } else {
        return redirect()->route('login')->with('error', 'Please log in first.');
    }
}

public function deleteAccount()
{
    $userId = Auth::id();  // Get the authenticated user's ID

    // Delete the user from the database using DB Facade
    DB::table('users')->where('id', $userId)->delete();

    // Log the user out
    Auth::logout();

    // Redirect to the homepage with a success message
    return redirect()->route('home')->with('success', 'Your account has been deleted.');
}
 }








