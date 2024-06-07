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
            <div class="navbar" id="navbar">
                <a class="logo" href="{{ route('home') }}"><img class="logosidebar" src="{{ asset('/img/logo_si.png') }}" alt="">Sip<span>PH.</span></a>
                <input type="checkbox" id="check">
                <label for="check" class="icon">
                    <i class='bx bx-menu' id="menu-icon"></i>
                    <i class='bx bx-x' id="close-icon"></i>
                </label>
                <ul class="links mb-0">
                    <li><a onclick="scrollToTargetkemabali()" >Home</a></li>
                    <li><a onclick="scrollToTarget_tentang()">Tentang</a></li>
                    <li><a onclick="scrollToTarget_caramenggunakan()">Cara Menggunakan</a></li>
                    <li><a onclick="scrollToTarget_lihatantrian()" >Lihat Antrian</a></li>
                </ul>
                @if($getRecord === 'kosong')
                <div class="btn">
                    <a href="{{ route('sign-in') }}"><button class="btn-login">Sign in</button></a>
                    <a href="{{ route('sign-up') }}"><button class="btn-register">Sign Up</button></a>
                </div>
                @else
                <div class="sudah_login">
                    <p>{{ $getRecord->name }}</p>
                    <a href="" data-bs-toggle="dropdown"><img @if(empty($getRecord->image))
                        src="{{ asset('/assets/img/avatars/1.png') }}"
                    @else
                        src="{{ asset('storage/img/'. $getRecord->image ) }}"
                    @endif alt=""></a>
                    <ul class="dropdown-menu" style="left: auto">
                        <li> <a class="dropdown-item" 
                            @if($getRecord->role == 'admin_pendaftaran')
                             href="{{ route('admin_dashboard') }}"
                             @elseif($getRecord->role == 'admin_poli')
                             href="{{ route('admin_poli_dashboard') }}"
                             @else
                             href="{{ route('user_antrians') }}"
                             @endif
                             >Dashboard</a> </li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
                        <li> <a class="dropdown-item" href="{{ route('logout') }}">Logout</a> </li>
                      </ul>
                </div>
                @endif
                
                
            </div>
        </nav>


        {{-- END NAVBAR --}}
        @yield('leanding-page')
        {{-- @yield('tentang')
        @yield('cara-menggunakan')
        @yield('lihat-antrian') --}}

        <script>window.addEventListener("scroll", function() {
            var navbar = document.getElementById("navbar");
            var scroll = window.scrollY;
            navbar.classList.toggle("active", scroll > 1);
        });
            </script>