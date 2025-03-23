<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function addCoupon()
    {
        DB::table('coupons')->insert([
            'code' => 'DISCOUNT10',
            'discount' => 10.00,
            'expires_at' => now()->addDays(30),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['message' => 'Coupon added successfully']);
    }
}
