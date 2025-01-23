<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Book;
use Illuminate\Support\Facades\Http; // If you're using external API like Open Library
use Illuminate\Support\Facades\Log;
class AIController extends Controller
{

        public function triggerAI(Request $request)
        {
            try {
                // Your AI logic here (like calling Open Library API)

                // Example of adding books (dummy data)
                $books = [
                    [
                        'title' => 'The Midnight Library',
                        'author' => 'Matt Haig',
                        'genre' => 'Fiction',
                        'year' => '2021',
                        'cover_image' => 'https://covers.openlibrary.org/b/id/100-L.jpg',
                        'description' => 'A book about possibilities...',
                        'price' => 15.99,
                        'quantity' => 20
                    ],
                    // Add more books as needed
                ];

                // Save books to database or perform your AI logic here

                return response()->json(['status' => 'success', 'message' => 'Books added successfully.']);
            } catch (\Exception $e) {
                // Catch any error and return a failure response
                return response()->json(['status' => 'error', 'message' => 'Failed to add books.']);
            }
        }


        public function trigger(Request $request)
        {
            // Your AI logic here
            return response()->json(['status' => 'success', 'message' => 'AI triggered successfully!']);
        }

    }

