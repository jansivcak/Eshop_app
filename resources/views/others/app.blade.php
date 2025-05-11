<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Môj E-shop')</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reklama.css') }}">
    <link rel="stylesheet" href="{{ asset('css/novinky_akcie.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main_image_board.css') }}">
    <link rel="stylesheet" href="{{ asset('css/liked-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product_item.css') }}">
    <link rel="stylesheet" href="{{asset('css/paggination.css')}}">
    <link rel="stylesheet" href="{{asset('css/product_item.css')}}">
    <link rel="stylesheet" href="{{asset('css/input_price.css')}}">
    <link rel="stylesheet" href="{{asset('css/trolley.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer">
    @stack('styles')

</head>
<body>

{{-- Hlavička (bude spoločná pre všetky stránky) --}}
@include('partials.header')


@yield('content')


@include('partials.footer')


<script src="{{asset('script/available.js')}}"></script>
<script src="{{asset('script/script_home.js')}}"></script>
<script src="{{asset('script/paggination')}}"></script>
<script src="{{asset('script/liked.js')}}"></script>
<script src="{{asset('script/checkboxes.js')}}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('script/quantity.js')}}"></script>
<script src="{{asset('script/pay_card.js')}}"></script>
<script src="{{asset('script/reload.js')}}"></script>

</body>
</html>
