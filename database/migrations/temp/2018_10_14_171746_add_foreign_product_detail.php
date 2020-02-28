<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignProductDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tp_product_detail', function (Blueprint $table) {
            $table->foreign('product_id')->references('tp_product')->on('id');
            $table->foreign('color_id')->references('tp_color')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tp_product_detail', function (Blueprint $table) {
            //
        });
    }
}
