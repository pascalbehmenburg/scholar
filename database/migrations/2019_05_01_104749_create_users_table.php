<?php

use Illuminate\Support\Facades\Schema;
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
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('forename', 50);
            $table->string('surname', 50);
            $table->date('birthdate');
            $table->string('city', 100);
            $table->string('street', 100);
            $table->string('phone_number', 32);
            $table->enum('rank', ['student', 'teacher', 'admin'])->default('student');
            $table->bigInteger('class_id')->default(1);
            $table->string('password');
            $table->rememberToken();
            $table->dateTime('updated_at');
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
