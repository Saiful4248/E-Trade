@extends('master')

@section('content')
    <div class="container custom-product">
        <div class="row">
            @if (count($products) > 0)
                <div class="col-12">
                    <h3>Result for Products</h3>
                    <div class="searched-item d-flex flex-wrap">
                        @foreach ($products as $index => $item)
                            <div class="trending-items card m-2">
                                <a href="{{ url('detail/' . $item['id']) }}">
                                    <img class="card-img-down trending-img" src="{{ $item['gallary'] }}" alt="Slide {{ $index + 1 }}">
                                    <div class="card-body">
                                        <h3 class="card-title">{{ $item['name'] }}</h3>
                                        <h6 class="card-text">{{ $item['description'] }}</h6>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="col-12">
                    <h2>No products found</h2>
                </div>
            @endif
        </div>
    </div>
@endsection
