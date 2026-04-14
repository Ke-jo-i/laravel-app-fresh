<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'publisher', // Gidugang
        'description',
        'genre',
        'isbn',
        'price',
        'published_year',
        'pages',
        'language',
        'cover_image'
    ];
}