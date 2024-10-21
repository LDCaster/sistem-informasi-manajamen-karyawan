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

        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 20);
            $table->string('nip', 20);
            $table->string('nama', 100);
            $table->text('alamat_rumah');
            $table->string('no_telepon', 15);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('pendidikan', 50);
            $table->enum('status_perkawinan', ['Kawin', 'Belum Kawin', 'Cerai Hidup', 'Cerai Mati', 'Menikah']);
            $table->enum('role', ['admin', 'hrd', 'karyawan'])->default('karyawan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
