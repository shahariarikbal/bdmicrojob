<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('slider_title');
            $table->string('slider_image');
            $table->string('first_image_title');
            $table->longText('first_image_description');
            $table->string('first_image');
            $table->string('second_image_title');
            $table->longText('second_image_description');
            $table->string('second_image');
            $table->string('how_works_title');
            $table->longText('how_works_description');
            $table->string('footer_image');
            $table->string('footer_title');
            $table->longText('footer_description');
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
        Schema::dropIfExists('home_pages');
    }
}
