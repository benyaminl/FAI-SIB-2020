<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BukuSearchResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"             => $this->id,
            "nama"           => $this->judul_buku,
            "penerbit"       => $this->Penerbit->nama_penerbit,
            "jumlah_halaman" => $this->jumlah_halaman,
            "tahun"          => $this->tahun_terbit
        ];
    }
}
