<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.includes.head')
</head>
<body>
    <header id="header-ajax">
        @include('frontend.includes.header')
    </header>

    <div class="row">
        <div class="col-md-8">
            @include('backend.includes.messages_success')
        </div>
    </div>

    <div class="container">
        <div style="transform: translateY(50px)">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.includes.categories')
                </div>

                <div class="col-lg-9">
                    <div style="display: flex; justify-content: center">
                        <img src="{{ asset('img/main.jpeg') }}" alt="E-commerce app"
                             style="margin-top: 20px; margin-bottom: 20px">
                    </div>

                    @include('frontend.includes.search')

                    @yield('content')
                </div>
            </div>
        </div>

        @include('frontend.includes.footer')
    </div>
    @yield('scripts')

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
</body>
</html>
