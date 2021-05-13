@extends('frontend.layouts.master')

@section('title', 'Category')

@section('content')
    <div style="text-align: center">
        <h2 style="font-weight: 700; font-size: 30px; margin-bottom: 20px;margin-top: 20px">
            {{ $category->title }}
        </h2>


        <p>{{ $category->description }}</p>
    </div>

    <div class="row">
        @foreach($category->products as $product)
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

                        <h6>
                            <a href="">
                                Brand:

                                <img src="{{ $product->brand->photo }}" alt="Product brand" width="20px">

                                {{ $product->brand->title }}
                            </a>
                        </h6>

                        <h5>
                            $ {{ number_format($product->offer_price, 2) }}
                            <small>
                                <del>
                                    $ {{ number_format($product->price, 2) }}
                                </del>
                            </small>
                        </h5>

                        <div class="card-text">
                            <p style="font-size: 12px">
                                {!! Str::limit($product->description) !!}
                            </p>
                        </div>

                        <a href="{{ route('product', $product->slug) }}">
                            Details >>>
                        </a>
                    </div>

                    <div class="card-footer"><small class="text-muted">★ ★ ★ ★ ☆</small></div>
                </div>
            </div>
        @endforeach
    </div>

    <div style="display: flex;justify-content: center">
        {{ $products->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
