<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'prefecture_id',
        'address',
        'temp_price',
        'sale_price',
        'total_price',
        'type',
        'status',
        'payment_type',
        'payment_status',
        'canceled_at',
        'payment_requested_at',
    ];
}
