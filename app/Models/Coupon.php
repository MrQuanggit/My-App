<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'code',
        'type',              // percentage / fixed
        'value',
        'max_uses',
        'used_count',
        'starts_at',
        'expires_at',
    ];

    public function couponRedemptions()
    {
        return $this->hasMany(CouponRedemption::class);
    }
}
