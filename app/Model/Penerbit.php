<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    /** @var string property nama tabel */
    protected $table = "penerbit";
    protected $primaryKey = "id";
    protected $incremental = true;
}
