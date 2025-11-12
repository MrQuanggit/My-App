<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = [
        'order_id',
        'tracking_number',
        'carrier',
        'status',          // pending, shipped, delivered
        'shipped_at',
        'delivered_at',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function shipmentItems()
    {
        return $this->hasMany(ShipmentItem::class);
    }
}
