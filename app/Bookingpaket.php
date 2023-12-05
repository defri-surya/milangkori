<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookingpaket extends Model
{
    protected $table = 'bookingpaket';

    protected $guarded = ['id'];

    public function pengelolawisata()
    {
        return $this->hasOne(Pengelolawisata::class, 'id', 'pengelola_wisata_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function paketWisata()
    {
        return $this->hasOne(Paketwisata::class, 'id', 'paket_wisata_id');
    }
}
