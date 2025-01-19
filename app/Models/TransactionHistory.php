<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    use HasFactory;
    protected $table = 'transaction_histories'; // Explicitly define table name if needed
    protected $fillable = ['user_id', 'book_id', 'price', 'quantity', 'total_amount'];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Book (A transaction is associated with a specific book)
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
