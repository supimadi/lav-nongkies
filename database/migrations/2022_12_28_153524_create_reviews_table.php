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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("reviewer_id");
            $table->unsignedBigInteger("cafe_id");
            $table->text("review");

            $table->timestamps();
            $table->foreign("reviewer_id")->references("id")->on("users");
            $table->foreign("cafe_id")->references("id")->on("cafes");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
