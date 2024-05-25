<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokterModel extends Model
{
    use HasFactory;
    protected $table = 'dokter';
    use HasFactory;

    protected $fillable = [
        'nama_dokter',
        'no_telp',
        'alamat',
        'jenis_kelamin',
        'nama_poli',
        // tambahkan kolom-kolom lain yang diizinkan untuk diisi secara massal di sini
    ];
}
