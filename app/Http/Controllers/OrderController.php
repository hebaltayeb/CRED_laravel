<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    public function index() {

        $orders = Order::all(); // Fetch all orders
        $users = User::all();
        return view('orders.index', compact('orders', 'users')); 

    }

    public function create() {
        
        return view('orders.create');

    }

    public function show($id) {
        $order = Order::with('items.product')->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            'total_price' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
            'shipping_address' => 'required|string',
            'phone' => 'required|string',
            'coupon' => 'nullable|string',
            'status' => 'required|in:Pending,Processing,Shipped,Delivered,Cancelled',
        ]);

        Order::create($validatedData); // Save the order
        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);

        if (request()->ajax()) {
            // Render the edit modal view with the order data
            $view = view('orders.edit', compact('order'))->render();
            return response()->json(['html' => $view]);
        }

        // Fallback: Return a full view if the request is not AJAX (optional)
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:Pending,Processing,Shipped,Delivered,Cancelled',
            'shipping_address' => 'required|string',
            'phone' => 'required|string',
            'coupon' => 'nullable|string',
        ]);

        $order = Order::findOrFail($id);
        $order->update($validatedData);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete(); // This sets the 'deleted_at' timestamp

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }


}
