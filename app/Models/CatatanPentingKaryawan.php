<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanPentingKaryawan extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'catatan_penting_karyawan';

    // Define the columns that can be mass-assigned
    protected $fillable = [
        'id_karyawan',
        'tanggal_catatan',
        'kasus_catatan',
    ];

    // Define the relationship with the Karyawan model
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
