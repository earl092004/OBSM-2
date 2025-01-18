<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        // Get the current page from the request, default to 1 if not set
        $currentPage = $request->query('page', 1);

        // Validate page number
        if ($currentPage < 1 || $currentPage > 5) {
            $currentPage = 1;
        }

        // You can add your database queries here when you have a database set up
        // For now, we'll use dummy data
        $featuredPost = [
            'title' => 'The Midnight Library: A Journey Through Possibilities',
            'date' => 'January 18, 2025',
            'category' => 'Novel Review',
            'description' => "Matt Haig's profound exploration of life's infinite possibilities through the lens of a magical library that exists between life and death."
        ];

        $recentPosts = [
            [
                'title' => 'Tomorrow, and Tomorrow, and Tomorrow',
                'description' => 'A stunning exploration of friendship, love, and creativity in the digital age...'
            ],
            [
                'title' => 'The Starless Crown',
                'description' => 'James Rollins crafts an epic fantasy that combines science and magic...'
            ]
        ];

        return view('blog', [
            'currentPage' => $currentPage,
            'featuredPost' => $featuredPost,
            'recentPosts' => $recentPosts
        ]);
    }
}
