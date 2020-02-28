<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTpBillDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tp_bill_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bill_id')->nullable()->unsigned();
            $table->integer('product_detail_id')->nullable()->unsigned();
            $table->integer('quantity')->nullable();
            $table->integer('total')->nullable();
            $table->timestamps();
            $table->softDeletes();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tp_bill_detail');
    }
}
