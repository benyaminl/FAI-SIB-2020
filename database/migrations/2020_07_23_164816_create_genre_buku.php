<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenreBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre_buku', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_buku");
            $table->unsignedBigInteger("id_genre");
            $table->timestamps();
        });

        Schema::table("genre_buku", function(Blueprint $table) {
            // Foreign Key
            $table->foreign("id_buku")->references("id")->on("buku");
            $table->foreign("id_genre")->references("id")->on("genre");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_buku');
    }
}
