@extends('master')

@section('content')
    <div class="container mt-5">
        <h2>Your Cart Items</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(count($cartItems) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Action</th>
                        <th>Quantity</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td><img src="{{ $item->gallary }}" class="img-thumbnail" style="width: 100px;" alt="{{ $item->name }}"></td>
                            <td>{{ $item->name }}</td>
                            <td>${{ $item->price }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <form action="{{ route('remove_from_cart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                            <td>
                                <input type="number" id="quantity" name="quantity" value="1" min="1" max="10" class="form-control">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('order') }}" class="btn btn-primary">Proceed to Order</a>
        @else
            <p>Your cart is empty</p>
        @endif
    </div>
@endsection
