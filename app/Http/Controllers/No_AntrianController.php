<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AntrianModel;
use App\Models\LaporanModel;
use Illuminate\Support\Facades\Session;

class No_AntrianController extends Controller
{
    public function lihat(Request $request){
        $input = $request->all();
// Tampilkan seluruh input
        dd($input);
    }

   public function tambah_antrian(Request $request){

    $id_pasien = $request->input('id_pasien');
        $tanggal = $request->input('input_tanggal'); // Format tanggal: 'YYYY-MM-DD'

        // Mencari pasien berdasarkan ID dan tanggal
        $pasien = AntrianModel::where('id_pasien', $id_pasien)
                             ->whereDate('tanggal', $tanggal)
                             ->first();

if (!$pasien) {
    if($request->input('Selectpoli') == 'Poli Umum') {
        $last_antrian_poli_umum = AntrianModel::where('no_antrian', 'like', 'A%')
        ->whereDate('tanggal', $request->input('input_tanggal'))
        ->orderBy('no_antrian', 'desc')
        ->first();

        $no_antrian;
        if (!$last_antrian_poli_umum) {
            $no_antrian = "A1";
        } else {
            // Jika ada antrian sebelumnya, ambil nomor antrian terakhir
            $last_antrian_number = substr($last_antrian_poli_umum->no_antrian, 1); // Mengambil karakter setelah 'A'
            
            // Mengonversi nomor antrian terakhir ke integer dan menambah 1
            $next_antrian_number = (int)$last_antrian_number + 1;
            
            // Membuat nomor antrian baru
            $no_antrian = "A" . $next_antrian_number;
        }
        
        $noantrian = AntrianModel::create([
            'no_antrian' => $no_antrian,
            'id_dokter' => $request->input('id_dokter'),
            'id_pasien' => $request->input('id_pasien'),
            'tanggal' => $request->input('input_tanggal'),
            'jam' => $request->input('input_jam'),
            'status' => 'menunggu'

        ]);
        $laporan = LaporanModel::create([
            'no_antrian' => $no_antrian,
            'id_dokter' => $request->input('id_dokter'),
            'id_pasien' => $request->input('id_pasien'),
            'tanggal' => $request->input('input_tanggal'),
            'jam' => $request->input('input_jam'),
            'status' => 'menunggu'

        ]);
        return redirect()->route('admin_datanoantrian')->with(Session::flash('success_message', true));
        }elseif($request->input('Selectpoli') == 'Poli Gigi'){
            $last_antrian_poli_umum = AntrianModel::where('no_antrian', 'like', 'B%')
            ->whereDate('tanggal', $request->input('input_tanggal'))
            ->orderBy('no_antrian', 'desc')
            ->first();
    
            $no_antrian;
            if (!$last_antrian_poli_umum) {
                $no_antrian = "B1";
            } else {
                // Jika ada antrian sebelumnya, ambil nomor antrian terakhir
                $last_antrian_number = substr($last_antrian_poli_umum->no_antrian, 1); // Mengambil karakter setelah 'A'
                
                // Mengonversi nomor antrian terakhir ke integer dan menambah 1
                $next_antrian_number = (int)$last_antrian_number + 1;
                
                // Membuat nomor antrian baru
                $no_antrian = "B" . $next_antrian_number;
            }
            
            $noantrian = AntrianModel::create([
                'no_antrian' => $no_antrian,
                'id_dokter' => $request->input('id_dokter'),
                'id_pasien' => $request->input('id_pasien'),
                'tanggal' => $request->input('input_tanggal'),
                'jam' => $request->input('input_jam'),
                'status' => 'menunggu'
    
            ]);
            $laporan = LaporanModel::create([
                'no_antrian' => $no_antrian,
                'id_dokter' => $request->input('id_dokter'),
                'id_pasien' => $request->input('id_pasien'),
                'tanggal' => $request->input('input_tanggal'),
                'jam' => $request->input('input_jam'),
                'status' => 'menunggu'
    
            ]);

            return redirect()->route('admin_datanoantrian')->with(Session::flash('success_message', true));
        } else{
            $last_antrian_poli_umum = AntrianModel::where('no_antrian', 'like', 'C%')
            ->whereDate('tanggal', $request->input('input_tanggal'))
            ->orderBy('no_antrian', 'desc')
            ->first();
    
            $no_antrian;
            if (!$last_antrian_poli_umum) {
                $no_antrian = "C1";
            } else {
                // Jika ada antrian sebelumnya, ambil nomor antrian terakhir
                $last_antrian_number = substr($last_antrian_poli_umum->no_antrian, 1); // Mengambil karakter setelah 'A'
                
                // Mengonversi nomor antrian terakhir ke integer dan menambah 1
                $next_antrian_number = (int)$last_antrian_number + 1;
                
                // Membuat nomor antrian baru
                $no_antrian = "C" . $next_antrian_number;
            }
            
            $noantrian = AntrianModel::create([
                'no_antrian' => $no_antrian,
                'id_dokter' => $request->input('id_dokter'),
                'id_pasien' => $request->input('id_pasien'),
                'tanggal' => $request->input('input_tanggal'),
                'jam' => $request->input('input_jam'),
                'status' => 'menunggu'
    
            ]);
            $laporan = LaporanModel::create([
                'no_antrian' => $no_antrian,
                'id_dokter' => $request->input('id_dokter'),
                'id_pasien' => $request->input('id_pasien'),
                'tanggal' => $request->input('input_tanggal'),
                'jam' => $request->input('input_jam'),
                'status' => 'menunggu'
    
            ]);

            return redirect()->route('admin_datanoantrian')->with(Session::flash('success_message', true));
        }

        }else{
            return redirect()->route('admin_datanoantrian')->with(Session::flash('pasien_sudah_daftar', true));
        }
    }

}
