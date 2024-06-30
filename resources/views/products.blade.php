@extends('master')
@section('content')
    <div class="container custom-product">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8"> <!-- This sets the width to 2/3 of the screen on medium and larger screens -->
                <div id="productCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        @foreach ($products as $index => $item)
                            <li data-target="#productCarousel" data-slide-to="{{ $index }}"
                                class="{{ $index == 0 ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        @foreach ($products as $index => $item)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <a href="{{ url('detail/' . $item['id']) }}">
                                    <img src="{{ $item['gallary'] }}" class="d-block w-100" alt="Slide {{ $index + 1 }}">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3>{{ $item['name'] }}</h3>
                                        <p>{{ $item['description'] }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <!-- Controls -->
                    <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!-- Trending Products -->
                <div class="trending-wrapper">
                    <H1>Trending Products</H1>
                    <div class="trending-products">
                        @foreach ($products as $index => $item)
                            <div class="trending-items ">
                                <a href="{{ url('detail/' . $item['id']) }}">
                                    <img class="trending-img", src="{{ $item['gallary'] }}" class="d-block w-100"
                                        alt="Slide {{ $index + 1 }}">
                                    <div class="">
                                        <h3>{{ $item['name'] }}</h3>

                                    </div>
                            </div>
                                </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
