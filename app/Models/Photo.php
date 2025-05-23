<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image_URL',
        'main'
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
