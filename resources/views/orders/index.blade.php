@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection

@section('title')
    Admin : Orders Management
@endsection

@section('content')
                  {{-- Table --}}
              <div class="container m-5">
                <div class="my-3">
                  <h3>Orders Management</h3>
                </div>
                
                {{-- Create order & Modal--}}
                <div class="my-2">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createOrderModal">
                    Create Order
                  </button>
                </div>
                {{-- include the modal body --}}
                @include('orders.create')

                <table class="table table-striped table-hover">
                  <thead>
                    <tr class="table-dark">
                      <th scope="col">#</th>
                      <th scope="col">Order#</th>
                      <th scope="col">Total Price</th>
                      <th scope="col">Status</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                    @if (empty($orders))
    
                      @foreach ($orders as $order)
                        <tr>
                          <th scope="row">{{$order['id']}}</th>
                          <td>200025-{{$order['id']}}</td>
                          <td>JOD {{$order['total_price']}}</td>
                          <td>{{$order['status']}}</td>
                          <td>
                            <div class="dropdown">
                              <button class="drop-border" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ route('orders.show', $order['id']) }}">View</a></li>
                                <li><a class="dropdown-item edit-order-link" href="#" data-id="{{ $order->id }}">
                                  Edit
                                </a>
                                </li>
                                <li>
                                  <form action="{{ route('orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this order?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger">Delete</button>
                                </form>
                                </li>
                              </ul>
                            </div>
                          </td>
                        </tr>
                        @endforeach

                    @else
                    <tr>
                      <td colspan="5" class="text-center py-2 ">No Orders Found</td>
                    </tr>
                    @endif
                    </tbody>
                  </table>
                </div>
                @endsection
<script src="/js/editOrders.js"></script>
<div id="ajaxEditModalContainer"></div>               
@include('orders.edit')
