<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'card_id',
        'user_id',
        'price',
        'shipping_id',
        'payment_method',
        'shipping_method',
    ];

    public function shipping()
    {
        return $this->belongsTo(Shipping::class, 'shipping_id');
    }

    public function cart()
    {
        return $this->belongsTo(ShoppingCart::class, 'card_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
