@extends('master')

@section('content')
    <div class="container mt-5">
        <h2>Order Details</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>${{ $item->price }}</td>
                        <td><input type="number" id="quantity_buy" name="quantity" value="1" min="1" max="10" class="form-control"></td>
                        <td>${{ $item->price * $item->quantity }}</td>
                    </tr>
           
            </tbody>
        </table>
        <div>
            <h4>Total Amount: ${{ $total }}</h4>
            <!-- Add form fields for address and payment method here -->
            <form action="{{ route('place_order') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="address">Delivery Address:</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="payment">Payment Method:</label>
                    <select class="form-control" id="payment" name="payment_method" required>
                        <option value="credit_card">Credit Card</option>
                        <option value="debit_card">Debit Card</option>
                        <option value="paypal">PayPal</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Place Order</button>
            </form>
        </div>
    </div>
@endsection
