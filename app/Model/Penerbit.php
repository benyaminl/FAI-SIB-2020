<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;

class Penerbit extends Model
{
    use SoftDeletes;
    /** @var string property nama tabel */
    protected $table = "penerbit";
    protected $primaryKey = "id";
    protected $incremental = true;

    const DELETED_AT = "deleted_at";

    public function forceDelete() {
        File::delete(\storage_path("/app/public/images/".$this->gambar));
        return parent::forceDelete();
    }
}
