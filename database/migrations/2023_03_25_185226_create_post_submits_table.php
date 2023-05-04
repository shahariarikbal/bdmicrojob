<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostSubmitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_submits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_owner_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('post_id');
            $table->longText('work_prove');
            $table->string('images');
            $table->string('status')->default('0')->comments('0=>pending, 1=>approved, 2=>rejected');
            $table->boolean('is_reported')->default(false);
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
        Schema::dropIfExists('post_submits');
    }
}
