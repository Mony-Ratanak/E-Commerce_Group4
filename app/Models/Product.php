<?php

// Product.php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $casts = [
        'images' => 'json',
    ];
    protected $fillable = ['name', 'category_id', 'brand_id', 'pricing', 'description', 'images', 'discounted_price', 'discount_percent'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            $product->discounted_price = ($product->pricing * (100 - $product->discount_percent))/100;
        });
    }
}


