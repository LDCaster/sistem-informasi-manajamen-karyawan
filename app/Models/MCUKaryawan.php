<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MCUKaryawan extends Model
{
    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'mcu_karyawan';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'id_karyawan',
        'mcu_terakhir',
        'catatan_dokter',
    ];

    // Define the relationship with the Karyawan model
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
