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
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone_number' => 'required|string|max:15',
        'subscription_type' => 'required|in:regular,silver,premium',
        'password' => 'required|confirmed|min:8',
    ]);

    // Create user
    User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'phone_number' => $validatedData['phone_number'],
        'subscription_type' => $validatedData['subscription_type'],
        'password' => bcrypt($validatedData['password']),  // Hash the password before storing
    ]);

    return redirect()->route('users.index')->with('success', 'User created successfully');
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
// In your UserController.php
public function storeAdmin(Request $request)
{
    // Validate the incoming data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:8',
    ]);

    // Create the new admin user directly without using an unnecessary variable
    User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']), // Hash the password
        'role' => 'admin', // Ensure the role is set to 'admin'
    ]);

    // Redirect to admin users index with a success message
    return redirect()->route('admin_users.index')->with('success', 'Admin user added successfully!');
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








