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

// Route::get('/', function () {
//    return view("master.index");
// });

Route::get("/", "BukuController@searchForm");
Route::get("/pencarian/buku", "BukuController@searchJson");
// Ini Route Pagination
Route::get("/pencarian/buku-pagination", "BukuController@pencarianPagination");
Route::view("pencarian/buku-pagination-ajax","pencarian.ajax-pagination");
Route::get("/pencarian/pagination-ajax", "BukuController@pencarianPaginationAjax");

Route::middleware("auth")->group(function(){
    Route::prefix("/buku")->group(function() {
        Route::get("/", "BukuController@list");
        // Untuk detail buku, tampilkan data genre!
        Route::get("/{id}", "BukuController@detail")
        ->where("id", "[0-9]+");
        // Nampilkan Form
        Route::get("/add-form", "BukuController@addForm")->name("form-buku");
        // Ini tanpa fungsi controller, bisa langsung tampilkan!
        // Route::view("/add-form", "buku.add");
        Route::post("/add-form", "BukuController@addData");
        Route::get("/{id}/edit", "BukuController@editForm");
        // INi EDIT PAth/Method
        Route::patch("/{id}/edit", "BukuController@edit");
        // Nambahkan Data!
        Route::get("/add-data", "BukuController@addData");
        Route::delete("/{id}/delete", "BukuController@delete");
    });
    
    Route::prefix("/genre")->group(function() {
        Route::get("/", "GenreController@list")->name("genre-list");
        // Form Add Genre!
        Route::view("/add","genre.add");
        Route::post("/add", "GenreController@add");
    
        // Ini Route untuk View Edit
        Route::get("/{id}/edit", "GenreController@editForm");
            // ->where("id", "[0-9]+");
        // Belajar di regexr.com untuk regex
        Route::patch("/{id}/edit", "GenreController@editData");
        Route::delete("/{id}", "GenreController@deleteData");
    });
    
    Route::prefix("penerbit")->group(function() {
        Route::get("/", "PenerbitController@list");
    
        Route::get("/add", "PenerbitController@addForm");
        Route::post("/add", "PenerbitController@add");
    
        Route::get("/collection", "PenerbitController@collectionForm");
        Route::post("/collection", "PenerbitController@addCollection");
    
        Route::get("/{id}/edit", "PenerbitController@editForm");
        Route::patch("/{id}/edit", "PenerbitController@edit");
    
        Route::delete("/{id}", "PenerbitController@delete");
    });
    
    Route::prefix("users")->group(function() {
        Route::get("/", "UserController@list");
    
        Route::get("/add", "UserController@addForm");
        Route::post("/add", "UserController@add");
    
        Route::get("/{id}/edit", "UserController@editForm");
        Route::patch("/{id}/edit", "UserController@edit");
    
        Route::delete("/{id}", "UserController@delete");
    });
});

Route::view("/login", "auth.login")->name("login")->middleware("guest");
Route::post("/login", "LoginController@login")->middleware("guest");
Route::get("/logout", "LoginController@logout");