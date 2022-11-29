<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    //
    public function index(Request $req) {
        $listShown = $req->input('list-shown', 10);
        $searchQuery = $req->input('search');

        $books = Book::join('authors', 'author_id', '=', 'authors.id')
            ->join('categories', 'category_id', '=', 'categories.id')
            ->join('rating', 'book_id', '=', 'books.id')
            ->selectRaw('books.id, books.name as book_name, authors.name as author_name, categories.name as category_name, count(rating.id) as voter, round(avg(rating.rating), 2) as rating')
            ->orWhereRaw("authors.name like '%{$searchQuery}%'")
            ->orWhereRaw("categories.name like '%{$searchQuery}%'")
            ->orWhereRaw("books.name like '%{$searchQuery}%'")
            ->groupBy('books.id', 'books.name', 'authors.name', 'categories.name')
            ->orderBy('rating', 'desc')
            ->limit($listShown)
            ->get();

    
        return view('home', compact('books', 'listShown', 'searchQuery'));
    }
}
