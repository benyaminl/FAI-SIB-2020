<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // HTTP REQUEST! 
use Illuminate\Support\Facades\Cookie;

class BukuController extends Controller
{
    public function list() {
        $dataBuku = [];

        return view("buku.list", [
            "data" => $dataBuku
        ]);
    }

    public function addForm() {
        
    }

    public function addData(Request $request) {
        
        // Taking data from FORM!
        $namaBuku = $request->input("nama_buku");
        
        return \redirect("/buku")
                // FLASH SESSION! VVVV <=== Hanya berlaku sekali muncul!
                ->with("success", "Berhasil add buku!");
    }

    public function editForm(Request $request) {
        $dataBuku = [];
        if ($data == null) {
            return \response("Not Found!", 404);
        }

        return \view("buku.edit", [
            "data" => $data
        ]);
    }

    public function edit(Request $request) {
        $dataBuku   = \json_decode(Cookie::get("buku"));
        $id         = $request->input("id");
        $indexArray = null;
        foreach ($dataBuku as $key => $value) {
            if ($value->id == $id) {
                $indexArray = $key;
            }
        }

        if ($indexArray == null) {
            return \response("Not Found!", 404);
        }

        $dataBuku[$indexArray]->nama = $request->input("nama_buku");
        Cookie::queue(Cookie::make("buku", \json_encode($dataBuku), 50000));
        
        return \response("Update Berhasil! Silahkan ke 
            <a href='".url("/buku")."'>home</a>");
    }
}
