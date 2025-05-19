<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['order_id', 'payment_method', 'amount', 'status', 'payment_date'];

    protected $dates = ['payment_date'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
