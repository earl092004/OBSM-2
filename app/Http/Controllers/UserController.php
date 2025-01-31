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
use Illuminate\Support\Facades\Log;


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
        return view('home', compact('admins'));

    }

    public function adminView()
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
    // Use the correct model, e.g., User or AdminUser
    $admin = User::findOrFail($id); // Find admin by ID
    $admin->delete(); // Delete the admin

    // Redirect with success message
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
    try {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            // Adjusted phone number validation to allow spaces, dashes, and parentheses
            'phone_number' => 'required|string|regex:/^(\+?[0-9]{1,4})?[\s\(\)-]*[0-9]{1,5}[\s\(\)-]*[0-9]{1,4}[\s\(\)-]*[0-9]{1,4}$/',
            'subscription_type' => 'required|in:regular,silver,premium',
            'password' => 'required|confirmed|min:8',  // Removed regex and only require min length
        ]);

        // Create the user in the database
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
            'subscription_type' => $validatedData['subscription_type'],
            'password' => bcrypt($validatedData['password']),  // Hash the password before storing
        ]);

        // Redirect with success message
        return redirect()->route('login')->with('success', 'User created successfully, please Login');
    } catch (\Exception $e) {
        // Log the error and return with a message
        Log::error('Error creating user: ' . $e->getMessage());
        return back()->withErrors(['error' => 'An error occurred while creating the user. Please try again later.']);
    }
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


public function edit($id)
{
    $user = User::findOrFail($id);
    return view('users.edit', compact('user')); // Pass the user to the edit view
}



public function update(Request $request, $id)
{
    // Find the user by their ID
    $user = User::findOrFail($id);

    // Validate the input data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id, // Ignore the current user's email
        'subscription_type' => 'required|string|max:255',
        'password' => 'nullable|string|min:6|confirmed', // The new password must be confirmed (nullable)
    ]);

    // Verify the current password entered by the user
    // if (!Hash::check($request->current_password, $user->password)) {
    //     return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
    // }

    // If the new password is filled, hash it and update the password
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password); // Hash the new password
    }

    // Update other fields that are not password-related
    $user->name = $request->name;
    $user->email = $request->email;
    $user->subscription_type = $request->subscription_type;

    // Save the updated user information
    $user->save();

    // Redirect with a success message
    return redirect()->route('users.index')->with('success', 'User updated successfully!');
}


public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('users.index')->with('success', 'User deleted successfully!');
}



 }








