<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'adress',
        'town',
        'zip',
    ];


    public function order()
    {
        return $this->hasOne(Order::class, 'shipping_id');
    }
}
