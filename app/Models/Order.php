<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_email',
        'product_id',
        'product_name',
        'product_price',
        'order_type',
        'message',
        'custom_price_increase',
        'status',
        'token',
    ];

    protected $casts = [
        'product_price'        => 'float',
        'custom_price_increase' => 'float',
    ];

    public function getTotalPriceAttribute(): float
    {
        return $this->product_price + ($this->custom_price_increase ?? 0);
    }
}
