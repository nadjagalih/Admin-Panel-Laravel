<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $fillable = [
        'user_id', 'recipient_name', 'address_line1', 'address_line2',
        'city', 'postal_code', 'country', 'phone_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
