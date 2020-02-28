<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignBillDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tp_bill_detail', function (Blueprint $table) {
            $table->foreign('bill_id')->references('tp_bill')->on('id');
            $table->foreign('product_detail_id')->references('tp_product_detail')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tp_bill_detail', function (Blueprint $table) {
            //
        });
    }
}
