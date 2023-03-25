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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prefix_id');
            $table->foreign('prefix_id')->references('id')->on('prefixes')->onDelete('cascade');
            $table->string('name');
            $table->string('email')->unique();
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->string('phone');
            $table->string('postal');
            $table->string('password');
            $table->string('role');
            $table->timestamp('updated_at');
            $table->timestamp('created_at')->nullable()->default(null);

            // $table->rememberToken();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
