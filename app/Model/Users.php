<?php

namespace App\Model;

use App\Pinjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Users extends User
{
    protected $table = "users";
    protected $primaryKey = "id";
    protected $incremental = true;
    
    // Ini menyatakan bahwa model user menggunakan timestamp!
    public $timestamps = true;

    // Menentukan kolom yang dipakai, secara default, kalau
    // pakai timestamps, pasti ke kolom-kolom ini
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function Pinjaman() {
        return $this->hasMany(Pinjaman::class, "id_users", "id");
    }
}
