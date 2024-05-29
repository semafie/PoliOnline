<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AntrianModel;
use App\Models\LaporanModel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Admin_poliController extends Controller
{
    public function show_dashboard(){
        // $data['getRecord'] = User::find(Auth:user()->id);
        return view('admin.layout.dashboard_poli',
        ['title' => 'Dashboard' , 
         'getRecord' => User::find(Auth::user()->id)]);
    }

    public function show_antrianpoliumum(){
        $tanggalHariIni = Carbon::today();

    // dd($tanggalHariIni);

    // Mengambil data antrian dengan tanggal hari ini
    $Antrian_menunggu = AntrianModel::whereDate('tanggal', $tanggalHariIni)
    ->whereNotNull('id_dokter')
    ->whereHas('dokter', function($query) {
        $query->where('nama_poli', 'Poli Umum');
    })
    ->where('status', 'menunggu')
    ->with('pasien', 'dokter')
    ->get();

    $Antrian_bersiap = AntrianModel::whereDate('tanggal', $tanggalHariIni)
    ->whereNotNull('id_dokter')
    ->whereHas('dokter', function($query) {
        $query->where('nama_poli', 'Poli Umum');
    })
    ->where('status', 'bersiap')
    ->with('pasien', 'dokter')
    ->get();

    $Antrian_masuk = AntrianModel::whereDate('tanggal', $tanggalHariIni)
    ->whereNotNull('id_dokter')
    ->whereHas('dokter', function($query) {
        $query->where('nama_poli', 'Poli Umum');
    })
    ->where('status', 'masuk')
    ->with('pasien', 'dokter')
    ->get();
        return view('admin.layout.data_no_antrian_poli',
        ['title' => 'Status Antrian Poli Umum',
        'Antrian_menunggu' => $Antrian_menunggu,
        'Antrian_bersiap' => $Antrian_bersiap,
        'Antrian_masuk' => $Antrian_masuk,
        'getRecord' => User::find(Auth::user()->id)]);
    }

    public function show_antrianpoligigi(){
        $tanggalHariIni = Carbon::today();

    // dd($tanggalHariIni);

    // Mengambil data antrian dengan tanggal hari ini
    $Antrian_menunggu = AntrianModel::whereDate('tanggal', $tanggalHariIni)
    ->whereHas('dokter', function($query) {
        $query->where('nama_poli', 'Poli Gigi');
    })
    ->where('status', 'menunggu')
    ->with('pasien', 'dokter')
    ->get();

    $Antrian_bersiap = AntrianModel::whereDate('tanggal', $tanggalHariIni)
    ->whereHas('dokter', function($query) {
        $query->where('nama_poli', 'Poli Gigi');
    })
    ->where('status', 'bersiap')
    ->with('pasien', 'dokter')
    ->get();

    $Antrian_masuk = AntrianModel::whereDate('tanggal', $tanggalHariIni)
    ->whereHas('dokter', function($query) {
        $query->where('nama_poli', 'Poli Gigi');
    })
    ->where('status', 'masuk')
    ->with('pasien', 'dokter')
    ->get();

        return view('admin.layout.data_no_antrian_poli',
        ['title' => 'Status Antrian Poli Gigi',
         'Antrian_menunggu' => $Antrian_menunggu,
         'Antrian_bersiap' => $Antrian_bersiap,
         'Antrian_masuk' => $Antrian_masuk,
         'getRecord' => User::find(Auth::user()->id)
        ]);
    }
    
    public function show_antrianpolikia(){
        $tanggalHariIni = Carbon::today();

    // dd($tanggalHariIni);

    // Mengambil data antrian dengan tanggal hari ini
    $Antrian_menunggu = AntrianModel::whereDate('tanggal', $tanggalHariIni)
    ->whereHas('dokter', function($query) {
        $query->where('nama_poli', 'Poli Kia');
    })
    ->where('status', 'menunggu')
    ->with('pasien', 'dokter')
    ->get();

    $Antrian_bersiap = AntrianModel::whereDate('tanggal', $tanggalHariIni)
    ->whereHas('dokter', function($query) {
        $query->where('nama_poli', 'Poli Kia');
    })
    ->where('status', 'bersiap')
    ->with('pasien', 'dokter')
    ->get();

    $Antrian_masuk = AntrianModel::whereDate('tanggal', $tanggalHariIni)
    ->whereHas('dokter', function($query) {
        $query->where('nama_poli', 'Poli Kia');
    })
    ->where('status', 'masuk')
    ->with('pasien', 'dokter')
    ->get();
        return view('admin.layout.data_no_antrian_poli',
        ['title' => 'Status Antrian Poli Kia',
        'Antrian_menunggu' => $Antrian_menunggu,
        'Antrian_bersiap' => $Antrian_bersiap,
        'Antrian_masuk' => $Antrian_masuk,
        'getRecord' => User::find(Auth::user()->id)]);
    }

    public function lihat(Request $request, $id){
        $input = $request->all();
// Tampilkan seluruh input
        dd($input);
        
    }

    public function edit_antrian(Request $request, $id){
        $status = AntrianModel::findorFAil($id);
        $statuslaporan = LaporanModel::findorFAil($id);
        $nama_poli =$request->input('input_poli');
        $nama_status = $request->input('input_status');
        $pilihan_status = $request->input('select_status');

        

        if($nama_poli == 'Poli Umum'){
            $tanggalHariIni = Carbon::today();
            
// Mengambil data antrian dengan tanggal hari ini, nama poli "Poli Gigi" dan status "menunggu"
        $Antrian_bersiap = AntrianModel::whereDate('tanggal', $tanggalHariIni)
        ->whereHas('dokter', function($query) {
            $query->where('nama_poli', 'Poli Umum');
        })
        ->where('status', 'bersiap')
        ->with('pasien', 'dokter')
        ->get();

// Menghitung jumlah data yang sesuai dengan query tersebut
        $jumlah_data_bersiap = $Antrian_bersiap->count();

        $Antrian_masuk = AntrianModel::whereDate('tanggal', $tanggalHariIni)
        ->whereHas('dokter', function($query) {
            $query->where('nama_poli', 'Poli Umum');
        })
        ->where('status', 'masuk')
        ->with('pasien', 'dokter')
        ->get();

// Menghitung jumlah data yang sesuai dengan query tersebut
        $jumlah_data_masuk = $Antrian_masuk->count();
            
        if($nama_status == 'menunggu'){
            if($pilihan_status == 'bersiap'){
                if(!($jumlah_data_bersiap > 2)){
                    $status->status = $request->input('select_status');
                $statuslaporan->status = $request->input('select_status');
                $status->save();
                $statuslaporan->save();
                return redirect()->route('admin_poliumum_antrian')->with(Session::flash('success_edit', true));
                } else{
                return redirect()->route('admin_poliumum_antrian')->with(Session::flash('gagal_edit', true));
                }

            } else{
                if(!($jumlah_data_masuk > 2)){
                    $status->status = $request->input('select_status');
                $statuslaporan->status = $request->input('select_status');
                $status->save();
                $statuslaporan->save();
                return redirect()->route('admin_poliumum_antrian')->with(Session::flash('success_edit', true));
                } else{
                    return redirect()->route('admin_poliumum_antrian')->with(Session::flash('gagal_edit', true));
                }
            }

            

        } else if($nama_status == 'bersiap'){
            if(!($jumlah_data_masuk > 2)){
                $status->status = $request->input('select_status');
            $statuslaporan->status = $request->input('select_status');
            $status->save();
            $statuslaporan->save();
            return redirect()->route('admin_poliumum_antrian')->with(Session::flash('success_edit', true));
            } else{
                return redirect()->route('admin_poliumum_antrian')->with(Session::flash('gagal_edit', true));
            }
        } else{
            $status->status = $request->input('select_status');
            $statuslaporan->status = $request->input('select_status');
            $status->save();
            $statuslaporan->save();
            return redirect()->route('admin_poliumum_antrian')->with(Session::flash('success_edit', true));
        }
        
            

        } else if($nama_poli == 'Poli Gigi'){
            $tanggalHariIni = Carbon::today();
            
            // Mengambil data antrian dengan tanggal hari ini, nama poli "Poli Gigi" dan status "menunggu"
                    $Antrian_bersiap = AntrianModel::whereDate('tanggal', $tanggalHariIni)
                    ->whereHas('dokter', function($query) {
                        $query->where('nama_poli', 'Poli Gigi');
                    })
                    ->where('status', 'bersiap')
                    ->with('pasien', 'dokter')
                    ->get();
            
            // Menghitung jumlah data yang sesuai dengan query tersebut
                    $jumlah_data_bersiap = $Antrian_bersiap->count();
            
                    $Antrian_masuk = AntrianModel::whereDate('tanggal', $tanggalHariIni)
                    ->whereHas('dokter', function($query) {
                        $query->where('nama_poli', 'Poli Gigi');
                    })
                    ->where('status', 'masuk')
                    ->with('pasien', 'dokter')
                    ->get();
            
            // Menghitung jumlah data yang sesuai dengan query tersebut
                    $jumlah_data_masuk = $Antrian_masuk->count();
                        
                    if($nama_status == 'menunggu'){
            
                        if(!($jumlah_data_bersiap > 2) OR !($jumlah_data_masuk > 2)){
                            $status->status = $request->input('select_status');
                        $statuslaporan->status = $request->input('select_status');
                        $status->save();
                        $statuslaporan->save();
                        return redirect()->route('admin_poligigi_antrian')->with(Session::flash('success_edit', true));
                        } else{
                            return redirect()->route('admin_poligigi_antrian')->with(Session::flash('gagal_edit', true));
                        }
            
                    } else if($nama_status == 'bersiap'){
                        if(!($jumlah_data_masuk > 2)){
                            $status->status = $request->input('select_status');
                        $statuslaporan->status = $request->input('select_status');
                        $status->save();
                        $statuslaporan->save();
                        return redirect()->route('admin_poligigi_antrian')->with(Session::flash('success_edit', true));
                        } else{
                            return redirect()->route('admin_poligigi_antrian')->with(Session::flash('gagal_edit', true));
                        }
                    } else{
                        $status->status = $request->input('select_status');
                        $statuslaporan->status = $request->input('select_status');
                        $status->save();
                        $statuslaporan->save();
                        return redirect()->route('admin_poligigi_antrian')->with(Session::flash('success_edit', true));
                    }

        } else{
            $tanggalHariIni = Carbon::today();
            
            // Mengambil data antrian dengan tanggal hari ini, nama poli "Poli Gigi" dan status "menunggu"
                    $Antrian_bersiap = AntrianModel::whereDate('tanggal', $tanggalHariIni)
                    ->whereHas('dokter', function($query) {
                        $query->where('nama_poli', 'Poli Kia');
                    })
                    ->where('status', 'bersiap')
                    ->with('pasien', 'dokter')
                    ->get();
            
            // Menghitung jumlah data yang sesuai dengan query tersebut
                    $jumlah_data_bersiap = $Antrian_bersiap->count();
            
                    $Antrian_masuk = AntrianModel::whereDate('tanggal', $tanggalHariIni)
                    ->whereHas('dokter', function($query) {
                        $query->where('nama_poli', 'Poli Kia');
                    })
                    ->where('status', 'masuk')
                    ->with('pasien', 'dokter')
                    ->get();
            
            // Menghitung jumlah data yang sesuai dengan query tersebut
                    $jumlah_data_masuk = $Antrian_masuk->count();
                        
                    if($nama_status == 'menunggu'){
                        
                        if(!($jumlah_data_bersiap > 2) OR !($jumlah_data_masuk > 2)){
                            $status->status = $request->input('select_status');
                        $statuslaporan->status = $request->input('select_status');
                        $status->save();
                        $statuslaporan->save();
                        return redirect()->route('admin_polikia_antrian')->with(Session::flash('success_edit', true));
                        } else{
                            return redirect()->route('admin_polikia_antrian')->with(Session::flash('gagal_edit', true));
                        }
            
                    } else if($nama_status == 'bersiap'){
                        if(!($jumlah_data_masuk > 2)){
                            $status->status = $request->input('select_status');
                        $statuslaporan->status = $request->input('select_status');
                        $status->save();
                        $statuslaporan->save();
                        return redirect()->route('admin_polikia_antrian')->with(Session::flash('success_edit', true));
                        } else{
                            return redirect()->route('admin_polikia_antrian')->with(Session::flash('gagal_edit', true));
                        }
                    } else{
                        $status->status = $request->input('select_status');
                        $statuslaporan->status = $request->input('select_status');
                        $status->save();
                        $statuslaporan->save();
                        return redirect()->route('admin_poliumum_antrian')->with(Session::flash('success_edit', true));
                    }

        }


    }


}
