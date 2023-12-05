<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ratting extends Model
{
    protected $table = 'rattings';

    protected $guarded = ['id'];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'user_id', 'user_id');
    }
}
