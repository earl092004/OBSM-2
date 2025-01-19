<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Fillable fields to protect against mass-assignment


    public function category()
{
    return $this->belongsTo(Category::class);
}



}
