<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use App\Models\Author;
use App\Models\Book;

class InsertBooksData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $bookCount = 10000;
        
        $categories = Category::select('id')->get();
        $authors = Author::select('id')->get();
        $minCategory = $categories->min('id');
        $countCategory = $categories->count();
        $minAuthor = $authors->min('id');
        $countAuthor = $authors->count();

        $dataToInsert = array();
        
        for ($i = 1; $i <= $bookCount; $i++) {
            array_push($dataToInsert, Book::factory()->make([
                'category_id'   => mt_rand($minCategory, $countCategory),
                'author_id'     => mt_rand($minAuthor, $countAuthor),
            ])->toArray());
        }

        Book::insert($dataToInsert);
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
