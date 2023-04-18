<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'order_number',
        'status',
        'total',
        'payment_method',
        'payment_status',
        'payment_id',
        'address_id',
        'coupon_code',
        'coupon_amount',
        'created_at',
        'cancelled_at',
        'completed_at',
        'delivery_at'
    ];
}
