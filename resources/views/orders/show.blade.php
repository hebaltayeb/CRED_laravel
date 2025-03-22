@extends('layouts.app')

@section('title')
    Show Order
@endsection

@section('content')
<div class="container m-5">
    <div class="my-3">
        <h3>Order 200025-{{$order['id']}} Items</h3>
    </div>

    <div class="my-2">
        <a href="{{route('orders.index')}}" class="btn btn-primary">Go back</a>
    </div>

    <table class="table table-striped table-hover">
        <thead>
        <tr class="table-dark">
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Image</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Price</th>
        </tr>
        </thead>
        <tbody>
            @if (count($order->items))
                @foreach ($order->items as $item)
                    <tr class="align-middle">
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset('storage/' . $item->product->image_path) }}" alt="{{ $item->product->name }}" class="img-fluid" width="80px"></td>
                        <td>{{ $item->product->name }}</td>
                        <td>${{ $item->product->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ $item->product->price * $item->quantity }}</td>
                    </tr>
                @endforeach
                
            @else
            <tr class="align-middle">
                <td colspan="6">This order is empty.</td>
            </tr>
            @endif
        </tbody>
        </table>
        
</div>
@endsection