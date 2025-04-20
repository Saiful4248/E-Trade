@extends('master')

@section('content')
    <div class="container custom-product">
        <div class="row">
            <div class="col-sm-6">
                @if ($product)
                    <img class="detail-img" src="{{ $product->gallary }}" alt="{{ $product->name }}">
                @else
                    <p>Product not found</p>
                @endif
            </div>
            <div class="col-sm-6">
                <a href="/">Go Back</a>
                @if ($product)
                    <h3>{{ $product->name }}</h3>
                    <h4>Price: ${{ $product->price }}</h4>
                    <h5>Details: {{ $product->description }}</h5>
                    <h5>Category: {{ $product->category }}</h5>
                    
                    <form action="/add_to_cart" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                    
                    <br><br>
                    <form action="/order_now" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="form-group">
                            <label for="quantity_buy">Quantity:</label>
                            <input type="number" id="quantity_buy" name="quantity" value="1" min="1" max="10" class="form-control">
                        </div>
                        
                        {{-- <button type="submit" class="btn btn-success">Buy Now</button> --}}
                        <a href="/order" class="btn btn-success">Buy Now</a>

                    </form>
                @else
                    <p>Product details not available</p>
                @endif
            </div>
        </div>
    </div>
@endsection
