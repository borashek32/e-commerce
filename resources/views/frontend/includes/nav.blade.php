<!-- Navigation-->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('e-app') }}">E-commerce app</a>
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
                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                <li class="nav-item" style="padding-top: 8px; padding-left: 5px">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/') }}" class="">Account</a>
                        @else
                            <a href="{{ route('login') }}" class="">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="">Register</a>
                            @endif
                        @endauth
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
