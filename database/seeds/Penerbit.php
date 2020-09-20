<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Penerbit extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("penerbit")->insert([
            "nama_penerbit"   => "Elex Media Komputindo",
            "alamat_penerbit" => "Jl Palmerah Barat 29 - 33 ",
            "telepon"         => "021-53650110",
            "website"         => "http://elemedia.id",
            "gambar"          => "https://elexmedia.id/img/logo-elexmedia-komputindo.png"
        ]);

        DB::table("penerbit")->insert([
            "nama_penerbit"   => "Erlangga",
            "alamat_penerbit" => "Jl. H. Baping Raya No. 100 Ciracas, Jakarta Timur 13740",
            "telepon"         => "(021) 871 7006",
            "website"         => "http://erlangga.co.id",
            "gambar"          => "https://erlangga.co.id/images/stories/tfile_gall_2_1.png"
        ]);

        DB::table("penerbit")->insert([
            "nama_penerbit"   => "Gagas Media",
            "alamat_penerbit" => "Jl. H. Montong No. 57 Ciganjur Jagakarsa Jakarta Selatan 12360",
            "telepon"         => "021 78883030",
            "website"         => "http://gagasmedia.net",
            "gambar"          => "https://gagasmedia.net/wp-content/uploads/2019/05/logo-gagasmedia.png"
        ]);
    }
}
