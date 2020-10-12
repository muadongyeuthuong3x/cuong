<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Spkhachhangmmua extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spmua', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('card_user');
            $table->float('price');
            $table->integer('quanty');
            $table->integer('card_tensp')->unsigned();
            $table->integer('idspanhttlh');
            $table->foreign('card_tensp')->references('id')->on('TenSanPham')->onDelete('cascade');
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
        //
    }
}
