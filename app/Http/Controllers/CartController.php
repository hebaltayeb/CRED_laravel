<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Session::get('cart', []);
        $totalPrice = 0;
        $products = [];
        
        foreach ($cartItems as $id => $quantity) {
            $product = Product::find($id);
            if ($product) {
                $products[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $quantity,
                    'subtotal' => $product->price * $quantity,
                    'image_path' => $product->image_path
                ];
                $totalPrice += $product->price * $quantity;
            }
        }
        
        return view('cart.index', compact('products', 'totalPrice'));
    }
    
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);
        
        $productId = $request->product_id;
        $quantity = $request->quantity;
        
        // Check if product is in stock
        $product = Product::findOrFail($productId);
        if ($product->quantity < $quantity) {
            return back()->with('error', 'Not enough stock available.');
        }
        
        $cart = Session::get('cart', []);
        
        // If product already in cart, update quantity
        if (isset($cart[$productId])) {
            $cart[$productId] += $quantity;
        } else {
            $cart[$productId] = $quantity;
        }
        
        Session::put('cart', $cart);
        
        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);
        
        $productId = $request->product_id;
        $quantity = $request->quantity;
        
        // Check if product is in stock
        $product = Product::findOrFail($productId);
        if ($product->quantity < $quantity) {
            return back()->with('error', 'Not enough stock available.');
        }
        
        $cart = Session::get('cart', []);
        
        if (isset($cart[$productId])) {
            $cart[$productId] = $quantity;
            Session::put('cart', $cart);
        }
        
        return redirect()->route('cart.index')->with('success', 'Cart updated.');
    }
    
    public function remove($id)
    {
        $cart = Session::get('cart', []);
        
        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }
        
        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }
    
    public function clear()
    {
        Session::forget('cart');
        return redirect()->route('cart.index')->with('success', 'Cart cleared.');
    }
}
