<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Book;  // Assuming you have a Book model
use Illuminate\Support\Facades\Http;  // For making API requests

class AddBooksFromAI extends Command
{
    protected $signature = 'books:fetch-from-open-library';
    protected $description = 'Fetch books from Open Library and add them to the database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Fetching books from Open Library...');

        // Search for books using Open Library's API endpoint
        $response = Http::get('https://openlibrary.org/subjects/bestsellers.json'); // Change the endpoint as needed

        if ($response->successful()) {
            $books = $response->json()['works']; // Assuming 'works' contains the book data

            foreach ($books as $bookData) {
                // Assuming you get data in this format, adjust if needed
                Book::create([
                    'title' => $bookData['title'],
                    'author' => $bookData['authors'][0]['name'] ?? 'Unknown', // Handling missing authors
                    'genre' => $bookData['subject'][0] ?? 'Unknown', // Handling missing genres
                    'year' => date('Y'), // Add logic to get the correct year if available
                    'cover_image' => 'https://covers.openlibrary.org/b/id/' . $bookData['cover_id'] . '-L.jpg', // Use cover image
                    'description' => $bookData['description'] ?? 'No description available.',
                    'rating' => 5, // You can adjust this as needed (Open Library doesn’t provide ratings)
                    'price' => 20.00, // Default price
                    'quantity' => 10, // Default quantity
                ]);
            }

            $this->info('Books fetched and added successfully!');
        } else {
            $this->error('Failed to fetch books from Open Library API.');
        }
    }
}
