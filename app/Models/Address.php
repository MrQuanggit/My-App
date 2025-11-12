<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
        'recipient_name',
        'phone',
        'address_line1',
        'address_line2',
        'city',
        'postal_code',
        'country',
        'type',   // billing / shipping
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
