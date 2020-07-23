<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_stok_buku");
            $table->unsignedBigInteger("id_buku"); // Ga BCNF supaya query ne mudah
            $table->unsignedBigInteger("id_users"); // Ga BCNF supaya query ne mudah
            $table->date("tanggal_pinjam");
            $table->date("tanggal_kembali")->comment("Tanggal Buku Harus Kembali Kapan");
            $table->date("tanggal_buku_dikembalikan")->comment("Tanggal buku dikembalikan peminjam");
            $table->integer("status")->default(0)->comment("Kalau 0 berarti belum dipinjam, kalau 1 sedang dipinjam, 2 dikembalikan");
            $table->timestamps();
        });

        Schema::table("pinjaman", function(Blueprint $table) {
            $table->foreign("id_buku")->references("id")->on("buku");
            $table->foreign("id_stok_buku")->references("id")->on("stok_buku");
            $table->foreign("id_users")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjaman');
    }
}
