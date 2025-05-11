<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $table = 'shopping_carts';


    protected $fillable = [
        'customer_id',
        'session_id',
        'paied',
    ];

    /**
     * The user that owns this shopping cart (nullable for guests).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The items in the shopping cart.
     */
    public function items()
    {
        return $this->hasMany(Item::class, 'cart_id');
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'card_id');
    }
}

