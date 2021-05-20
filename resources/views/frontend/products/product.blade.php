@extends('frontend.layouts.master')

@section('title', 'Product')

@section('content')
    <div style="text-align: center">
        <h2 style="font-weight: 700; font-size: 30px; margin-bottom: 20px;margin-top: 20px">
            {{ $item->title }}
        </h2>
    </div>

    <div class="card">
        <img class="card-img-top" src="{{ $item->photo }}" alt="{{ $item->title }}" />

        <div class="mt-10">
            <div class="badge bg-primary text-wrap" style="width: 6rem;">
                {{ $item->condition }}
            </div>
        </div>

        <div class="card-body">
            <h4 class="card-title">
                {{ $item->title }}
            </h4>

            <h6>
                Brand:

                <a href="{{ route('brand', $item->brand->slug) }}">
                    <img src="{{ $item->brand->photo }}" alt="Product brand" width="20px">

                    {{ $item->brand->title }}
                </a>
            </h6>

            <h6 class="card-title">
                {{ $item->size }}
            </h6>

            <h5>
                $ {{ number_format($item->offer_price, 2) }}
                <small>
                    <del>
                        $ {{ number_format($item->price, 2) }}
                    </del>
                </small>
            </h5>

            <p class="card-text">
                {!! $item->description !!}
            </p>

            <a href="" data-quantity="1" data-product-id="{{ $item->id }}" class="add_to_cart"
                    id="add_to_cart{{ $item->id }}">
                Add to cart
            </a>
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
                    @foreach($item->relatedProducts as $relatedProduct)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xl-3 mb-4">
                            <div class="card h-100">
                                <a href="{{ route('product', $item->slug) }}">
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

@section('scripts')
    <script>
        $(document).on('click', '.add_to_cart', function (e) {
            e.preventDefault();
            var product_id = $(this).data('product-id');
            var product_qty = $(this).data('quantity');

            $.ajax({
                url: "{{ route('cart.store') }}",
                type:"POST",
                dataType:"JSON",
                data:{
                    product_id: product_id,
                    product_qty: product_qty,
                    _token: "{{ csrf_token() }}",
                },
                beforeSend:function () {
                    $('#add_to_cart'+product_id).html('<i class="fa fa-spinner fa-spin"></i> Loading...');
                },
                complete:function () {
                    $('#add_to_cart'+product_id).html('<i class="fa fa-cart-plus"></i> Add to cart');
                },
                success:function (data) {
                    if (data['status']) {
                        $('body #header-ajax').html(data['header']);
                        $('body #cart-counter').html(data['cart_count']);
                        swal({
                            title: "Good job!",
                            text: data['message'],
                            icon: "success",
                            button: "OK!",
                        });
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
        });
    </script>
@endsection
