<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PasienModel;
use App\Models\LaporanModel;
use App\Models\AntrianModel;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show_antrian(){
        $tanggalHariIni = Carbon::today();
        $id_user = User::find(Auth::user()->id);
        $Antrianmu = AntrianModel::whereDate('tanggal', $tanggalHariIni)
                    ->whereHas('pasien', function ($query) use ($id_user) {
                    $query->where('id_user', $id_user->id);
                    })
                    ->with('pasien', 'dokter')
                    ->get();


        $halo = User::find(Auth::user()->id);
        $Pasienakun = PasienModel::where('id_user', $halo->id)->get();
        return view ('user.layout.antrian_User', [
            'title' => 'No Antrianmu',
            'subtitle' => 'menu no antrian sasasa',
            'getRecord' => User::find(Auth::user()->id),
            'Pasienakun' => $Pasienakun,
            'Antrianmu' => $Antrianmu
        ]);
    }
    public function show_antrianberjalan(){
        $tanggalHariIni = Carbon::today();
    $formattedToday = $tanggalHariIni->format('Y-m-d');
        $id_user = 1;
        $Antrian = AntrianModel::whereDate('tanggal', $formattedToday)
        ->whereNotNull('id_dokter')
        ->where('status', '!=', 'selesai')
        ->with('pasien', 'dokter')
        ->get();
        

        return view ('user.layout.antrianberjalan_user', [
            'title' => 'No Antrian Berjalan',
            'subtitle' => 'menu no antrian sasasa',
            'getRecord' => User::find(Auth::user()->id),
            'Antrian' => $Antrian
             
        ]);
    }
    public function show_riwayatantrian(){
        $id_user = User::find(Auth::user()->id);
        $Antrian = AntrianModel::whereHas('pasien', function($query) use ($id_user) {
            $query->where('id_user', $id_user);
        })
        ->where('status', 'selesai')
        ->with('pasien', 'dokter')
        ->get();
        return view ('user.layout.riwayatantrian', [
            'title' => 'Riwayat Antrianmu',
            'subtitle' => 'menu no antrian sasasa',
            'Antrian' => $Antrian,
            'getRecord' => User::find(Auth::user()->id)
        ]);
    }
    public function show_pasien(){
        $halo = User::find(Auth::user()->id);
        $Pasienakun = PasienModel::where('id_user', $halo->id)->get();
        $Pasien = PasienModel::all();

        return view ('user.layout.datapasien', [
            'title' => 'Pasien',
            'subtitle' => 'Pasien Yang terdaftar di akun kamu, setiap akun hanya dapat 5 pasien',
            'getRecord' => $halo,
            'Pasien' => $Pasien,
            'Pasienakun' => $Pasienakun
        ]);
    }

    public function cari_nik(Request $request){
        
        
            $input_nik = $request->input('input_nik');

            // Cari pasien berdasarkan NIK
            $cari_nik = PasienModel::where('nik', $input_nik)->get();

            // Debugging, menampilkan hasil pencarian
            if ($cari_nik->isEmpty()) {
            
            // Jika data tidak ditemukan
            return redirect()->route('user_antrians',[
                'cari_nik' => $cari_nik
            ])->with(Session::flash('gagal_pesan', true));
                
            } else {
                // Jika data ditemukan
                // echo 'Data ditemukan';

                // return redirect()->route('')-
                return redirect()->route('user_antrians',[
                    'cari_nik' => $cari_nik
                ])->with(Session::flash('success_message', true));
            } 

    }

    public function ambil_pasien(Request $request , $id){
        $pasien = PasienModel::findorFAil($id);

        $input_id_user = $request->input('input_user_id');
        
        // Menghitung jumlah pasien dengan NIK tertentu
        $jumlah_pasien = PasienModel::where('id_user', $input_id_user)->count();

        // dd($jumlah_pasien);
        if(!($jumlah_pasien > 4)){
            if (is_null($pasien->id_user)) {
                $pasien->id_user = $request->input('input_user_id');
                $pasien->save();
                return redirect()->route('user_pasien')->with(Session::flash('success_edit', true));
            }else{
                return redirect()->route('user_pasien')->with(Session::flash('gagal_diambil', true));
            }
        } else{
            return redirect()->route('user_pasien')->with(Session::flash('pasien_banyak', true));
        }

    

        

        
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
    
        return redirect()->route('user_pasien')->with(Session::flash('success_edit', true));
            
        }

        public function tambah_pasien(Request $request){

            

            $nik = $request->input('input_niks');

    // Mencari data pasien berdasarkan NIK
        $pasien_nik = PasienModel::where('nik', $nik)->first();
            $input_id_user = $request->input('input_id_user');
        
        // Menghitung jumlah pasien dengan NIK tertentu
        $jumlah_pasien = PasienModel::where('id_user', $input_id_user)->count();

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
            if(!$pasien_nik){
                if(!($jumlah_pasien > 4)){
                    $pasien = PasienModel::create([
                        'no_rm' => $no_rm,
                        'alamat' => $request->input('input_alamat'),
                        'nama_pasien' => $request->input('input_nama'),
                        'jenis_kelamin' => $request->input('select_kelamin'),
                        'nik' => $request->input('input_niks'),
                        'pekerjaan' => $request->input('input_pekerjaan'),
                        'usia' => $request->input('input_usia'),
                        'id_user' => $request->input('input_id_user'),
                        'tanggal_lahir' => $request->input('input_tanggal_lahir'),
                        'tempat_lahir' => $request->input('input_tempat_lahir'),
                        // tambahkan kolom lain sesuai kebutuhan
                    ]);
                    
                    return redirect()->route('user_pasien')->with(Session::flash('tambah_pasien', true));
                } else {
                    return redirect()->route('user_pasien')->with(Session::flash('pasien_banyak', true));
                }
            } else{
                return redirect()->route('user_pasien')->with(Session::flash('nik_ada', true));
            }
            
            
        }


        public function tambah_antrian(Request $request){
//             $input = $request->all();
// // Tampilkan seluruh input
//         dd($input);

            $id_pasien = $request->input('input_id_pasien');
        $tanggal = $request->input('input_tanggal'); // Format tanggal: 'YYYY-MM-DD'

        // Mencari pasien berdasarkan ID dan tanggal
        $pasien = AntrianModel::where('id_pasien', $id_pasien)
                             ->whereDate('tanggal', $tanggal)
                             ->first();
if (!$pasien) {
            if($request->input('select_poli') == 'Poli Umum') {
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

                    'id_pasien' => $request->input('input_id_pasien'),
                    'tanggal' => $request->input('input_tanggal'),
                    'jam' => $request->input('input_jam'),
                    'status' => 'menunggu'
        
                ]);
                $laporan = LaporanModel::create([
                    'no_antrian' => $no_antrian,

                    'id_pasien' => $request->input('input_id_pasien'),
                    'tanggal' => $request->input('input_tanggal'),
                    'jam' => $request->input('input_jam'),
                    'status' => 'menunggu'
        
                ]);
                return redirect()->route('user_antrians')->with(Session::flash('success_message', true));
                }elseif($request->input('select_poli') == 'Poli Gigi'){
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

                        'id_pasien' => $request->input('input_id_pasien'),
                        'tanggal' => $request->input('input_tanggal'),
                        'jam' => $request->input('input_jam'),
                        'status' => 'menunggu'
            
                    ]);
                    $laporan = LaporanModel::create([
                        'no_antrian' => $no_antrian,

                        'id_pasien' => $request->input('input_id_pasien'),
                        'tanggal' => $request->input('input_tanggal'),
                        'jam' => $request->input('input_jam'),
                        'status' => 'menunggu'
            
                    ]);
        
                    return redirect()->route('user_antrians')->with(Session::flash('success_message', true));
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

                        'id_pasien' => $request->input('input_id_pasien'),
                        'tanggal' => $request->input('input_tanggal'),
                        'jam' => $request->input('input_jam'),
                        'status' => 'menunggu'
            
                    ]);
                    $laporan = LaporanModel::create([
                        'no_antrian' => $no_antrian,

                        'id_pasien' => $request->input('input_id_pasien'),
                        'tanggal' => $request->input('input_tanggal'),
                        'jam' => $request->input('input_jam'),
                        'status' => 'menunggu'
            
                    ]);
        
                    return redirect()->route('user_antrians')->with(Session::flash('success_message', true));
                }
            }else{
                return redirect()->route('user_antrians')->with(Session::flash('pasien_sudah_daftar', true));
            }
        }
}
