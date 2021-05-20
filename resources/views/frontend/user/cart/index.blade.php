@extends('frontend.layouts.clean')

@section('title', 'Cart')

@section('content')
    <div class="col-md-8 offset-2">
        <div id="cart_list" style="padding-top: 30px">
            @include('backend.includes.messages_success')
            @include('backend.includes.messages_errors')
            @include('frontend.user.includes.cart_list')
        </div>

        <hr class="dropdown-divider">

        <div>
            <span>
                Total cost
                ${{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal() }}
            </span>
        </div>

        <div style="margin-top: 20px">
            Do you have a discount coupon? Add it here

            <form action="{{ route('coupon.add') }}" id="coupon-form" method="POST">
                @csrf
                <input type="text" name="code" placeholder="Enter your coupon" style="margin-top: 10px"><br>

                <button type="submit" class="coupon-btn btn btn-success" style="margin-top: 10px">
                    Apply
                </button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).on('click', '.coupon-btn', function (e) {
            e.preventDefault();
            var code = $('input[name=code]').val();
            $('.coupon-btn').html('<i class="fas fa-spinner fa-spin"></i> Applying...');
            $('#coupon-form').submit();
        })
    </script>

    <script>
        $(document).on('click', '.cart_delete', function (e) {
            e.preventDefault();
            var cart_id = $(this).data('id');

            $.ajax({
                url: "{{ route('cart.delete') }}",
                type:"POST",
                dataType:"JSON",
                data:{
                    cart_id: cart_id,
                    _token: "{{ csrf_token() }}",
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

    <script>
        $(document).on('click', '.qty', function () {
            var id = $(this).data('id');
            var spinner = $(this),input=spinner.closest("div.quantity").find('input[type="number"]');

            if (input.val() === 1) {
                return false;
            }
            if (input.val !== 1) {
                var newVal = parseFloat(input.val());
                $('#qty-id-'+id).val(newVal);
            }
            var productQuantity = $("#update-cart-"+id).data('product-quantity');
            update_cart(id, productQuantity)
        });
        function update_cart(id, productQuantity) {
            var rowId = id;
            var product_qty = $('#qty-input-'+rowId).val();
            var token = "{{ csrf_token() }}";
            var path = "{{ route('cart.update') }}";

            $.ajax({
                url: path,
                type: "POST",
                data: {
                    _token: token,
                    product_qty: product_qty,
                    rowId: rowId,
                    productQuantity: productQuantity
                },
                success: function (data) {
                    console.log(data);
                    if (data['status']) {
                        $('body #header-ajax').html(data['header']);
                        $('body #cart-counter').html(data['cart_count']);
                        $('body #cart_list').html(data['cart_list']);
                        swal({
                            title: "Good job!",
                            text: data['message'],
                            icon: "success",
                            button: "OK!"
                        });
                    }
                    else {
                        alert(data['message']);
                    }
                }
            })
        }
    </script>
@endsection
