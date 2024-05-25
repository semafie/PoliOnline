<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AntrianModel;
use PDF;

class cetakController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function cetakantrian(Request $request){
        $user = User::get();

        $widthInCm = 9;
    $widthInPoints = $widthInCm * 28.3465;

        $pdf = PDF::loadview('nota-no_antrian')
                ->setPaper([0, 0, $widthInPoints, 250.89], 'portrait');
                
        return $pdf->stream('nota_antrian.pdf');
    }

    public function cetakantrians(Request $request , $id){
        $no_antrian = AntrianModel::findorFAil($id);
        $Antrian = AntrianModel::where('id', $id)->with('pasien', 'dokter')->get();
        $user = User::get();

        $widthInCm = 9;
    $widthInPoints = $widthInCm * 28.3465;

        $pdf = PDF::loadview('nota-no_antrian', ['Antrian' => $Antrian])
                ->setPaper([0, 0, $widthInPoints, 250.89], 'portrait');
                
        return $pdf->stream('nota_antrian.pdf');
    }
}
