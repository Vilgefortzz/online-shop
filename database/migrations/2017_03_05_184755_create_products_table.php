<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30)->unique();
            $table->string('description', 50)->nullable();
            $table->string('path_to_image')->default('/images/missing.png');
            $table->float('price')->unsigned();
            $table->integer('quantity')->unsigned()->nullable();
            $table->boolean('recommended')->default(false);
            $table->timestamps();

            $table->integer('subcategory_id')->index()->unsigned();
            $table->foreign('subcategory_id')->references('id')->on('subcategories')
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
        Schema::dropIfExists('products');
    }
}
