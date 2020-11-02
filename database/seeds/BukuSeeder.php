<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("buku")
        ->insert([
            "kode_buku"      => Str::random(),
            "judul_buku"     => Str::random(),
            "jumlah_halaman" => 200,
            "jumlah_buku"    => 2,
            "pengarang_buku" => Str::random(),
            "tahun_terbit"   => 1990,
            "kota_terbit"   => Str::random(),
            "id_penerbit"   => 1
        ]);
    }
}
