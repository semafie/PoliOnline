<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/sign-in-header.css') }}">
    <script defer src="{{ asset('js/sign-in-header.js') }}"></script>
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>

<body>
    {{-- start navbar --}}
    <header>
        <div class="navbar">
            <div class="logo"><img class="logosidebar" src="{{ asset('/img/logo_si.png') }}" alt=""><a href="{{ route('home') }}">Sip<span>PH.</span></a></div>
            <ul class="links">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('sign-in') }}" class="@active('sign-in')">Sign In</a></li>
                <li><a href="{{ route('sign-up') }}" class="@active('sign-up')">Sign Up</a></li>
            </ul>
        </div>
    </header>
    {{-- end navbar --}}
    @yield('sign-in')
    @yield('sign-up')
