<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   return view("master.index");
});

Route::prefix("/buku")->group(function() {
    Route::get("/", "BukuController@list");
    // Nampilkan Form
    // Route::get("/buku/add-form", "BukuController@addForm")->name("form-buku");
    // Ini tanpa fungsi controller, bisa langsung tampilkan!
    Route::view("/add-form", "buku.add");
    Route::post("/add-form", "BukuController@addData");
    Route::get("/edit-form", "BukuController@editForm");
    Route::patch("/edit-form", "BukuController@edit");
    // Nambahkan Data!
    Route::get("/add-data", "BukuController@addData");
});

Route::prefix("/genre")->group(function() {
    Route::get("/", "GenreController@list")->name("genre-list");
    // Form Add Genre!
    Route::view("/add","genre.add");
    Route::post("/add", "GenreController@add");

    // Ini Route untuk View Edit
    Route::get("/{id}/edit", "GenreController@editForm")
        ->where("id", "[0-9]+");
    // Belajar di regexr.com untuk regex
    Route::patch("/{id}/edit", "GenreController@editData");
    Route::delete("/{id}", "GenreController@deleteData");
});