<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    protected $table = 'libros';
    protected $fillable = [
        'Name_Book',
        'Name_Author',
        'year_Publication',
        'description_of_the_book',
    ];
}
