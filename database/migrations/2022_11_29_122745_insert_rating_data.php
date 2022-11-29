<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Book;
use App\Models\Author;
use App\Models\Rating;

class InsertRatingData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //rate only 1000 books
        $books = Book::select('id', 'author_id')->limit(200)->get();

        $ratingCount = 50000;
        $insertedRating = 0;

        $dataToInsert = array();
        $counter = 0;
        while($insertedRating < $ratingCount) {
            $book = $books[mt_rand(0, $books->count() - 1)]; // randomly pick book to rate
            array_push($dataToInsert, [
                'book_id'   => $book->id,
                'author_id' => $book->author_id,
                'rating'    => mt_rand(3, 8)
            ]);

            $counter++;
            if ($counter == $books->count() || $insertedRating + $counter >= $ratingCount) {
                Rating::insert($dataToInsert);
                $insertedRating += $counter;
                $counter = 0;
                $dataToInsert = array();
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
