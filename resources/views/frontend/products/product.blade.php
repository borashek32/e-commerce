@extends('frontend.layouts.master')

@section('title', 'Product')

@section('content')
    <div style="text-align: center">
        <h2 style="font-weight: 700; font-size: 30px; margin-bottom: 20px;margin-top: 20px">
            {{ $product->title }}
        </h2>
    </div>

    <div class="card">
        <img class="card-img-top" src="{{ $product->photo }}" alt="{{ $product->title }}" />

        <div class="mt-10">
            <div class="badge bg-primary text-wrap" style="width: 6rem;">
                {{ $product->condition }}
            </div>
        </div>

        <div class="card-body">
            <h4 class="card-title">
                {{ $product->title }}
            </h4>

            <h6>
                Brand:

                <a href="{{ route('brand', $product->brand->slug) }}">
                    <img src="{{ $product->brand->photo }}" alt="Product brand" width="20px">

                    {{ $product->brand->title }}
                </a>
            </h6>

            <h6 class="card-title">
                {{ $product->size }}
            </h6>

            <h5>
                $ {{ number_format($product->offer_price, 2) }}
                <small>
                    <del>
                        $ {{ number_format($product->price, 2) }}
                    </del>
                </small>
            </h5>

            <p class="card-text">
                {!! $product->description !!}
            </p>
        </div>

        <div class="card-footer">
            <small class="text-muted">
                ★ ★ ★ ★ ☆
            </small>
        </div>

        <div class="card-body">
            <div class="row">
                <div style="display: flex;text-align: center">
                    <h2 style="font-weight: 700; font-size: 30px; margin-bottom: 20px;margin-top: 20px">Similar products:</h2>
                </div>

                <div class="row">
                    @foreach($product->relatedProducts as $relatedProduct)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xl-3 mb-4">
                            <div class="card h-100">
                                <a href="{{ route('product', $product->slug) }}">
                                    <img class="card-img-top" src="{{ $relatedProduct->photo }}"
                                         alt="{{ $relatedProduct->title }}" />
                                </a>

                                <div class="mt-10">
                                    <div class="badge bg-primary text-wrap" style="width: 6rem;">
                                        {{ $relatedProduct->condition }}
                                    </div>
                                </div>

                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="{{ route('product', $relatedProduct->slug) }}">
                                            {{ $relatedProduct->title }}
                                        </a>
                                    </h4>

                                    <h5>
                                        $ {{ number_format($relatedProduct->offer_price, 2) }}
                                        <small>
                                            <del>
                                                $ {{ number_format($relatedProduct->price, 2) }}
                                            </del>
                                        </small>
                                    </h5>

                                    <a href="{{ route('product', $relatedProduct->slug) }}">
                                        Details >>>
                                    </a>
                                </div>

                                <div class="card-footer"><small class="text-muted">★ ★ ★ ★ ☆</small></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
