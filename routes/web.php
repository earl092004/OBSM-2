<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Genre;
Route::get('/user_list_of_books', function () {
    return view('user_list_of_books');
})->name('books.list');

Route::get('/about-us', function () {
    return view('about_us_page');
});

Route::get('/best-sellers', function () {
    return view('best_sellers');
})->name('best_sellers');

Route::get('/categories', function () {
    return view('categories');
})->name('genres');





Route::get('/', function () {
    return view('home'); // Homepage of the library system
})->name('home');

Route::get('/add-user', function () {
    return view('add-user');
})->name('add-user');

Route::get('/user-homepage', function () {
    return view('user_homepage');
})->name('user_homepage');



Route::get('/login', function () {
    return view('login');  // Login page view
})->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.post');

// Admin routes
Route::get('/home', function () {
    return view('home');  // Admin dashboard view
})->name('home');  // Admin home route

// User routes
Route::get('/user_homepage', function () {
    return view('user_homepage');  // User home view
})->name('user_homepage');


// Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-users', [UserController::class, 'adminIndex'])->name('admin_users.index');
    Route::post('/admin-users', [UserController::class, 'storeAdmin'])->name('admin_users.store');
    Route::get('/admin-users/{id}/edit', [UserController::class, 'editAdmin'])->name('admin_users.edit');
    Route::put('/admin-users/{id}', [UserController::class, 'updateAdmin'])->name('admin_users.update');
    Route::delete('/admin-users/{id}', [UserController::class, 'destroyAdmin'])->name('admin_users.destroy');

// User management routes (requires 'auth' middleware)
// Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');


    // Home and posts (optional features)
    Route::get('/home', [UserController::class, 'loadAllUsers'])->name('home.view');
    Route::get('/posts', [UserController::class, 'loadAllPost'])->name('post.index');
    Route::post('/posts', [UserController::class, 'storePost'])->name('post.store');
// });

Route::get('/create-user', function () {
    return view('create_user');
})->name('create-user');



// Login page (GET request)
Route::get('/login', function () {
    return view('page.login_page');
})->name('login');

// Login form submission (POST request)
Route::post('/login', function (Illuminate\Http\Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/homepage'); // Redirect to homepage after successful login
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
})->name('login.post');


Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::get('/homepage', function () {
    return view('user_homepage');
})->middleware('auth')->name('user_homepage');

Route::get('/books', function () {
    return view('books');
})->name('books.index');


//book part
Route::post('/books/import', [BookController::class, 'import'])->name('books.import');
Route::post('/import-books', [BookController::class, 'importCSV'])->name('books.import');
// Import books from CSV
Route::post('/import-csv', [BookController::class, 'importCSV'])->name('books.importCSV');
// Route to delete a book
Route::delete('/books/{id}', [BookController::class, 'deleteBook'])->name('books.delete');
// Show the create book form
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

// Store the new book in the database
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');
//search
Route::get('/books/search', [BookController::class, 'search'])->name('books.search');
// In your routes/web.php
// In your routes/web.php
// web.php
Route::get('/user_list_of_books', [BookController::class, 'showBooks'])->name('books.list');
// Route::get('/user-list-of-books', [UserController::class, 'booksIndex'])->name('user_list_of_books');




    // Books management
    Route::get('/books', [UserController::class, 'booksIndex'])->name('books.index');
// Route::get('/books', [BookController::class, 'index'])->name('books.index');



   //profile

   Route::middleware('auth')->group(function () {
       // Profile route to show user details
       Route::get('/profile', [UserController::class, 'showProfile'])->name('profile.show');

       // Route to update user details
       Route::post('/profile', [UserController::class, 'updateProfile'])->name('profile.update');

       // Route to delete user account
       Route::delete('/profile', [UserController::class, 'deleteProfile'])->name('profile.delete');
   });


Route::middleware('auth')->group(function () {
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/delete', [UserController::class, 'deleteAccount'])->name('profile.delete');

});




// categories part
Route::get('/genres/{genre}', [BookController::class, 'showBooksByGenre'])->name('books.genre');



//add to cart
Route::post('/cart/{bookId}', [BookController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [BookController::class, 'cart'])->name('cart.view');



Route::post('/add-to-cart/{bookId}', [BookController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/remove/{bookId}', [BookController::class, 'removeFromCart'])->name('cart.remove');


Route::get('/user-homepage', [BookController::class, 'showFeaturedBooks'])->name('user_homepage');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');

Route::get('/cart', [BookController::class, 'showCart'])->name('cart.show');
Route::delete('/cart/{cartItemId}', [BookController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart/checkout', [BookController::class, 'checkout'])->name('cart.checkout');
Route::get('/add-to-cart/{bookId}', [BookController::class, 'addToCart'])->name('books.addToCart');

Route::delete('/cart/{bookId}', [BookController::class, 'removeFromCart'])->name('remove-from-cart');
Route::get('/cart', [BookController::class, 'showCart'])->name('showCart');
Route::delete('/cart/remove/{bookId}', [BookController::class, 'removeFromCart'])->name('remove-from-cart');


// Route for adding a book to the cart
Route::get('/add-to-cart/{bookId}', [BookController::class, 'addToCart'])->name('books.addToCart');
Route::get('/cart', [BookController::class, 'showCart'])->name('cart.show');
// Route to delete a cart item
Route::delete('/cart/{cartItem}', [BookController::class, 'deleteCartItem'])->name('cart.delete');

Route::get('/cart', [BookController::class, 'showCart'])->name('cart.show');
Route::get('/user-layout', [BookController::class, 'showUserLayouts'])->name('user_homepage');
Route::delete('/remove-from-cart/{bookId}', [BookController::class, 'removeFromCart'])->name('remove-from-cart');
// Add to Cart Route
Route::post('/add-to-cart/{bookId}', [BookController::class, 'addToCart'])->name('addToCart');
Route::delete('/remove-from-cart/{bookId}', [BookController::class, 'removeFromCart'])->name('removeFromCart');



//best sellers

Route::get('/best-sellers', [BookController::class, 'showBestSellers'])->name('bestSellers');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');


Route::post('/addToCart/{bookId}', [BookController::class, 'addToCart'])->name('addToCart');


//checkout na!!
Route::post('/checkout', [BookController::class, 'checkout'])->name('checkout');
Route::get('/cart', [BookController::class, 'showCart'])->name('cart');



Route::get('/admin/dashboard', [BookController::class, 'getDashboardData'])->name('admin.dashboard');


// web.php (routes file)
Route::get('/export-transactions', [BookController::class, 'exportTransactions'])->name('transactions.export');


// Route for viewing transactions
Route::get('/user-transactions', [BookController::class, 'viewTransactions'])->name('transactions.view');
Route::get('/user_homepage', [BookController::class, 'index'])->name('user_homepage');


Route::get('/transactions/downloadCSV', [BookController::class, 'downloadCSV'])->name('transactions.downloadCSV');


Route::delete('/admin_users/{id}', [UserController::class, 'destroyAdmin'])->name('admin_users.destroy');



// Edit User
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

// Delete User
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
