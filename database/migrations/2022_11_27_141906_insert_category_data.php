<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;

class InsertCategoryData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $categoryCount = 300;
        $data = array();

        for ($i = 1; $i <= $categoryCount; $i++) {
            array_push($data, [
                'id'    => $i,
                'name'  => "category-{$i}"
            ]);
        }

        Category::insert($data);
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
