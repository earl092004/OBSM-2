<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use Illuminate\Http\Request;
use League\Csv\Reader;
// use App\Models\TransactionHistory;
// use App\Models\User;
// use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Facades\Auth;
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
    // If genre is 'All Books', get all books
    if ($genre == 'All Books') {
        $books = Book::all(); // Fetch all books
    } else {
        $books = Book::where('genre', $genre)->get(); // Fetch books for the selected genre
    }

    // Ensure 'genre' and 'books' are passed to the view
    return view('user_list_of_books', compact('books', 'genre'));  // Pass books and genre to the view
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

    // Close the modal (using JavaScript)
    return back(); // This will return to the current page (no redirection)
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
    $cartItems = Cart::with('book')->where('user_id', Auth::id())->get();
    return view('userlayouts', compact('cartItems')); // Pass cart items to the view
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
// In your controller
public function showUserLayouts()
{
    $cartItems = Cart::with('book')->where('user_id', auth::id())->get();

    // Return userlayouts view with cart items
    return view('userlayouts', compact('cartItems'));
}

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
// }
