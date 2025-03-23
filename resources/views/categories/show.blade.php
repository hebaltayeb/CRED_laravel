@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Category Details</h2>
        <p><strong>Name:</strong> {{ $category->name }}</p>
        <p><strong>Description:</strong> {{ $category->description }}</p>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection