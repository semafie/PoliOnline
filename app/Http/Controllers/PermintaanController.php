<?php

namespace App\Http\Controllers;

use App\Models\AntrianModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PermintaanController extends Controller
{
    public function edit_dokter(Request $request, $id){
        $antrian = AntrianModel::findorFAil($id);

        $antrian->id_dokter = $request->input('selectdokter');
        $antrian->save();
        return redirect()->route('admin_permintaanAntrian')->with(Session::flash('success_message', true));
    }
}
