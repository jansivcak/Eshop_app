<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'short_descr',
        'long_descr',
        'price',
        'pohlavie',
        'has_s',
        'has_m',
        'has_l',
        'has_xl',
        'group_id',
        'brand_id',
        'type_id',
        'category_id',
    ];



    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }


    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function mainPhoto()
    {
        return $this->hasOne(Photo::class)->where('main', true);
    }
}
