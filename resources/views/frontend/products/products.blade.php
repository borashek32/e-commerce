@extends('frontend.layouts.master')

@section('title', 'All Products')

@section('content')
    <div style="text-align: center">
        <h2 style="font-weight: 700; font-size: 30px; margin-bottom: 20px;margin-top: 20px">All products in our shop:</h2>
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

                        <h6 class="card-title">
                            Category:

                            <a href="{{ route('category', $product->category->slug) }}">
                                {{ $product->category->title }}
                            </a>
                        </h6>

                        <h6>
                            Brand:

                            <a href="">
                                <img src="{{ $product->brand->photo }}" alt="Product brand" width="20px">

                                {{ $product->brand->title }}
                            </a>
                        </h6>

                        <div class="card-text">
                            <p style="font-size: 12px">
                                {!! Str::limit($product->description) !!}
                            </p>
                        </div>


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

                    <div class="card-footer"><small class="text-muted">★ ★ ★ ★ ☆</small></div>
                </div>
            </div>
        @empty
            <p class="text-center" style="margin-left: 6px">
                Ничего не найдено по вашему запросу <strong>{{ request()->query('search') }}</strong>
            </p>
        @endforelse
    </div>

    <div style="display: flex;justify-content: center">
        {{ $products->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
