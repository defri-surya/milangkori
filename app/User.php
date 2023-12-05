<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'role', 'kode_registrasi', 'email', 'password', 'no_hp',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function perusahaan()
    {
        return $this->hasOne(Perusahaan::class);
    }

    public function pengelolawisata()
    {
        return $this->hasOne(Pengelolawisata::class);
    }

    public function pencaker()
    {
        return $this->hasOne(Pencaker::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    // public function bookingpaket()
    // {
    //     return $this->hasMany(Bookingpaket::class);
    // }
}
