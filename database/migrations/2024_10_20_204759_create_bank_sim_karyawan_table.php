<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bank_sim_karyawan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_karyawan')->constrained('karyawan')->onDelete('cascade');
            $table->string('no_rekening_bank', 20)->nullable();
            $table->string('nama_bank', 50)->nullable();
            $table->string('no_sim', 20)->nullable();
            $table->date('sim_expired')->nullable();
            $table->string('no_simper', 20)->nullable();
            $table->date('simper_expired')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_sim_karyawan');
    }
};
