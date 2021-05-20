<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.includes.head')
</head>
<body>
    @include('frontend.layouts.header')

    <div class="container">
        <div style="transform: translateY(50px)">
            <div style="transform: translateY(20px)">
                <div class="row">
                    <div class="col-md-3 text-center">
                        <p style="font-size: 14px; color: grey">
                            Account Menu
                        </p>

                        @include('frontend.user.includes.sidebar')
                    </div>

                    <div class="col-md-9">
                        <h2>Hello, {{ $user->full_name }}</h2>

                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        @include('frontend.includes.footer')
    </div>
</body>
</html>
