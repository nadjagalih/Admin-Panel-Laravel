<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'stock', 'image_url',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    public function cartItems()
    {
        return $this->hasMany(cart_item::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderOrder::class);
    }
}
