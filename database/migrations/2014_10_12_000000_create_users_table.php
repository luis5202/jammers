<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('last_name', 100);
            $table->string('email')->unique();
            $table->string('user', 50)->unique();
            $table->string('password', 60);
            $table->enum('type', ['user', 'admin']);
            $table->boolean('active');
            $table->string('country',100);
            $table->string('state',100);
            $table->string('city',100);
            $table->string('colony',100);
            $table->string('address', 100);
            $table->string('post_code',100);
            $table->string('phone_number',10);
            $table->text('references_address');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
