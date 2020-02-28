<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTpBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tp_bill', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned();
            $table->string('address',255)->nullable();
            $table->string('status',255)->nullable();
            $table->string('note',255)->nullable();
            $table->string('date_recive',255)->nullable();
            $table->string('date_delivery',255)->nullable();
            $table->integer('total')->nullable();
            $table->timestamps();
            $table->softDeletes();
            //Foreign
            $table->foreign('user_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tp_bill');
    }
}
