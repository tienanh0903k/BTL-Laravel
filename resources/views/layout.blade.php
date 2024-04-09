<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang')</title>
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
         <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
         <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
         <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css">
         <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" type="text/css">
         <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
         <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
         <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">


         @yield('css')
</head>
<body>
    @include('partial.header')
    <div class="hero hero-normal">
        <div class="container">
            <div class="row">
                @yield('sidebar')
                @yield('slider')
                @include('partial.search')
            </div>
        </div>
    </div>

    <div class="featured spad">
        @yield('content')
    </div>


    <div class="footer spad">
        @include('partial.footer')
    </div>

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('scripts')
</body>
</html>
