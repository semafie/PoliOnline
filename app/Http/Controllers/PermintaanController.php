<?php

namespace App\Http\Controllers;

use App\Models\AntrianModel;
use App\Models\LaporanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PermintaanController extends Controller
{
    public function edit_dokter(Request $request, $id){
        
        $laporan = LaporanModel::findorFAil($id);
        $antrian = AntrianModel::findorFAil($id);

        $laporan->id_dokter = $request->input('selectdokter');
        $antrian->id_dokter = $request->input('selectdokter');
        $laporan->save();
        $antrian->save();
        return redirect()->route('admin_permintaanAntrian')->with(Session::flash('success_message', true));
    }
}
