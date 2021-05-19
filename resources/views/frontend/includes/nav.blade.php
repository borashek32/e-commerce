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
