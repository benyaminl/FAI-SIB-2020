<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class GenreController extends Controller
{
    public function list(Request $request) {
        $data = DB::select("SELECT * FROM genre");

        return \view("genre.list", [
            "data" => $data
        ]);
    }

    public function add(Request $request) {
        $input = $request->validate([
            "nama_genre" => "required|min:4"
        ]);

        $query = "INSERT INTO genre(nama_genre,id_genre_utama,keterangan) VALUES(:nama,0,'')";
        $result = DB::insert($query, [
            "nama" => $input["nama_genre"]
        ]);

        if ($result) {
            return \redirect()
                ->route("genre-list")
                ->with("success", "Berhasil menambah genre baru");    
        } else {
            return \redirect()
            ->back()
            ->with("error", "Gagal menambah genre!");
        }
        
    }

    public function editForm(Request $request, $id) {
        $index = -1; $viewData = null;
        // Cari apakah ada genre nya, kalau tidak biarkan -1
        if (DB::select("SELECT count(*) as jumlah 
                FROM genre WHERE id = :id", ["id" => $id])[0]->jumlah > 0) {
            $index = $id;
            // ini untuk nampilkan data
            $viewData = DB::select("SELECT * FROM genre where id=:id", ["id" => $id])[0];
        }

        if ($index < 0) {
            \abort(404, "Genre tidak ditemukan!");
        } else {
            return \view("genre.edit", [
                "data"=> $viewData
            ]);
        }
    }

    public function editData(Request $request, $id) {
        $index = -1;
        
        // Cari apakah ada genre nya, kalau tidak biarkan -1
        if (DB::select("SELECT count(*) as jumlah 
                FROM genre WHERE id = :id", ["id" => $id])[0]->jumlah > 0) {
            $index = $id;
        }
        
        $input = $request->validate([
            "nama_genre" => "required|min:4"
        ]);

        if ($index < 0) {
            return \redirect()
                    ->route("genre-list")
                    ->with("error", "Data genre tidak di update karena tidak ditemukan!");
        } else {
            // Melakukan Update data!
            
            // Ini update data
            DB::update("UPDATE genre SET nama_genre = :nama WHERE id = :id", [
                "id" => $id,
                "nama" => $input["nama_genre"]
            ]);

            return \redirect()
                    ->route("genre-list")
                    ->with("success", "Data genre berhasil di update!");
        }
    }

    public function deleteData(Request $request, $id) {
        $index = -1;
        
        $data = [];

        if ($index < 0) {
            return \redirect()
                    ->route("genre-list")
                    ->with("error", "Data genre tidak di delete karena tidak ditemukan!");
        } else {
            unset($data[$index]); // Session Index DEletE!
            Session::put("genre", \json_encode($data)); // di timpa session nya!

            return \redirect()
                    ->route("genre-list")
                    ->with("success", "Data genre berhasil di delete!");
        }
    }
}
