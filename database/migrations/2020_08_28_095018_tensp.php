<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tensp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TenSanPham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tensp');
            $table->string('slug');
            $table->float('price_nhap')->default('1000');
            $table->float('price_ban')->default('1100');
            $table->text('description')->nullable();
            $table->string('image');
            $table->integer('status')->default(1);
            $table->integer('id_mucsp')->unsigned();
            $table->foreign('id_mucsp')->references('id')->on('MucSanPham')->onDelete('cascade');
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
