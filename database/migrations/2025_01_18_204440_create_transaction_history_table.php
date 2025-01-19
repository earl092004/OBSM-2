
Sure! Here's the migration code for creating the transaction_history table with the correct foreign key constraints for both user_id and book_id.

Migration Code for transaction_history Table:
php
Copy
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionHistoryTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaction_history', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->foreignId('user_id')  // Foreign key for the user
                  ->constrained('users')  // References the 'users' table
                  ->onDelete('cascade');  // Cascade delete when the user is deleted
            $table->foreignId('book_id')  // Foreign key for the book
                  ->constrained('books')  // References the 'books' table
                  ->onDelete('cascade');  // Cascade delete when the book is deleted
            $table->decimal('price', 8, 2);  // Price at which the book was sold
            $table->integer('quantity');  // The quantity of the book purchased
            $table->timestamps();  // Created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_history');
    }
}
