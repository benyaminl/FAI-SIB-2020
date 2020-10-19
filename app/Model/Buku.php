<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = "buku";
    protected $primaryKey = "id";

    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ["updated_at"];

    protected $hidden = [
        "created_at", 
        "updated_at"
    ];

    public function Kategori() {
        return $this->belongsToMany(Genre::class, "genre_buku", "id_buku", "id_genre");
    }

    public function Penerbit() {
        return $this->hasOne(Penerbit::class, "id", "id_penerbit");
    }
}
