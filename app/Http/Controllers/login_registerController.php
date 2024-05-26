<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class login_registerController extends Controller
{

    public function __construct()
    {
        $adminData = [
            [
                'name' => 'admin_poli',
                'email' => 'admin_poli@gmail.com',
                'role' => 'admin_poli',
                'password' => Hash::make('admin_poli123'),
            ],
            [
                'name' => 'admin_pendaftaran',
                'email' => 'admin_pendaftaran@gmail.com',
                'role' => 'admin_pendaftaran',
                'password' => Hash::make('admin_pendaftaran123'),
            ]
        ];
    
        // Menambahkan akun admin baru jika belum ada
        foreach ($adminData as $admin) {
            $existingAdmin = User::where('email', $admin['email'])->first();
            if (!$existingAdmin) {
                User::create([
                    'name' => $admin['name'],
                    'email' => $admin['email'],
                    'role' => $admin['role'],
                    'password' => $admin['password'],
                ]);
            }
        }
    }

    public function show_home(){
        return view('leanding-page.leanding-page');
    }

    public function show_login(){
        return view('sign-in.sign-in');
    }

    public function show_register(){
        return view('sign-up.sign-up');
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
    
        $credentials = $request->only('email', 'password'); // Hanya ambil email dan password
    
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true)) {
            
            // Jika ingin mengecek peran pengguna
            if (Auth::user()->role == 'pasien') {

                return redirect()->intended('user_antrians');
                // Lakukan sesuatu
            }elseif(Auth::user()->role == 'admin_poli'){
                return redirect()->intended('/admin_poli/dashboard')->with(Session::flash('success_message', true));
            }
            elseif(Auth::user()->role == 'admin_pendaftaran'){
                return redirect()->intended('/admin/dashboard')->with(Session::flash('berhasil_login', true));
            }

        } else {
            return redirect()->back()->with('error')->with(Session::flash('gagal_login', true));
            // Autentikasi gagal
            // Lakukan sesuatu, misalnya kembali ke halaman login dengan pesan error
        }
    }

    public function logout(){
        Auth::logout();
        return redirect(url('login'));
    }
}
