<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tp_product', function (Blueprint $table) {
            $table->foreign('category_id')->references('tp_category')->on('id');
            $table->foreign('brand_id')->references('tp_brand')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tp_product', function (Blueprint $table) {
            //
        });
    }
}
