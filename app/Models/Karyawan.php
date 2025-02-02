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


    public function editpekerjaanKaryawan()
    {
        return $this->hasOne(PekerjaanKaryawan::class, 'id_karyawan');
    }
    public function editkontrakKerja()
    {
        return $this->hasOne(KontrakKerja::class, 'id_karyawan');
    }
    public function editpelatihanKaryawan()
    {
        return $this->hasOne(PelatihanKaryawan::class, 'id_karyawan');
    }
    public function editpajakAsuransi()
    {
        return $this->hasOne(PajakAsuransi::class, 'id_karyawan');
    }
    public function editbankSIM()
    {
        return $this->hasOne(BankSIM::class, 'id_karyawan');
    }
    public function editMCU()
    {
        return $this->hasOne(MCUKaryawan::class, 'id_karyawan');
    }
    public function editcatatanPenting()
    {
        return $this->hasOne(CatatanPentingKaryawan::class, 'id_karyawan');
    }
    public function editkontakDarurat()
    {
        return $this->hasOne(KontakDarurat::class, 'id_karyawan');
    }
    public function editResignasi()
    {
        return $this->hasOne(ResignasiKaryawan::class, 'id_karyawan');
    }
}
