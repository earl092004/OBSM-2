<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use League\Csv\Reader;

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
    $books = Book::all();  // Ensure that this fetches all books correctly.
    return view('user_list_of_books', compact('books'));  // Pass books to the view
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


}







