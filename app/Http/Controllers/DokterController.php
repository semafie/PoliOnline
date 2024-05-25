<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DokterModel;
use Illuminate\Support\Facades\Session;

class DokterController extends Controller
{
    public function tambah_dokter(Request $request){

            $pasien = DokterModel::create([
                'nama_dokter' => $request->input('input_nama'),
                'alamat' => $request->input('input_alamat'),
                'no_telp' => $request->input('input_nohp'),
                'jenis_kelamin' => $request->input('select_kelamin'),
                'nama_poli' => $request->input('select_poli'),
                // tambahkan kolom lain sesuai kebutuhan
            ]);
            return redirect()->route('admin_DataDokter')->with(Session::flash('success_message', true));

    }

    public function lihat(Request $request, $id){
        $input = $request->all();
// Tampilkan seluruh input
        dd($input);
        
    }

    public function edit_dokter(Request $request, $id){
        $dokter = DokterModel::findorFAil($id);
    
        
        $dokter->alamat = $request->input('input_alamat');
        $dokter->nama_dokter = $request->input('input_nama');
        $dokter->jenis_kelamin = $request->input('select_kelamin');
        $dokter->no_telp = $request->input('input_nohp');
        $dokter->nama_poli = $request->input('select_poli');
        $dokter->save();
    
        return redirect()->route('admin_DataDokter')->with(Session::flash('success_edit', true));
            
        }

        public function delete_dokter(Request $request, $id){
        $dokter = DokterModel::findOrFail($id);

        // Hapus data dokter
        $dokter->delete();

    return redirect()->route('admin_DataDokter')->with(Session::flash('success_delete', true));
        
    }
}
