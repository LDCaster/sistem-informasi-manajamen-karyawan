<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PelatihanKaryawan extends Model
{
    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'pelatihan_karyawan';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'id_karyawan',
        'nama_pelatihan',
        'tanggal_pelatihan',
        'tanggal_pelatihan',
        'file_pelatihan',
    ];

    // Define the relationship with the Karyawan model
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
