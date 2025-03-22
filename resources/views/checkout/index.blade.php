@extends('layouts.ecommerce')

@section('content')
<div class="container py-5">
    <h1>Checkout</h1>
    
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Shipping Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('checkout.process') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="shipping_address" class="form-label">Shipping Address</label>
                            <textarea name="shipping_address" id="shipping_address" rows="3" class="form-control @error('shipping_address') is-invalid @enderror" required>{{ old('shipping_address', $user->address) }}</textarea>
                            @error('shipping_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $user->mobile_number) }}" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="coupon" class="form-label">Coupon Code (optional)</label>
                            <input type="text" name="coupon" id="coupon" class="form-control @error('coupon') is-invalid @enderror" value="{{ old('coupon') }}">
                            @error('coupon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('cart.index') }}" class="btn btn-secondary">Back to Cart</a>
                            <button type="submit" class="btn btn-primary">Place Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Order Summary</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach($products as $product)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <span>{{ $product['name'] }}</span>
                                    <small class="d-block text-muted">Qty: {{ $product['quantity'] }}</small>
                                </div>
                                <span>${{ number_format($product['subtotal'], 2) }}</span>
                            </li>
                        @endforeach
                    </ul>
                    
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex justify-content-between">
                            <strong>Total:</strong>
                            <strong>${{ number_format($totalPrice, 2) }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection