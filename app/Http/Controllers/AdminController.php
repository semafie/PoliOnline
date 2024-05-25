<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PasienModel;
use App\Models\DokterModel;
use App\Models\LaporanModel;
use App\Models\AntrianModel;
use Illuminate\Support\Carbon;
use App\Models\User;
use Auth;

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

    public function show_Laporan(){
        $Antrian = LaporanModel::whereNotNull('id_dokter')
                       ->with('pasien', 'dokter')
                       ->get();
        $today = Carbon::today();

// Memformat tanggal hari ini menjadi string 'Y-m-d'
$formattedToday = $today->format('Y-m-d');

// Menampilkan informasi tanggal hari ini dengan var_dump
var_dump($formattedToday);
        return view('admin.layout.Laporan',
        ['title' => 'Laporan',
         'Antrian' => $Antrian,
         'getRecord' => User::find(Auth::user()->id)]);
    }
}
