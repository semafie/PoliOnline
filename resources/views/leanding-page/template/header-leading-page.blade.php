    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- css --}}
        <link rel="stylesheet" href="{{ asset('css/header-leanding-page.css') }}">

        {{-- boxicon --}}
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        {{-- START NAVBAR --}}
        <nav>
            <div class="navbar">
                <a class="logo" href="{{ route('home') }}">Sip<span>PH.</span></a>
                <input type="checkbox" id="check">
                <label for="check" class="icon">
                    <i class='bx bx-menu' id="menu-icon"></i>
                    <i class='bx bx-x' id="close-icon"></i>
                </label>
                <ul class="links">
                    <li><a href="{{ route('home') }}" class="active">Home</a></li>
                    <li><a href="#">Tentang</a></li>
                    <li><a href="#">Cara Menggunakan</a></li>
                    <li><a href="#">Lihat Antrian</a></li>
                </ul>
                <div class="btn">
                    <a href="{{ route('sign-in') }}"><button class="btn-login">Sign in</button></a>
                    <a href="{{ route('sign-up') }}"><button class="btn-register">Sign Up</button></a>
                </div>
            </div>
        </nav>


        {{-- END NAVBAR --}}
        @yield('leanding-page')
        {{-- @yield('tentang')
        @yield('cara-menggunakan')
        @yield('lihat-antrian') --}}
