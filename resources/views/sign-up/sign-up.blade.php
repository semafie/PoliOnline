@extends('templates.header-login-register')
{{-- css --}}
<link rel="stylesheet" href="{{ asset('css/sign-up.css') }}">
<title>Sign In</title>
@section('sign-up')
    {{-- start container sign in --}}
    <div class="sign-up-container">
        <div class="inner-container">
            <h1>Sign Up</h1>
            {{-- start form sign in --}}
            <form class="form-sign-up" action="/register" method="POST" onsubmit="return validatePassword()">
                @csrf
                <label for="username">Username</label>
                <br>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required>
                <br>
                <label for="username">Email</label>
                <br>
                <input type="email" id="email" name="email" placeholder="Masukkan email" required>
                <br>
                <label for="username">Password</label>
                <br>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                <br>
                <label for="Konfirmasi Password">Password</label>
                <br>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Masukkan konfirmasi password" required>
                <br>
                <button class="btn-register" type="submit">Register</button>
            </form>
            {{-- end form sign in --}}
        </div>
    </div>
    {{-- end container sign in --}}
    <script src="{{ asset('js/sign-in-header.js') }}"></script>
    <script>
        function validatePassword() {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirm_password').value;
        var errorMessage = document.getElementById('error-message');

        if (password !== confirmPassword) {
            errorMessage.textContent = 'Password dan Konfirmasi Password harus sama.';
            return false; // Mencegah pengiriman form
        }

        errorMessage.textContent = ''; // Bersihkan pesan kesalahan jika valid
        return true; // Mengizinkan pengiriman form
    }
    </script>

<script>
    @if(Session::has('samakan password'))
    Swal.fire({
      title: 'Gagal Register',
      text: 'Tolong isi password dan confirm password yang sama',
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
    @elseif(Session::has('berhasil_register'))
  
    Swal.fire({
      title: 'Berhasil',
      text: 'Anda berhasil registrasi',
      icon: 'success',
      confirmButtonText: 'Oke'
    })
    @endif
    </script>
    </body>

    </html>
@endsection
