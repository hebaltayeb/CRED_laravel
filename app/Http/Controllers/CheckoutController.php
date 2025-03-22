<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        // Check if user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to checkout.');
        }
        
        $cartItems = Session::get('cart', []);
        
        // Check if cart is empty
        if (empty($cartItems)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }
        
        $totalPrice = 0;
        $products = [];
        
        foreach ($cartItems as $id => $quantity) {
            $product = Product::find($id);
            if ($product) {
                // Check if product is in stock
                if ($product->quantity < $quantity) {
                    return redirect()->route('cart.index')
                        ->with('error', "Not enough stock for {$product->name}. Only {$product->quantity} available.");
                }
                
                $products[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $quantity,
                    'subtotal' => $product->price * $quantity
                ];
                
                $totalPrice += $product->price * $quantity;
            }
        }
        
        $user = Auth::user();
        
        return view('checkout.index', compact('products', 'totalPrice', 'user'));
    }
    
    public function process(Request $request)
    {
        // Validate checkout data
        $validatedData = $request->validate([
            'shipping_address' => 'required|string',
            'phone' => 'required|string',
            'coupon' => 'nullable|string',
        ]);
        
        // Get cart contents
        $cartItems = Session::get('cart', []);
        
        // Check if cart is empty
        if (empty($cartItems)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }
        
        $totalPrice = 0;
        $orderItems = [];
        
        // Calculate total price and prepare order items
        foreach ($cartItems as $productId => $quantity) {
            $product = Product::find($productId);
            
            if (!$product || $product->quantity < $quantity) {
                return redirect()->route('cart.index')
                    ->with('error', 'Some products are no longer available in the requested quantity.');
            }
            
            $totalPrice += $product->price * $quantity;
            $orderItems[] = [
                'product_id' => $productId,
                'quantity' => $quantity
            ];
            
            // Reduce product quantity
            $product->quantity -= $quantity;
            $product->save();
        }
        
        // Apply coupon discount if applicable
        if (!empty($validatedData['coupon'])) {
            // Here you would implement your coupon system logic
            // For example:
            // $discount = $this->applyCoupon($validatedData['coupon'], $totalPrice);
            // $totalPrice -= $discount;
        }
        
        // Create order
        $order = Order::create([
            'total_price' => $totalPrice,
            'user_id' => Auth::id(),
            'shipping_address' => $validatedData['shipping_address'],
            'phone' => $validatedData['phone'],
            'coupon' => $validatedData['coupon'],
            'status' => 'Pending'
        ]);
        
        // Create order items
        foreach ($orderItems as $item) {
            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity']
            ]);
        }
        
        // Clear cart
        Session::forget('cart');
        
        return redirect()->route('checkout.success', ['order' => $order->id]);
    }
    
    public function success($orderId)
    {
        $order = Order::with('items.product')->findOrFail($orderId);
        
        // Ensure user can only view their own orders
        if ($order->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('checkout.success', compact('order'));
    }
}
