<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePenerbit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Nambah Kolom SoftDelete
        Schema::table("penerbit", function(Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop SoftDelete
        Schema::table("penerbit", function(Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
