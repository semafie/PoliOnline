<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PasienModel;
use App\Models\DokterModel;
use App\Models\LaporanModel;
use App\Models\AntrianModel;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function show_dashboard(){
        
        return view('admin.layout.dashboard',
        ['title' => 'Dashboard',
        'getRecord' => User::find(Auth::user()->id)]);
    }

    public function show_dataAntrian(){
        $Pasien = PasienModel::all();
        $Dokter = DokterModel::all();

        return view('admin.layout.data_no_antrian',
        ['title' => 'Tambah No Antrian',
        'Pasien' => $Pasien,
        'Dokter' => $Dokter,
        'getRecord' => User::find(Auth::user()->id)
        ]);
    }

    public function show_permintaanAntrian(){
        $Dokter = DokterModel::all();
        $tanggalHariIni = Carbon::today();
    $formattedToday = $tanggalHariIni->format('Y-m-d');
        $Antrian = AntrianModel::whereDate('tanggal', $formattedToday)
        ->whereNull('id_dokter')
        ->with('pasien', 'dokter')
        ->get();
        return view('admin.layout.permintaan_antrian',
        ['title' => 'Permintaan Antrian',
        'getRecord' => User::find(Auth::user()->id),
        'Antrian' => $Antrian,
        'Dokter' => $Dokter,]);
    }

    public function show_AntrianBerjalan(){

    $tanggalHariIni = Carbon::today();
    $formattedToday = $tanggalHariIni->format('Y-m-d');
        $id_user = 1;
        $Antrian = AntrianModel::whereDate('tanggal', $formattedToday)
        ->whereNotNull('id_dokter')
        ->where('status', '!=', 'selesai')
        ->with('pasien', 'dokter')
        ->get();
    
        return view('admin.layout.antrian_berjalan',
        ['title' => 'Antrian Berjalan',
         'Antrian' => $Antrian,
         'getRecord' => User::find(Auth::user()->id)]);
    }

    public function show_DataDokter(){
        $Dokter = DokterModel::all();
        return view('admin.layout.data_dokter',
        ['title' => 'Data Dokter',
         'Dokter' => $Dokter,
         'getRecord' => User::find(Auth::user()->id)]);
    }

    public function show_DataPasien(){
        $Pasien = PasienModel::all();
        return view('admin.layout.data_pasien',
        ['title' => 'Data Pasien',
         'Pasien' => $Pasien,
         'getRecord' => User::find(Auth::user()->id)]);
    }

    public function show_profile(){
        return view('admin.layout.profile',
        ['title' => 'Data Pasien',
         'getRecord' => User::find(Auth::user()->id)]);
    }

    public function show_Laporan(){
        $Antrian = AntrianModel::where('status', 'selesai')
                       ->with('pasien', 'dokter')
                       ->first();

        // dd($Antrian->dokter->nama_dokter);

// Memformat tanggal hari ini menjadi string 'Y-m-d'
// $formattedToday = $today->format('Y-m-d');

// // Menampilkan informasi tanggal hari ini dengan var_dump
// var_dump($formattedToday);
        return view('admin.layout.Laporan',
        ['title' => 'Laporan',
         'Antrian' => $Antrian,
         'getRecord' => User::find(Auth::user()->id)]);
    }

    public function edit_profile(Request $request , $id){
        $user = User::findorFAil($id);

        // $request->validate([
        //     'image' => 'image|file|max:5048',
        // ]);
        $nama = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('img', $nama);
        // var_dump($imagename);

        

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        

        $user->image = $nama;
        $user->no_telp = $request->input('no_telp');
        $user->save();

        return redirect()->route('admin_profile')->with(Session::flash('success_edit', true));
    }
}
