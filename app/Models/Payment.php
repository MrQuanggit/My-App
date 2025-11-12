<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'provider',        // stripe, paypal, vnpay...
        'transaction_id',
        'amount_cents',
        'status',          // pending, succeeded, failed
        'paid_at',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function refunds()
    {
        return $this->hasMany(Refund::class);
    }
}
