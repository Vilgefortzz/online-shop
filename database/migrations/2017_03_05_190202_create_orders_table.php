<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->float('total_paid')->unsigned();
            $table->string('status');
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('street');
            $table->string('postal_code');
            $table->string('city');
            $table->string('country');
            $table->string('phone_number');
            $table->timestamps();

            $table->integer('user_id')->index()->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('delivery_id')->index()->unsigned();
            $table->foreign('delivery_id')->references('id')->on('deliveries');

            $table->integer('payment_id')->index()->unsigned();
            $table->foreign('payment_id')->references('id')->on('payments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
