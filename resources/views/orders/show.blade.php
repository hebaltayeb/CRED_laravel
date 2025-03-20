@extends('layouts.app')

@section('title')
    Show Order
@endsection

@section('content')
<div class="position-relative top-50 start-50 translate-middle"  style="margin-left: 250px; ">
    <div class="card px-5 py-2" style="width: 20rem;">
        <div class="card-body">
            <h5 class="card-title d-flex">Order Details</h5>
                <p class="card-text"><strong>Order ID:</strong> {{ $order->id }}</p>
                <p class="card-text"><strong>Total Price:</strong> JOD {{ $order->total_price }}</p>
                <p class="card-text"><strong>User ID:</strong> {{ $order->user_id }}</p>
                <p class="card-text"><strong>Shipping Address:</strong> {{ $order->shipping_address }}</p>
                <p class="card-text"><strong>Phone:</strong> {{ $order->phone }}</p>
                <p class="card-text"><strong>Coupon:</strong>
    
                    @if ($order->coupon)
                        {{$order->coupon}}
                    @else
                        {{'None'}}
                    @endif
    
                </p>
                <p class="card-text"><strong>Status:</strong> {{ $order->status }}</p>
          <a href="{{route('orders.index')}}" class="btn btn-primary">Go back</a>
        </div>
      </div>
</div>
@endsection