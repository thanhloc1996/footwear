<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tp_comment', function (Blueprint $table) {
            $table->foreign('user_id')->references('tp_user')->on('id');
            $table->foreign('product_id')->references('tp_product')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tp_comment', function (Blueprint $table) {
            //
        });
    }
}
