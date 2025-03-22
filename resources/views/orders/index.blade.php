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
                      <th scope="col">User Email</th>
                      <th scope="col">Total Price</th>
                      <th scope="col">Shipping Address</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Coupon</th>
                      <th scope="col">Status</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (count($orders))
    
                      @foreach ($orders as $order)
                      @foreach ($users as $user)
                        <tr>
                          <th scope="row">{{$order['id']}}</th>
                          <td>200025-{{$order['id']}}</td>
                          <td>{{ $user->email }}</td>
                          <td>${{$order['total_price']}}</td>
                          <td>${{$order['shipping_address']}}</td>
                          <td>${{$order['phone']}}</td>
                          <td>
                          @if ($order->coupon)
                              {{$order->coupon}}
                          @else
                              {{'None'}}
                          @endif
                          </td>
                          <td>{{$order['status']}}</td>
                          <td>
                            <div class="dropdown">
                              <button class="drop-border" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ route('orders.show', $order['id']) }}">View Items</a></li>
                                <li><a class="dropdown-item edit-order-link" href="#" data-id="{{ $order->id }}">
                                  Edit
                                </a>
                                </li>
                                <li>
                                  <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deleteOrderModal" onclick="setDeleteAction({{ $order->id }})">
                                    Delete
                                  </button>                                
                                </form>
                                </li>
                              </ul>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                        @endforeach

                    @else
                    <tr>
                      <td colspan="5" class="text-center py-2 ">No Orders Found</td>
                    </tr>
                    @endif
                    </tbody>
                  </table>
                </div>
                <!-- Delete Confirmation Modal -->
                <div class="modal fade" id="deleteOrderModal" tabindex="-1" aria-labelledby="deleteOrderModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="deleteOrderModalLabel">Confirm Deletion</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              Are you sure you want to delete this order?
                          </div>
                          <div class="modal-footer">
                              <form id="deleteOrderForm" action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          </div>
                      </div>
                  </div>
                </div>

                @endsection
<script src="/js/editOrders.js"></script>
<div id="ajaxEditModalContainer"></div>               
@include('orders.edit')
