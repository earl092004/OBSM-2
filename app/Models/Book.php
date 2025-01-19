<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'genre',
        'year',
        'cover_image',
        'price',
        'quantity',
        'description',
        'rating'
    ];
    // Relationship with Cart (A book can be added to many carts)
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // Relationship with TransactionHistory (A book can be purchased many times)
    public function transactionHistory()
    {
        return $this->hasMany(TransactionHistory::class);
    }


}
