@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h2>Product Details</h2>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        @if($product->image_path)
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                        @else
                        <div class="col-md-12">
                        @endif
                            <h3>{{ $product->name }}</h3>
                            <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                            <p><strong>Quantity in Stock:</strong> {{ $product->quantity }}</p>
                            <p><strong>Status:</strong> {{ $product->is_active ? 'Active' : 'Inactive' }}</p>
                            <p><strong>Created at:</strong> {{ $product->created_at->format('F d, Y') }}</p>
                            <p><strong>Updated at:</strong> {{ $product->updated_at->format('F d, Y') }}</p>
                            <p><strong>Description:</strong></p>
                            <p>{{ $product->description }}</p>
                            
                            <div class="mt-3">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection