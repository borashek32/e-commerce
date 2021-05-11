<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.includes.head')
</head>
<body>
    @include('frontend.includes.nav')

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
    </div>

    @include('frontend.includes.footer')
</body>
</html>
