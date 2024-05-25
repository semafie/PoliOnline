<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntrianModel extends Model
{
    use HasFactory;
    protected $table = 'no_antrian';

    protected $fillable = [
        'no_antrian',
        'keterangan',
        'id_dokter',
        'id_pasien',
        'tanggal',
        'jam',
        'status'
        // tambahkan kolom-kolom lain yang diizinkan untuk diisi secara massal di sini
    ];

    public function pasien()
    {
        return $this->belongsTo(PasienModel::class, 'id_pasien');
    }

    public function dokter()
    {
        return $this->belongsTo(DokterModel::class, 'id_dokter');
    }
}
