<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_buku', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_buku");
            $table->integer("status_pinjam")->default(1);
            $table->string("kode_stok")->default(1);
            $table->string("lokasi");
            $table->timestamps();
        });

        Schema::table("stok_buku", function(Blueprint $table) {
            // Foreign Key
            $table->foreign("id_buku")->references("id")->on("buku");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stok_buku');
    }
}
