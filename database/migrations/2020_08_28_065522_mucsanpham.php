<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mucsanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MucSanPham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tenmucsp');
            $table->integer('id_hangsp')->unsigned();
            $table->foreign('id_hangsp')->references('id')->on('HangSanPham')->onDelete('cascade');
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
        Schema::dropIfExists('MucSanPham');
    }
}
