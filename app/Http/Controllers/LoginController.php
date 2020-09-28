<?php

namespace App\Http\Controllers;

use App\Model\Users;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request) {
        $input = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $data = Users::where("email", "=", $input["email"])->get();
        if ($data->count() <= 0) {
            return \redirect()->back()->with("error", "User tidak ditemukan!");
        } else {
            //set session!
            $request->session()->put("user", $data[0]);
            return \redirect("/buku")->with("success", "Selamat Datang!");
        }
    }

    public function logout(Request $request) {
        $request->session()->forget("user");
        return \redirect("/login")->with("success", "Berhasil logout!");
    }
}
