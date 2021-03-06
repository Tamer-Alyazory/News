<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title',45);
            $table->string('short_description',45);
            $table->string('full_description',45);
            $table->foreignId('category_id');
            $table->foreign('category_id')->on('categories')->references('id');
            $table->foreignId('author_id');
            $table->foreign('author_id')->on('authors')->references('id');
            $table->string('seen_count',45);
            $table->string('image_id');
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
