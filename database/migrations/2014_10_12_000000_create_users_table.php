<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->bigInteger('nik')->unsigned();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('alamat')->nullable();
            $table->string('numb')->nullable();
            $table->enum('jk',['Laki-Laki','Perempuan'])->default('Laki-Laki')->nullable();
            $table->timestamp('ttl')->nullable();
            $table->string('poto')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
