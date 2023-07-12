<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->longText('required_task');
            $table->string('worker_number');
            $table->string('worker_earn')->nullable();
            $table->string('required_screenshot');
            $table->string('estimated_date')->nullable();
            $table->string('avatar');
            $table->integer('is_approved')->comments('0=> Pending, 1=> Approved, 2=> Rejected')->default(0);
            $table->boolean('is_paused')->default(false);
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
        Schema::dropIfExists('posts');
    }
}
