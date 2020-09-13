<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GenreController extends Controller
{
    public function list(Request $request) {
        $data = [];

        return \view("genre.list", [
            "data" => $data
        ]);
    }

    public function add(Request $request) {

        return \redirect()
            ->route("genre-list")
            ->with("success", "Berhasil menambah genre baru");
    }

    public function editForm(Request $request, $id) {
        $index = -1;
        
        $data = []; $viewData = null;
        if ($request->session()->has("genre")) {
            $data = \json_decode($request->session()->get("genre"), true);
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
        
        $data = []; $updateData = null;

        if ($index < 0) {
            return \redirect()
                    ->route("genre-list")
                    ->with("error", "Data genre tidak di update karena tidak ditemukan!");
        } else {
            // Melakukan Update data!
            $updateData["nama"] = $request->input("nama_genre");
            $data[$index]       = $updateData;
            Session::put("genre", \json_encode($data));

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
