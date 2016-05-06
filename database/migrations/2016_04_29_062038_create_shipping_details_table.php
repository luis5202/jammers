<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_details', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name', 100);
            $table->string('last_name', 100);
            $table->string('email');
            $table->string('user', 50);            
            $table->string('country',100);
            $table->string('state',100);
            $table->string('city',100);
            $table->string('colony',100);
            $table->string('address', 100);
            $table->string('post_code',100);
            $table->string('phone_number',10);
            $table->text('references_address');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')
                  ->references('id')
                  ->on('orders')
                  ->onDelete('cascade');
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
        Schema::drop('shipping_details');
    }
}
