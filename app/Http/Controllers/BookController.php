<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use Illuminate\Http\Request;
use League\Csv\Reader;
use App\Models\TransactionHistory;


// use App\Models\TransactionHistory;
// use App\Models\User;
// use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;

use App\Models\Cart;
class BookController extends Controller
{

    public function index()
    {
        // Get all books from the database
        $books = Book::all();

        // Return the books to the view
        return view('books.index', compact('books'));
    }

  // BookController.php
  public function showBooks()
  {
      if (Auth::check()) {
          // The user is authenticated
          $user = Auth::user();

          // Fetch the books from the database
          $books = Book::all();

          // Fetch cart items for the authenticated user
          $cartItems = Cart::with('book')->where('user_id', $user->id)->get();

          // Pass the books, cart items, and user to the view
          return view('user_list_of_books', compact('books', 'cartItems', 'user'));
      } else {
          // The user is not authenticated
          return redirect()->route('login');
      }
  }




    // Method to import CSV file
    public function importCSV(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('csv_file')) {
            $csvFile = $request->file('csv_file');
            $csvData = Reader::createFromPath($csvFile->getRealPath(), 'r');
            $csvData->setHeaderOffset(0); // Assume the first row contains headers

            // Iterate through CSV rows and insert into the database
            foreach ($csvData as $row) {
                // Insert the data into the database
                Book::create([
                    'title' => $row['Title'],
                    'author' => $row['Author'],
                    'genre' => $row['Genre'],
                    'year' => $row['Year'],
                    'cover_image' => $row['Cover_Image'],
                ]);
            }

            return redirect()->route('books.index')->with('success', 'Books imported successfully!');
        }

        return back()->with('error', 'Please upload a valid CSV file.');
    }




    // Other methods...


    public function deleteBook($id)
    {
        $book = Book::findOrFail($id);  // Find the book by ID, or fail if not found
        $book->delete();  // Delete the book from the database

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }


// Show the form to create a new book
public function create()
{
    return view('create_book');
}

// Store the new book in the database
public function store(Request $request)
{
    // Validate input
    $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'genre' => 'required|string|max:255',
        'year' => 'required|integer',
        'cover_image' => 'required|url',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'description' => 'required|string|max:500',
        'rating' => 'required|numeric|min:1|max:5', // Validate rating to be between 1 and 5
    ]);

    // Create the book record with the rating
    Book::create([
        'title' => $request->title,
        'author' => $request->author,
        'genre' => $request->genre,
        'year' => $request->year,
        'cover_image' => $request->cover_image,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'description' => $request->description,
        'rating' => $request->rating, // Store rating
    ]);

    return redirect()->route('books.index')->with('success', 'Book added successfully!');
}



public function search(Request $request)
{
    $query = $request->get('query');

    $books = Book::where('title', 'like', '%' . $query . '%')
        ->orWhere('author', 'like', '%' . $query . '%')
        ->orWhere('genre', 'like', '%' . $query . '%')
        ->get();

    return view('books', compact('books'));
}


public function showBooksByGenre($genre = 'All Books')
{
    // Get cart items for the authenticated user
    $cartItems = Cart::with('book')->where('user_id', auth::id())->get();

    // If genre is 'All Books', get all books
    if ($genre == 'All Books') {
        $books = Book::all(); // Fetch all books
    } else {
        $books = Book::where('genre', $genre)->get(); // Fetch books for the selected genre
    }

    // Pass both the cart items and books to the view
    return view('user_list_of_books', compact('books', 'genre', 'cartItems'));  // Pass books, genre, and cartItems to the view
}



//add to cart fucntionality

// BookController.php
public function addToCart($bookId)
{
    // Get the current authenticated user
    $user = Auth::user();

    // Get the book to be added
    $book = Book::findOrFail($bookId);

    // Check if the book is already in the cart
    $existingCartItem = Cart::where('user_id', $user->id)
                            ->where('book_id', $book->id)
                            ->first();

    if ($existingCartItem) {
        // If the book is already in the cart, increment the quantity
        $existingCartItem->quantity += 1;
        $existingCartItem->save();
    } else {
        // Otherwise, create a new cart entry for the book
        Cart::create([
            'user_id' => $user->id,
            'book_id' => $book->id,
            'quantity' => 1,
        ]);
    }

    // Redirect or return back to the page
    return back(); // This will return to the previous page
}



public function update(Request $request, $id)
    {
        // Find the book by its ID
        $book = Book::findOrFail($id);

        // Validate the input data
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'year' => 'required|integer',
            'cover_image' => 'required|url',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'description' => 'required|string|max:500',
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        // Update the book with the new data
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'genre' => $request->genre,
            'year' => $request->year,
            'cover_image' => $request->cover_image,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'rating' => $request->rating,
        ]);

        // Redirect back to the books management page with a success message
        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }


public function removeFromCart($bookId)
{
    $user = Auth::user();
    $cartItem = Cart::where('user_id', $user->id)
                    ->where('book_id', $bookId)
                    ->first();

    if ($cartItem) {
        $cartItem->delete();  // Remove the cart item
    }

    return back(); // Return back to the current page
}



// Fetch cart items for the authenticated user
public function showCart()
{
    $cartItems = Cart::with('book')->where('user_id', auth::id())->get();
    return view('cart', compact('cartItems')); // Assuming you have a 'cart.blade.php' view
}
// public function showCart()
// {
//     // Retrieve cart items for the logged-in user
//     $cartItems = Cart::with('book')->where('user_id', auth()->id())->get();

//     return view('userlayouts', compact('cartItems'));
// }



public function cart()
{
    return view('cart');
}


public function showUserLayouts()
{
    // Fetch the cart items for the authenticated user
    $cartItems = Cart::with('book')->where('user_id', auth::id())->get();

    // Pass the cart items to the userlayouts view
    return view('user_homepage', compact('cartItems'));
}
// public function showUserLayouts()
// {
//     $cartItems = Cart::with('book')->where('user_id', auth::id())->get();

//     // Return userlayouts view with cart items
//     return view('userlayouts', compact('cartItems'));
// }

public function deleteCartItem($cartItemId)
{
    // Find the cart item and delete it
    $cartItem = Cart::findOrFail($cartItemId);

    // Ensure the cart item belongs to the authenticated user
    if ($cartItem->user_id === auth::id()) {
        $cartItem->delete();  // Delete the cart item
    }

    // After deletion, return the user to the userlayouts view
    return redirect()->route('user_homepage')->with('success', 'Item removed from cart.');
}

public function showFeaturedBooks()
{
    // Fetch books with rating 4 or 5
    $books = Book::whereIn('rating', [4, 5])->get();

    return view('user_homepage', compact('books'));
}



// BookController.php

public function showBestSellers()
{
    // Fetch cart items for the authenticated user
    $cartItems = Cart::with('book')->where('user_id', auth::id())->get();

    // Fetch best sellers data
    $topRated = Book::where('rating', '>=', 4.5)->orderBy('rating', 'desc')->take(20)->get();
    $rated21to40 = Book::where('rating', '>=', 4.0)->where('rating', '<', 4.5)->orderBy('rating', 'desc')->take(20)->get();
    $rated41to60 = Book::where('rating', '>=', 3.5)->where('rating', '<', 4.0)->orderBy('rating', 'desc')->take(20)->get();

    // Pass both the cart items and books to the view
    return view('best_sellers', compact('topRated', 'rated21to40', 'rated41to60', 'cartItems'));
}


public function show($id)
{
    // Fetch the book by ID
    $book = Book::findOrFail($id);  // If the book isn't found, it will throw a 404 error

    return view('books.show', compact('book'));  // Pass the book to the view
}



public function checkout()
{
    // Get the authenticated user
    $user = auth::user();

    // Fetch the user's cart items
    $cartItems = Cart::where('user_id', $user->id)->get();

    if ($cartItems->isEmpty()) {
        // If the cart is empty, return an error
        return back()->with('error', 'Your cart is empty. Please add items to the cart before proceeding to checkout.');
    }

    // Log cart items for debugging
    Log::info('Cart items before checkout:', $cartItems->toArray());

    // Begin a database transaction
    DB::beginTransaction();

    try {
        $totalAmount = 0;  // Initialize the total amount

        // Loop through each cart item and create a transaction record
        foreach ($cartItems as $item) {
            // Calculate the total price for each item
            $totalAmount += $item->book->price * $item->quantity;

            // Create a transaction history record for each cart item
            TransactionHistory::create([
                'user_id' => $user->id,
                'book_id' => $item->book->id,
                'price' => $item->book->price,
                'quantity' => $item->quantity,
                'total_amount' => $item->book->price * $item->quantity, // Calculate and save the total amount for each item
            ]);
        }

        // Commit the transaction
        DB::commit();

        // Delete the cart items after successful transaction
        Cart::where('user_id', $user->id)->delete();

        // Return a success message
        return back()->with('success', 'Thank you for your purchase! Your order has been successfully placed.');
    } catch (\Exception $e) {
        // Rollback transaction in case of any error
        DB::rollback();

        // Log the error message
        Log::error('Error during checkout: ' . $e->getMessage());

        return back()->with('error', 'There was an error during checkout. Please try again.');
    }
}


public function getDashboardData()
{
    $totalUsersPurchased = TransactionHistory::distinct('user_id')->count('user_id');
    $totalIncome = TransactionHistory::sum('total_amount');

    // Debugging: Log or dump the values
    Log::info('Total Income: ' . $totalIncome);
    Log::info('Total Users Purchased: ' . $totalUsersPurchased);

    // Return the data to the view
    return view('home', compact('totalUsersPurchased', 'totalIncome'));
}


public function exportTransactions()
    {
        // Get all transactions data
        $transactions = TransactionHistory::all();

        // Define the CSV file headers
        $csvHeaders = ['User ID', 'Book ID', 'Price', 'Quantity', 'Total Amount'];

        // Open a file pointer to create a CSV
        $handle = fopen('php://output', 'w');

        // Set the headers for the download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="transactions.csv"');

        // Write the CSV headers to the file
        fputcsv($handle, $csvHeaders);

        // Write each transaction data to the file
        foreach ($transactions as $transaction) {
            fputcsv($handle, [
                $transaction->user_id,
                $transaction->book_id,
                $transaction->price,
                $transaction->quantity,
                $transaction->total_amount,
            ]);
        }

        // Close the file pointer
        fclose($handle);

        // Exit to prevent any further output
        exit;
    }

    public function showTransactions()
{
    $transactions = TransactionHistory::all();
    return view('userTransactions', compact('transactions'));
}


public function viewTransactions()
{
    // Get all transaction histories
    $transactions = TransactionHistory::all();

    // Pass the transactions data to the view
    return view('userTransactions', compact('transactions'));
}

public function downloadCSV()
{
    // Fetch all transactions
    $transactions = TransactionHistory::all();

    // Open memory for writing the CSV file
    $csvData = fopen('php://output', 'w');

    // Set the headers for CSV file download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="transactions.csv"');

    // Add CSV headers
    fputcsv($csvData, ['User ID', 'Book ID', 'Price', 'Quantity', 'Total Amount']);

    // Add transaction data rows
    foreach ($transactions as $transaction) {
        fputcsv($csvData, [
            $transaction->user_id,
            $transaction->book_id,
            $transaction->price,
            $transaction->quantity,
            $transaction->total_amount,
        ]);
    }

    // Close the CSV file after writing
    fclose($csvData);

    // Return a response that triggers the file download
    exit();
}




}







// public function checkout()
// {
//     // Store the transaction in the transaction history (if needed)
//     // Proceed with clearing the cart after checkout
//     Cart::where('user_id', auth()->id())->delete();

//     return redirect()->route('user_homepage')->with('success', 'Thank you for your purchase!');
// }


// public function checkout(Request $request)
// {
//     // Get the cart from session
//     $cart = session()->get('cart');

//     // Calculate total amount
//     $totalAmount = 0;
//     foreach ($cart as $book) {
//         $totalAmount += $book['price'] * $book['quantity'];
//     }

//     // Store the transaction in the database
//     $transaction = new TransactionHistory();
//     $transaction->user_id = auth()->id();
//     $transaction->books = json_encode($cart);
//     $transaction->total_amount = $totalAmount;
//     $transaction->save();

//     // Send a confirmation email
//     $user = auth()->user();
//     Mail::to($user->email)->send(new ThankYouMail($transaction));

//     // Clear the cart from session after checkout
//     session()->forget('cart');

//     return redirect()->route('books.index')->with('success', 'Thank you for your purchase! You will receive an email with the order details.');
