<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('order_menu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id'); // ID Order
            $table->unsignedBigInteger('menu_id'); // ID Menu
            $table->integer('jumlah'); // Jumlah menu dalam order
            $table->timestamps();

            // Menambahkan relasi ke tabel orders dan menus
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
        });
    }

};
