<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategoripaketwisata extends Model
{
    protected $table = 'kategori_paket_wisata';

    protected $guarded = [];
    // protected $primaryKey = 'id';

    public function paketwisata()
    {
        return $this->hasMany(Paketwisata::class, 'kategori_paket_wisata_id'); 
    }
}
