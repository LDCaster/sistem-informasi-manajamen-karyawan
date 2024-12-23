<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PajakAsuransi extends Model
{
    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'pajak_asuransi_karyawan';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'id_karyawan',
        'no_npwp',
        'no_bpjs_kesehatan',
        'no_bpjs_tenagakerja',
    ];

    // Define the relationship with the Karyawan model
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
