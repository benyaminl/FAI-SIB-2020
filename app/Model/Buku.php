<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = "buku";
    protected $primaryKey = "id";

    public function Kategori() {
        return $this->belongsToMany(Genre::class, "genre_buku", "id_buku", "id_genre");
    }
}
