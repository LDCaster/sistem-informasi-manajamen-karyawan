<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KontrakKerja extends Model
{
    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'kontrak_kerja_karyawan';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'id_karyawan',
        'jenis_kontrak',
        'status_kontrak_lanjutan',
        'tanggal_awal_kontrak_lanjutan',
        'tanggal_akhir_kontrak_lanjutan',
    ];

    // Define the relationship with the Karyawan model
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
