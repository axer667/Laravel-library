<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksOnLease extends Model
{
    use HasFactory;

    protected $table = 'books_on_lease';
    protected $fillable = [
        'id',
        'book_id',
        'book_title',
        'librarian_name',
        'client_name',
        'date_of_issue',
        'expected_date_of_return',
        'actual_date_of_return'
    ];
}
