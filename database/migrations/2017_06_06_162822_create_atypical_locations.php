<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtypicalLocations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atypical_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('picture_url')->default(null)->nullable();
            $table->longText('content');
            $table->longText('site_url')->default(null)->nullable();
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
        Schema::dropIfExists('atypical_locations');
    }
}
