<?php

namespace App\Http\Controllers;

use App\Model\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function list() {
        $arrayPenerbit = Penerbit::get();
        return \view("penerbit.list", [
            "data" => $arrayPenerbit
        ]);
    }

    public function addForm() {
        return view("penerbit.add");
    }

    public function add(Request $request) {
        $input = $request->validate([
            "nama_penerbit"   => "required|min:3",
            "alamat_penerbit" => "required|min:5",
            "email"           => "email",
            "telepon"         => "numeric",
            "gambar"          => "required"
        ]);

        $penerbit = new Penerbit();
        $penerbit->nama_penerbit   = $input["nama_penerbit"];
        $penerbit->alamat_penerbit = $input["alamat_penerbit"];
        $penerbit->email           = $input["email"];
        $penerbit->telepon         = $input["telepon"];
        $penerbit->gambar          = $input["gambar"];
        $result                    = $penerbit->save();

        if ($result) {
            return \redirect("/penerbit")
                    ->with("success", "Berhasil Input Penerbit!");
        } else {
            return \redirect("/penerbit")
                    ->with("error", "Gagal Input Penerbit!");
        }
    }

    public function editForm($id) {
        $penerbit = Penerbit::findOrFail($id);

        return view("penerbit.edit", [
            "data" => $penerbit
        ]);
    }

    public function edit(Request $request, $id) {
        $input = $request->validate([
            "nama_penerbit"   => "required|min:3",
            "alamat_penerbit" => "required|min:5",
            "email"           => "email",
            "telepon"         => "numeric",
            "gambar"          => "required"
        ]);

        $penerbit = Penerbit::findOrFail($id);
        $penerbit->nama_penerbit   = $input["nama_penerbit"];
        $penerbit->alamat_penerbit = $input["alamat_penerbit"];
        $penerbit->email           = $input["email"];
        $penerbit->telepon         = $input["telepon"];
        $penerbit->gambar          = $input["gambar"];
        $result                    = $penerbit->save();

        if ($result) {
            return \redirect("/penerbit")
                    ->with("success", "Berhasil Edit Penerbit!");
        } else {
            return \redirect()->back()
                    ->with("error", "Gagal Edit Penerbit!");
        }
    }

    public function delete($id) {
        $penerbit = Penerbit::findOrFail($id);
        $result = $penerbit->delete();

        if ($result) {
            return \redirect("/penerbit")
                    ->with("success", "Berhasil Delete Penerbit!");
        } else {
            return \redirect()->back()
                    ->with("error", "Gagal Delete Penerbit!");
        }
    }

    public function collectionForm(Request $request) {
        if (!$request->session()->has("collect")) {
            $data = \collect([]);    
        } else {
            $data = \collect(\json_decode($request->session()->get("collect"), true));
        }
        dd($data);
        return \view("penerbit.collection", [
            "data" => $data
        ]);
    }

    public function addCollection(Request $request) {
        if (!$request->session()->has("collect")) {
            $data = \collect([]);    
        } else {
            $data = \collect(\json_decode($request->session()->get("collect"), true));
        }

        $data->push($request->input("nama"));
        $request->session()->put("collect", json_encode($data));
        return \redirect()->back();
    }
}
