<?php

namespace Database\Seeders;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        Book::create(['title' => 'Book One', 'author' => 'Author A', 'genre' => 'Fiction']);
        Book::create(['title' => 'Book Two', 'author' => 'Author B', 'genre' => 'Non-Fiction']);
        Book::create(['title' => 'Book Two2', 'author' => 'Author Bb', 'genre' => 'Non-Fictionn']);
    }
}
