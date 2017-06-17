<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->float('rating')->unsigned()->nullable();
            $table->timestamps();

            $table->integer('user_id')->index()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('product_id')->index()->unsigned();
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade');

            $table->integer('review_id')->index()->unsigned();
            $table->foreign('review_id')->references('id')->on('reviews')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
