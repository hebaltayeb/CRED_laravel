<div class="modal fade" id="createOrderModal" tabindex="-1" aria-labelledby="createOrderLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createOrderLabel">Create New Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf

                      
                    <div class="mb-3">
                        <label for="total_price" class="form-label">Total Price</label>
                        <input type="number" step="any" class="form-control" id="total_price" name="total_price" required placeholder="Total Price">
                    </div>
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User ID</label>
                        <select class="form-control input" id="user_id" name="user_id" required>
                            @if(isset($users) && $users->count())
                                <option value="" disabled selected>Select a user</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            @else
                                <option value="" disabled selected>No users available</option>
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="shipping_address" class="form-label">Shipping Address</label>
                        <textarea class="form-control" id="shipping_address" name="shipping_address" required
                        placeholder="Shipping Address"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number" class="form-control" id="phone" name="phone" required
                        placeholder="Phone Number">
                    </div>
                    <div class="mb-3">
                        <label for="coupon" class="form-label">Coupon</label>
                        <input type="text" class="form-control" id="coupon" name="coupon" 
                        placeholder="Coupon ID">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="Pending" selected>Pending</option>
                            <option value="Processing">Processing</option>
                            <option value="Shipped">Shipped</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Order</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
