<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'total_price',
        'user_id',
        'shipping_address',
        'phone',
        'coupon',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items() {
        return $this->hasMany(OrderItems::class, 'order_id', 'id');
    }
}
