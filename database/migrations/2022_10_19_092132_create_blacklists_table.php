<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlacklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blacklists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email',191)->unique();
            $table->string('handphone_number')->nullable();
            $table->string('ic')->max(12)->nullable();
            $table->string('bank_account_number1')->nullable();
            $table->string('bank_account_number2')->nullable();
            $table->string('bank_account_number3')->nullable();
            $table->string('gender')->nullable();
            $table->string('reason');
            $table->string('remark')->nullable();
            $table->integer('created_by')->unsigned();
            $table->string('deleted_by')->nullable();
            $table->string('social_media_account')->nullable();
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
        Schema::dropIfExists('blacklists');
    }
}
