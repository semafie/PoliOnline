<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PasienModel;
use Illuminate\Support\Facades\Session;
// App\Http\Controllers\Requset

class PasienController extends Controller
{
    public function show(){
        $Pasien = PasienModel::all();
        return view('admin.layout.data_pasien',
        ['title' => 'Data Pasien',
         'Pasien' => $Pasien]);
    }

    public function lihat(Request $request){

            $input = $request->all();
// Tampilkan seluruh input
        dd($input);

    }
    public function tambah_pasien(Request $request){
        $lastPatient = PasienModel::latest()->first();
        
        // var_dump($lastPatient);

        if (!$lastPatient) {
            // Jika tidak ada nomor rekam medis sebelumnya, mulai dengan '00-00-00-01'
            $no_rm = '00-00-00-01';
        } else {
            // Pecah nomor rekam medis terakhir menjadi bagian-bagian terpisah
            $parts = explode('-', $lastPatient->no_rm);
            $lastPart = intval($parts[3]); // Mengambil bagian keempat karena no_rm berada di kolom keempat
        
            if ($lastPart >= 99) {
                // Jika bagian terakhir mencapai 99, tambahkan 1 ke bagian sebelumnya dan atur bagian terakhir menjadi 01
                $parts[2]++;
                $parts[3] = '01';
            } else {
                // Tambahkan 1 ke bagian terakhir nomor rekam medis
                $lastPart++;
                $parts[3] = sprintf('%02d', $lastPart); // Format dengan 2 digit
            }
        
            // Gabungkan bagian-bagian yang telah diperbarui menjadi nomor rekam medis baru
            $no_rm = implode('-', $parts);
        }
        
        // Simpan data pasien baru dengan nomor rekam medis yang telah dibuat
        $pasien = PasienModel::create([
            'no_rm' => $no_rm,
            'alamat' => $request->input('input_alamat'),
            'nama_pasien' => $request->input('input_nama'),
            'jenis_kelamin' => $request->input('select_kelamin'),
            'nik' => $request->input('input_nik'),
            'pekerjaan' => $request->input('input_pekerjaan'),
            'usia' => $request->input('input_usia'),
            'tanggal_lahir' => $request->input('input_tanggal_lahir'),
            'tempat_lahir' => $request->input('input_tempat_lahir'),
            // tambahkan kolom lain sesuai kebutuhan
        ]);
        
        return redirect()->route('admin_DataPasien')->with(Session::flash('success_message', true));
    }

    public function edit_pasiens(Request $request, $id){
        $input = $request->all();
// Tampilkan seluruh input
        dd($input);
        
    }

    public function edit_pasien(Request $request, $id){
    $pasien = PasienModel::findorFAil($id);

    
    $pasien->alamat = $request->input('input_alamat');
    $pasien->nama_pasien = $request->input('input_nama');
    $pasien->jenis_kelamin = $request->input('select_kelamin');
    $pasien->nik = $request->input('input_nik');
    $pasien->pekerjaan = $request->input('input_pekerjaan');
    $pasien->usia = $request->input('input_usias');
    $pasien->tanggal_lahir = $request->input('input_tanggal_lahirs');
    $pasien->tempat_lahir = $request->input('input_tempat_lahirs');

    $pasien->save();

    return redirect()->route('admin_DataPasien')->with(Session::flash('success_edit', true));
        
    }

    public function delete_pasien(Request $request, $id){
        $pasien = PasienModel::findOrFail($id);
        // Hapus data pasien
        $pasien->delete();

    return redirect()->route('admin_DataPasien')->with(Session::flash('success_delete', true));   
    }

    

    
}
