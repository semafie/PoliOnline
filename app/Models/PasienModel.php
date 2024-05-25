<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienModel extends Model
{
    protected $table = 'pasien';
    use HasFactory;

    protected $fillable = [
        'no_rm',
        'nama_pasien',
        'alamat',
        'usia',
        'jenis_kelamin',
        'pekerjaan',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'id_user'
        // tambahkan kolom-kolom lain yang diizinkan untuk diisi secara massal di sini
    ];
}
