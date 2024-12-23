<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResignasiKaryawan extends Model
{
    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'resignasi_karyawan';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'id_karyawan',
        'tanggal_keluar',
        'keterangan_keluar',
    ];

    // Define the relationship with the Karyawan model
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
