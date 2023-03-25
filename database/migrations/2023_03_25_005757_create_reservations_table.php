<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->date('from');
            $table->date('to');
            $table->unsignedBigInteger('promo_id');
            $table->foreign('promo_id')->references('id')->on('promo')->onDelete('cascade');
            $table->integer('total_adult');
            $table->integer('total_children');
            $table->integer('total_room');
            $table->integer('total_price');
            $table->text('additional');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
