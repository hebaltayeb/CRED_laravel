<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'image_path',
        'is_active'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItems::class, 'product_id', 'id');
    }
}