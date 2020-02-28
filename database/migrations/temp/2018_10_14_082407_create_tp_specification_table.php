<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTpSpecificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tp_specification', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->nullable()->unsigned();
            $table->integer('ram')->nullable();
            $table->integer('monitor')->nullable();
            $table->integer('os')->nullable();
            $table->string('cpu',255)->nullable();
            $table->integer('rom')->nullable();
            $table->integer('front_camera')->nullable();
            $table->integer('rear_camera')->nullable();
            $table->integer('memory')->nullable();
            $table->integer('pin')->nullable();
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
        Schema::dropIfExists('tp_specification');
    }
}
