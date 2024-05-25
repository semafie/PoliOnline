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
            <form class="form-sign-up">

                <label for="username">Username</label>
                <br>
                <input type="text" placeholder="Masukkan username" required>
                <br>
                <label for="username">Password</label>
                <br>
                <input type="text" placeholder="Masukkan password" required>
                <br>
                <label for="Konfirmasi Password">Password</label>
                <br>
                <input type="text" placeholder="Masukkan konfirmasi password" required>
                <br>
                <button class="btn-register" type="submit">Register</button>
            </form>
            {{-- end form sign in --}}
        </div>
    </div>
    {{-- end container sign in --}}
    <script src="{{ asset('js/sign-in-header.js') }}"></script>

    </body>

    </html>
@endsection
