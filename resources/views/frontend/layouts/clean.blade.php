<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.includes.head')
</head>
<body>
    @include('frontend.includes.header')

    <div class="container">
        <div style="transform: translateY(50px)">
            @yield('content')
        </div>

        @include('frontend.includes.footer')
    </div>
    @yield('scripts')
</body>
</html>
