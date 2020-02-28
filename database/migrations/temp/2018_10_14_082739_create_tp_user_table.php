<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTpUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tp_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->nullable()->unsigned();
            $table->string('first_name',255)->nullable();
            $table->string('last_name',255)->nullable();
            $table->string('image',255)->nullable();
            $table->string('address',255)->nullable();
            $table->string('phone',255)->nullable();
            $table->string('email')->unique();
            $table->string('password',255);
            $table->integer('gender')->nullable()->comment('1:male 2:female');

            $table->softDeletes();
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
        Schema::dropIfExists('tp_user');
    }
}
