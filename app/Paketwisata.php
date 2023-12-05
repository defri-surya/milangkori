<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paketwisata extends Model
{
    protected $table = 'paket_wisata';

    protected $guarded = ['id'];

    public function pengelolawisata()
    {
        return $this->hasOne(Pengelolawisata::class, 'id', 'pengelola_wisata_id');
    }

    public function kategori_paket_wisata()
    {
        return $this->belongsTo(Kategoripaketwisata::class);
    }

    public function detail_paketwisata($id)
    {
        $data   = Paketwisata::where("id", $id)->first();

        // return view('Homepage.cart', compact('data'));
        return $data;
    }

    public function ratting()
    {
        return $this->belongsTo(Ratting::class, 'id', 'wisata_id');
    }
    
    // public function itenerary()
    // {
    //     return $this->hasMany(Itenerary::class,'paket_id','id');
    // }
}
