<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // HTTP REQUEST! 
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function list() {
        $dataBuku = DB::table("buku")->get(["id", "judul_buku"]);

        return view("buku.list", [
            "data" => $dataBuku
        ]);
    }

    public function addForm() {
        $dataGenre    = DB::table("genre")->get();
        $dataPenerbit = DB::table("penerbit")->get();

        return \view("buku.add", [
            "dataGenre"    => $dataGenre,
            "dataPenerbit" => $dataPenerbit
        ]);
    }

    public function addData(Request $request) {
        $input = $request->validate([
            "nama_buku" => "required|min:4"
        ]);
        
        DB::beginTransaction();

        $result = DB::table("buku")
        ->insert([
            "kode_buku"      => $request->input("kode_buku"),
            "judul_buku"     => $request->input("nama_buku"),
            "jumlah_halaman" => $request->input("jumlah_halaman"),
            "jumlah_buku"    => $request->input("jumlah_buku"),
            "pengarang_buku" => $request->input("nama_pengarang"),
            "tahun_terbit"   => $request->input("tahun_terbit"),
            "kota_terbit"   => $request->input("kota_terbit"),
            "id_penerbit"   => $request->input("penerbit")
        ]);

        // Ini ambil last insert ID, buku terakhir yang diinsert
        $query = "SELECT id FROM buku order by id desc limit 1";
        $id = DB::select($query)[0]->id;
        $status = true;
        
        foreach ($request->input("genre_buku") as $key => $value) {
            // Check status dan di logic operation AND-ing, karena insert return bool
            $status = $status && DB::table("genre_buku")->insert([
                "id_buku" => $id,
                "id_genre" => $value
            ]);
        }

        if ($status && $result) { // Jika insert buku dan genere berhasil, maka commit
            DB::commit();
            return \redirect("/buku")
                // FLASH SESSION! VVVV <=== Hanya berlaku sekali muncul!
                ->with("success", "Berhasil add buku!");
        } else { //Kalau gagal di rollback
            DB::rollBack();
            return \redirect("/buku")
                // FLASH SESSION! VVVV <=== Hanya berlaku sekali muncul!
                ->with("error", "Gagal add buku!");
        }
        
    }

    public function editForm($id) {

        $data = DB::table("buku")
        ->where("id", "=", $id)
        ->get();

        if (count($data) <= 0) {
            return \response("Not Found!", 404);
        }

        // Data genre dari DB
        $gb = DB::table("genre_buku")
                    ->where("id_buku", "=", $id)
                    ->get(["id_genre"]);
        $genreBuku = [];

        foreach ($gb as $key => $value) {
            $genreBuku[] = $value->id_genre;
        }

        $genre = DB::table("genre")->get();

        return \view("buku.edit", [
            "data" => $data[0],
            "genreBuku" => $genreBuku,
            "genre" => $genre
        ]);
    }

    public function edit(Request $request, $id) {
        DB::beginTransaction();
        $result = DB::table("buku")
                ->where("id", "=", $id)
                ->update([
                    "judul_buku" => $request->input("nama_buku")
                ]);
        // Hapus dari Genre Buku, karena buku sudah dihapus, tidak mungkin memiliki genre
        $result = $result +  DB::table("genre_buku")
                    ->where("id_buku", "=", $id)
                    ->delete();
        
        $status = true;
        
        foreach ($request->input("genre_buku") as $key => $value) {
            // Check status dan di logic operation AND-ing, karena insert return bool
            $status = $status && DB::table("genre_buku")->insert([
                "id_buku" => $id,
                "id_genre" => $value
            ]);
        }

        if ($status && $result > 0) {
            DB::commit();
            return \redirect("/buku")
                // FLASH SESSION! VVVV <=== Hanya berlaku sekali muncul!
                ->with("success", "Berhasil update buku!");
        } else { //Kalau gagal di rollback
            DB::rollBack();
            return \redirect("/buku")
                // FLASH SESSION! VVVV <=== Hanya berlaku sekali muncul!
                ->with("error", "Gagal update buku!");
        }
    }

    public function delete($id) {
        // Mulai Transaction
        DB::beginTransaction();
        // Hapus dari tabel Buku
        $result = DB::table("buku")
                    ->where("id", "=", $id)
                    ->delete();
        // Hapus dari Genre Buku, karena buku sudah dihapus, tidak mungkin memiliki genre
        $result = $result +  DB::table("genre_buku")
                    ->where("id_buku", "=", $id)
                    ->delete();
        
        // Jika data yang dihapus lebih dari 0 maka berhasil terhapus!
        if ($result > 0) {
            DB::commit(); // Kalau berhasil, di commit ke DB!
            return \redirect("/buku")
                // FLASH SESSION! VVVV <=== Hanya berlaku sekali muncul!
                ->with("success", "Berhasil delete buku!");
        } else { // Kalau tidak gagal, dan rollback!
            DB::rollBack();
            return \redirect("/buku")
                // FLASH SESSION! VVVV <=== Hanya berlaku sekali muncul!
                ->with("error", "Gagal delete buku!");
        }
    }

    public function detail($id) {
        $buku = DB::table("buku")
            ->where("id", "=", $id)
            ->get();

        if (count($buku) <= 0) {
            abort(404, "Buku tidak ditemukan!");
        }

        $genreBuku = DB::table("genre_buku", "gb")
            ->join("genre as g", "g.id", "gb.id_genre")
            ->where("gb.id_buku", "=", $id)
            ->get();
        $penerbit = DB::table("penerbit")
            ->where("id", "=", $buku[0]->id_penerbit)
            ->first();

        // Kalau mau ambil query hasil build nya!
        // dd(DB::table("genre_buku", "gb")
        // ->join("genre as g", "g.id", "gb.id_genre")
        // ->where("gb.id_buku", "=", $id)->toSql());

        return \view("buku.detail", [
            "buku"      => $buku[0], // Ini ambil index ke nol karena dia yang pertama ketemu dan pasti index paling awal
            "dataGenre" => $genreBuku, // Array of Genre buku
            "penerbit"  => $penerbit
        ]);
    }
}
