@extends('templates.header-login-register')
{{-- css --}}
<link rel="stylesheet" href="{{ asset('css/sign-in.css') }}">
<title>Sign In</title>
@section('sign-in')
    {{-- start container sign in --}}
    <div class="sign-in-container">
        <div class="inner-container">
            <h1>Sign In</h1>
            {{-- start form sign in --}}
            <div class="form-sign-in">

            <form action="/authentication" method="POST">
                @csrf
                <label for="email">Username</label>
                <br>    
                <input type="email" name="email" placeholder="Masukkan email" class="" required>
                <br>
                {{-- @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror --}}
                <label for="password">Password</label>
                <br>
                <input type="password" name="password" placeholder="Masukkan password" required>
                <div class="lupa-password">
                    <a href="#">Lupa password?</a>
                </div>
                <button class="btn-login" type="submit">Login</button>
                </form>
                <h2>OR</h2>
                <a href="auth/redirect">
                <div class="btn-login-with-google" type="submit">
                    <img src="{{ asset('img/google.png') }}" alt="">
                    Masuk/Daftar dengan google
                </div>
                </a>
                            
            </div>
            {{-- end form sign in --}}
        </div>
    </div>
    {{-- end container sign in --}}
    <script src="{{ asset('js/sign-in-header.js') }}"></script>

    <script>
  @if(Session::has('gagal_login'))
  Swal.fire({
    title: 'Gagal Login',
    text: 'Coba cek email atau password kembali',
    icon: 'error',
    confirmButtonText: 'Oke'
  })

  @elseif(Session::has('login_dulu'))
  Swal.fire({
    title: 'Anda Belum Login',
    text: 'Coba login terlebih dahulu',
    icon: 'error',
    confirmButtonText: 'Oke'
  })

  @elseif(Session::has('success_delete'))

  Swal.fire({
    title: 'Berhasil',
    text: 'Data anda berhasil di Dihapus',
    icon: 'success',
    confirmButtonText: 'Oke'
  })
  @endif
  </script>

    </body>

    </html>
@endsection
