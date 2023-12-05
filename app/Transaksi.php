<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $guarded = ['id'];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'user_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function paketWisata()
    {
        return $this->hasOne(Paketwisata::class, 'id', 'paket_wisata_id');
    }

    public function pengelola()
    {
        return $this->hasOne(Pengelolawisata::class, 'id', 'pengelola_wisata_id');
    }
}
