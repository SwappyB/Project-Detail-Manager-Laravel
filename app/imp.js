<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    {{-- fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans|Courgette|Lato|Open+Sans|Roboto|Ropa+Sans&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body id="bootstrap-overrides">
    <div id="app">
        @include('inc.navbar')
        <div class="container" style="overflow:auto;">
            @include('inc.messages')
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script> --}}


    <footer id="bottomStripe">This project is created by <a href="https://github.com/SwappyB">Swapnil Bajpai</a> and <a href="https://github.com/DSp4wN">Dhananjay Chaurasiya</a>. Follow us :-)</footer>
</body>
</html>