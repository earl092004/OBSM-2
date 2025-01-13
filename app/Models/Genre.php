<?php

// Genre.php (Model)
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    // Assuming your table is called 'genres'
    protected $fillable = ['name'];  // Adjust according to your table's structure

    // If you're using timestamps, Laravel handles them automatically. If not, set the $timestamps property to false.
    public $timestamps = true;
}
