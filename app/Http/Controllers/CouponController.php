<?php
// app/Http/Controllers/CouponController.php
namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all(); 
        return view('coupons.index', compact('coupons')); 
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|unique:coupons', 
            'discount' => 'required|numeric|min:0',  
        ]);

        $coupon = Coupon::create([
            'code' => $validated['code'],
            'discount' => $validated['discount'],
        ]);

        return response()->json(['coupon' => $coupon], 201); 
    }
}
