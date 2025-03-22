@extends('layouts.ecommerce')

@section('content')
<div class="container py-5">
    <div class="text-center mb-4">
        <div class="mb-4">
            <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
        </div>
        <h1>Order Placed Successfully!</h1>
        <p>Thank you for your order. Your order number is: <strong>#{{ $order->id }}</strong></p>
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            <h5>Order Details</h5>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h6>Shipping Address:</h6>
                    <p>{{ $order->shipping_address }}</p>
                </div>
                <div class="col-md-6">
                    <h6>Contact Number:</h6>
                    <p>{{ $order->phone }}</p>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>${{ number_format($item->product->price, 2) }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-end"><strong>Total:</strong></td>
                            <td><strong>${{ number_format($order->total_price, 2) }}</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    
    <div class="text-center">
        {{-- change route to user products page --}}
        <a href="{{ route('products.index') }}" class="btn btn-primary">Continue Shopping</a>
    </div>
</div>
@endsection