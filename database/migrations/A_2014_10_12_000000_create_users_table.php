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
            $table->unsignedBigInteger('prefix_id')->default(1);
            $table->string('name');
            $table->string('email')->unique();
            $table->unsignedBigInteger('country_id')->default(62);
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
