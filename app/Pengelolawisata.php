<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengelolawisata extends Model
{
    protected $table = 'pengelolawisatas';

    protected $guarded = ['id'];


    public function paket_wisata()
    {
        return $this->hasMany(Paketwisata::class, 'pengelola_wisata_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
