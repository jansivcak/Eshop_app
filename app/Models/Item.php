<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
        'price',
        'size',
    ];


    public function shopping_cart()
    {
        return $this->belongsTo(ShoppingCart::class, 'cart_id');
    }


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
