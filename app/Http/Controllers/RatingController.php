<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Rating;

class RatingController extends Controller
{
    //
    public function index() {
        $authors = Author::selectRaw('id,name')->get();

        return view('rating', compact('authors'));
    }

    public function rate(Request $req) {
        // return $req;
        $authorId = $req->author;
        $bookId = $req->book;
        $rate = $req->rating;

        $rating = new Rating();
        $rating->author_id = $authorId;
        $rating->book_id = $bookId;
        $rating->rating = $rate;
        $rating->save();


        return redirect(route('home'));
    }
}
