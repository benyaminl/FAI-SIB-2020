<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
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
}
