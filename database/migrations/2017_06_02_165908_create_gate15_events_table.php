<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGate15EventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gate15_events', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->string('author');
          $table->longText('event_url');
          $table->longText('original_url');
          $table->longText('picture_url');
          $table->bigInteger('event_begin_date');
          $table->bigInteger('event_end_date');
          $table->longText('content');
          $table->longText('price');
          $table->string('tags');
          $table->string('event_type');
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
        Schema::dropIfExists('gate15_events');
    }
}
