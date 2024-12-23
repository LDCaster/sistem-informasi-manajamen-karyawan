<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';

    protected $fillable = [
        'nik',
        'nip',
        'nama',
        'alamat_rumah',
        'no_telepon',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'pendidikan',
        'status_perkawinan',
    ];

    public function pekerjaanKaryawan()
    {
        return $this->hasMany(PekerjaanKaryawan::class, 'id_karyawan');
    }
}
