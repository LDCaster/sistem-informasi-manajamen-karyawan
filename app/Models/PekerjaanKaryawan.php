<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PekerjaanKaryawan extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'pekerjaan_karyawan';

    // Field yang boleh diisi secara mass-assignment
    protected $fillable = [
        'id_karyawan',
        'sbu',
        'bagian',
        'departemen',
        'lokasi_kerja',
        'tanggal_masuk',
        'status_karyawan',
    ];

    // Relasi ke model Karyawan (one-to-many)
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
