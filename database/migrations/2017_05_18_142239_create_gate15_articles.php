<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGate15Articles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gate15_articles', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->string('author');
          $table->longText('article_url');
          $table->longText('picture_url');
          $table->date('published_on');
          $table->longText('content');
          $table->integer('is_accepted')->default(0);
          $table->string('tags');
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
        Schema::dropIfExists('gate15_articles');
    }
}
