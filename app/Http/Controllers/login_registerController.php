<?php

namespace App\Http\Controllers;

use App\Models\AntrianModel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
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
        $tanggalHariIni = Carbon::today();
    $formattedToday = $tanggalHariIni->format('Y-m-d');
    $Antrian = AntrianModel::whereDate('tanggal', $formattedToday)
    ->whereNotNull('id_dokter')
    ->where(function ($query) {
        $query->where('status', 'menunggu')
            ->orWhere(function ($query) {
                $query->where('status', 'bersiap');
            });
    })
    ->where('status', '!=', 'selesai')
    ->with('pasien', 'dokter')
    ->get();

    $antrianPertama = AntrianModel::whereDate('tanggal', $formattedToday)
    ->whereNotNull('id_dokter')
    ->where('status', 'masuk')
    ->whereHas('dokter', function ($query) {
        $query->where('nama_poli', 'Poli Umum');
    })
    ->orderBy('id', 'asc')
    ->first();

// Query kedua
$antrianKedua = AntrianModel::whereDate('tanggal', $formattedToday)
    ->whereNotNull('id_dokter')
    ->where('status', 'masuk')
    ->whereHas('dokter', function ($query) {
        $query->where('nama_poli', 'Poli Gigi');
    })
    ->orderBy('id', 'asc')
    
    ->first();

// Query ketiga
$antrianKetiga = AntrianModel::whereDate('tanggal', $formattedToday)
    ->whereNotNull('id_dokter')
    ->where('status', 'masuk')
    ->whereHas('dokter', function ($query) {
        $query->where('nama_poli', 'Poli Kia');
    })
    ->orderBy('id', 'asc')
    // ->skip(2) // Melewati 2 data pertama
    ->first();

        return view('leanding-page.leanding-page',[
            'Antrian' => $Antrian,
            'antrianpertama' => $antrianPertama,
            'antriankedua' => $antrianKedua,
            'antrianketiga' => $antrianKetiga,
        ]);
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

    public function register(Request $request){
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        if($request->confirm_password != $request->password){
            return redirect()->route('sign-up')->with(Session::flash('samakan password', true));
        }
        // Hash password
        $hashedPassword = Hash::make($validatedData['password']);

        // Simpan pengguna baru ke database
        $user = User::create([
            'name' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => $hashedPassword,
            'role'=> 'pasien'
        ]);

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect()->route('sign-in')->with(Session::flash('berhasil register', true));
    }
}
