<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MET Hotel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>
<body>
    <div id="app">
      @include('nav.navbar')
      <div class="container">
        @include('messages.message')
        @yield('content')
      </div>
     </div>
     <script src="{{asset('js/jquery-1.12.4.js')}}"></script>
     <script src="{{asset('js/add-booking.js')}}"></script>
    </body>
</html>
