<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KontakDarurat extends Model
{
    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'kontak_darurat_karyawan';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'id_karyawan',
        'nama_kontak_darurat',
        // 'hubungan_kontak_darurat',
        'no_telepon_kontak_darurat',
    ];

    // Define the relationship with the Karyawan model
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
