<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
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
    
</body>
</html>
