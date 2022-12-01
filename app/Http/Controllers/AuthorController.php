<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

class AuthorController extends Controller
{
    //

    public function mostFamous() {
        $authors = Author::join('rating', 'rating.author_id', '=', 'authors.id')
            ->selectRaw('authors.name, count(rating.id) as voter')
            ->groupBy('authors.name')
            ->orderBy('voter', 'desc')
            ->limit(10)
            ->get();

    
        return view('authors', compact('authors'));
    }

    public function getBooksApi($id) {
        $books = Book::where('author_id', $id)
            ->selectRaw('id,name')
            ->get();
        
        return $books;
    }
}
