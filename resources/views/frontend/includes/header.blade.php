<!-- Navigation-->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">E-commerce app</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#!">
                        Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#!">
                        About
                    </a>
                </li>

                <li class="nav-item" style="padding-top: 8px; padding-left: 5px">
                    <a href="{{ route('user.dashboard') }}">
                        Account
                    </a>
                </li>

                <li class="nav-item" style="padding-top: 8px; padding-left: 5px">
                    <div class="dropdown">
                        <a href="" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="http://www.clker.com/cliparts/j/K/y/m/C/P/mycart-md.png"
                                 width="30px" alt="Cart">

                            <span class="badge bg-primary rounded-pill">
                                {{ \Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count() }}
                            </span>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                                <li class="dropdown-item">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="{{ $item->model->photo }}"
                                                 style="margin-top: 10px;width: 20px; height: 20px" alt="Product photo">
                                        </div>

                                        <div class="col-md-6">
                                            <a class="" href={{ route('product', $item->model->slug) }}>
                                                {{ $item->name }}
                                            </a>

                                            <p style="font-size: 10px; color: grey">
                                                {{ $item->qty }} x - $<span>{{ number_format($item->price, 2) }}</span>
                                            </p>
                                        </div>

                                        <div class="col-md-3">
                                            <span data-id="{{ $item->rowId }}" class="cart_delete">
                                                <i class="fa fa-trash" style="margin-top: 10px"></i>
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                            <li><hr class="dropdown-divider"></li>

                            <li class="dropdown-item">
                                <span>
                                    Total cost
                                    ${{ number_format(\Gloudemans\Shoppingcart\Facades\Cart::subtotal(), 2) }}
                                    <br>
                                    Total cost with coupon
                                    @if(session()->has('coupon'))
                                        ${{ number_format(\Gloudemans\Shoppingcart\Facades\Cart::subtotal()-session('coupon')['value'], 2) }}
                                    @else
                                        ${{ number_format(\Gloudemans\Shoppingcart\Facades\Cart::subtotal(), 2) }}
                                    @endif
                                </span><br>

                                <button class="btn btn-success btn-sm">
                                    <a href="{{ route('cart') }}">
                                        Cart
                                    </a>
                                </button>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item" style="padding-top: 8px; padding-left: 5px">
                    <a href="{{ route('login-auth') }}">
                        Login
                    </a>

{{--                    @if (Route::has('login'))--}}
{{--                        @auth--}}
{{--                            <a href="{{ route('user.dashboard') }}" class="">Account</a>--}}
{{--                        @else--}}
{{--                            <a href="{{ route('login') }}" class="">Log in</a>--}}

{{--                            @if (Route::has('register'))--}}

{{--                            @endif--}}
{{--                        @endauth--}}
{{--                    @endif--}}
                </li>

                <li class="nav-item" style="padding-top: 8px; padding-left: 10px">
                    <a href="{{ route('register-auth') }}">
                        Register
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
