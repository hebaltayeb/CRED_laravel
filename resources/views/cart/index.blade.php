@extends('layouts.ecommerce')

@section('content')
<div class="container py-5">
    <h1>Your Shopping Cart</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    @if(count($products) > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($product['image_path'])
                                        <img src="{{ asset('storage/' . $product['image_path'])}}" alt="{{ $product['name'] }}" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                                    @endif
                                    <span>{{ $product['name'] }}</span>
                                </div>
                            </td>
                            <td>${{ number_format($product['price'], 2) }}</td>
                            <td>
                                <form action="{{ route('cart.update') }}" method="POST" class="d-flex align-items-center">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                    <input type="number" name="quantity" value="{{ $product['quantity'] }}" min="1" class="form-control" style="width: 70px;">
                                    <button type="submit" class="btn btn-sm btn-primary ms-2">Update</button>
                                </form>
                            </td>
                            <td>${{ number_format($product['subtotal'], 2) }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $product['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end"><strong>Total:</strong></td>
                        <td><strong>${{ number_format($totalPrice, 2) }}</strong></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        
        <div class="d-flex justify-content-between mt-4">
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-warning">Clear Cart</button>
            </form>
            
            <a href="{{ route('checkout.index') }}" class="btn btn-success">Proceed to Checkout</a>
        </div>
    @else
        <div class="alert alert-info">
            {{-- change route to userproduct page --}}
            Your cart is empty. <a href="{{ route('products.index') }}">Continue shopping</a> 
        </div>
    @endif
</div>
@endsection