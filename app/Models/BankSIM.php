<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankSIM extends Model
{
    use HasFactory;

    protected $table = 'bank_sim_karyawan';

    // Specify the columns that can be mass-assigned
    protected $fillable = [
        'id_karyawan',
        'no_rekening_bank',
        'nama_bank',
        'no_sim',
        'sim_expired',
        'no_simper',
        'simper_expired',
    ];

    // Define the relationship with the Karyawan model
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
