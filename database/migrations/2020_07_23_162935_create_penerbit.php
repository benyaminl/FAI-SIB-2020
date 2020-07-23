<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerbit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerbit', function (Blueprint $table) {
            $table->id();
            $table->string("nama_penerbit")->nullable();
            $table->string("alamat_penerbit")->nullable();
            $table->string("telepon")->nullable();
            $table->string("email")->nullable();
            $table->string("website")->nullable();
            $table->string("gambar")->nullable();
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
        Schema::dropIfExists('penerbit');
    }
}
