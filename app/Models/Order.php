<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'cart_id',
        'order_number',
        'status',             // pending, paid, shipped, delivered, cancelled
        'subtotal_cents',
        'discount_cents',
        'shipping_cents',
        'tax_cents',
        'total_cents',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function orderStatusEvents()
    {
        return $this->hasMany(OrderStatusEvent::class);
    }

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }
    public function isGuest(): bool {
        return is_null($this->user_id);
    }
}
