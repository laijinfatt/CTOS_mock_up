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
            $table->string('name');
            $table->string('username');
            $table->string('email',191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('ic')->max(12)->nullable();
            $table->string('bank_account_number1')->nullable();
            $table->string('bank_account_number2')->nullable();
            $table->string('bank_account_number3')->nullable();
            $table->string('handphone_number')->nullable();
            $table->string('gender')->nullable();
            $table->integer('type')->unsigned();
            $table->integer('permission')->unsigned();
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
