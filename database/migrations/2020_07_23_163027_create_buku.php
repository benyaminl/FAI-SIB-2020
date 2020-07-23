<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string("kode_buku")->nullable();
            $table->string("judul_buku")->nullable();
            $table->integer("jumlah_buku")->nullable();
            $table->integer("tahun_terbit")->nullable();
            $table->string("kota_terbit")->nullable();
            $table->integer("jumlah_halaman")->nullable();
            $table->string("pengarang_buku")->nullable();
            $table->string("isbn")->nullable();
            $table->longText("keterangan")->nullable();
            $table->string("gambar")->nullable();
            $table->unsignedBigInteger("id_penerbit");
            $table->timestamps();
        });

        Schema::table("buku", function(Blueprint $table) {
            // Foreign Key
            $table->foreign("id_penerbit")->references("id")->on("penerbit");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
}
