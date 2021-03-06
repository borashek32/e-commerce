@extends('frontend.layouts.master')

@section('title', 'Home')

@section('content')
    <div style="text-align: center">
        <h2 style="font-weight: 700; font-size: 30px; margin-bottom: 20px;margin-top: 20px">New in our shop:</h2>
    </div>

    <div class="row">
        @forelse($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xl-3 mb-4">
                <div class="card h-100">
                    <a href="{{ route('product', $product->slug) }}">
                        <img class="card-img-top" src="{{ $product->photo }}" alt="{{ $product->title }}" />
                    </a>

                    <div class="mt-10">
                        <div class="badge bg-primary text-wrap" style="width: 6rem;">
                            {{ $product->condition }}
                        </div>
                    </div>

                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('product', $product->slug) }}">
                                {{ $product->title }}
                            </a>
                        </h4>

                        <h5>
                            $ {{ number_format($product->offer_price, 2) }}
                            <small>
                                <del>
                                    $ {{ number_format($product->price, 2) }}
                                </del>
                            </small>
                        </h5>

                        <a href="{{ route('product', $product->slug) }}">
                            Details >>>
                        </a>
                    </div>

                    <div class="card-footer">
                        <small class="text-muted">
                            ★ ★ ★ ★ ☆
                        </small>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center" style="margin-left: 6px">
                Ничего не найдено по вашему запросу <strong>{{ request()->query('search') }}</strong>
            </p>
        @endforelse
    </div>

    <div class="text-center">
        <p style="font-weight: 600;font-size: 18px">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
            dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
            mollit anim id est laborum.
        </p>
    </div>
@endsection
