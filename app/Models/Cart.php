<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Fillable fields to protect against mass-assignment
    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'book_id',
        'quantity',
    ];

    // Define the relationship with the Book model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Book (A cart item is for a specific book)
    public function book()
    {
        return $this->belongsTo(Book::class);
    }


}
