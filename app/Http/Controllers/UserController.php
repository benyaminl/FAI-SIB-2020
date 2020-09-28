<?php

namespace App\Http\Controllers;

use App\Model\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addForm() {
        return \view("user.add");
    }

    public function add(Request $request) {
        $input = $request->validate([
            "email" => "required|email",
            "password" => "required|string|min:4",
            "name"  => "required|string|min:5",
            "level" => "required"
        ]);

        $user = new Users();
        $user->name     = $input["name"];
        $user->password = password_hash($input["password"], \PASSWORD_DEFAULT);
        $user->email    = $input["email"];
        $user->level_akses = $input["level"];
        $result = $user->save();
        
        if ($result) {
            return \redirect("users/")
                ->with("success", "Berhasil menambah user baru!");
        } else {
            return \redirect("users/")
                ->with("error", "Gagal menambah user baru!");
        }
    }

    public function list() {
        $data = Users::get();
        return view("user.list", [
            "data" => $data
        ]);
    }

    public function editForm(Request $request, $id) {
        $data = Users::findOrFail($id);

        return view("user.edit", [
            "data" => $data
        ]);
    }

    public function edit(Request $request, $id) {
        $input = $request->validate([
            "email" => "required|email",
            "name"  => "required|string|min:5",
            "level" => "required"
        ]);

        $user = Users::findOrFail($id);
        $user->name     = $input["name"];
        
        if ($request->input("password") != "") {
            $request->validate([
                "password" => "string|min:5"
            ]);
            $user->password = password_hash($request->input("password"), \PASSWORD_DEFAULT);
        }

        $user->email    = $input["email"];
        $user->level_akses = $input["level"];
        $result = $user->save();
        
        if ($result) {
            return \redirect("users/")
                ->with("success", "Berhasil update user!");
        } else {
            return \redirect("users/")
                ->with("error", "Gagal update user!");
        }
    }

    public function delete($id) {
        $data = Users::findOrFail($id);
        $result = $data->delete();
        if ($result) {
            return \redirect()->back()
                ->with("success", "Berhasil Delete User!");
        } else {
            return \redirect()->back()
                ->with("error", "Gagal Delete User!");
        }
    }
}
