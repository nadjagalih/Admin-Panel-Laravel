<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderOrder extends Model
{
    protected $table = 'order_order';

    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
