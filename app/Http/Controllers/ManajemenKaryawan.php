<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\BankSIM;
use App\Models\CatatanPentingKaryawan;
use App\Models\KontakDarurat;
use App\Models\KontrakKerja;
use App\Models\MCUKaryawan;
use App\Models\PajakAsuransi;
use App\Models\PekerjaanKaryawan;
use App\Models\PelatihanKaryawan;
use App\Models\ResignasiKaryawan;
use Illuminate\Http\Request;

class ManajemenKaryawan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawans = Karyawan::with('pekerjaanKaryawan')->get();

        return view('pages.manajamen_karyawan.daftar_karyawan', [
            'title' => 'Daftar Karyawan',
            'karyawans' => $karyawans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.manajamen_karyawan.tambah_karyawan', [
            'title' => 'Tambah Karyawan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data karyawan
        $validatedData = $request->validate([
            'nik' => 'required|numeric|unique:karyawan,nik',
            'nip' => 'nullable|numeric',
            'nama' => 'required|string|max:255',
            'no_telepon' => 'required|numeric',
            'status_perkawinan' => 'required|in:Belum Menikah,Menikah',
            'pendidikan' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat_rumah' => 'required|string|max:500',
        ]);

        // Validasi data pekerjaan karyawan
        $validatedJobData = $request->validate([
            'sbu' => 'required|string|max:100',
            'bagian' => 'required|string|max:100',
            'departemen' => 'required|string|max:100',
            'lokasi_kerja' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'status_karyawan' => 'required|in:Aktif,Nonaktif', // Sesuaikan dengan opsi valid status karyawan
        ]);

        // Validasi data kontrak kerja
        $validatedContractData = $request->validate([
            'jenis_kontrak' => 'required|string|max:50',
            'status_kontrak_lanjutan' => 'nullable|numeric',
            'tanggal_awal_kontrak_lanjutan' => 'nullable|date',
            'tanggal_akhir_kontrak_lanjutan' => 'nullable|date|after_or_equal:tanggal_awal_kontrak_lanjutan',
        ]);

        // Validasi data pelatihan
        $validatedTrainingData = $request->validate([
            'nama_pelatihan' => 'required',
            'tanggal_pelatihan' => 'required|date',
            'file_pelatihan' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Validasi data Pajak Asuransi
        $validatedPajakData = $request->validate([
            'no_npwp' => 'nullable|string|max:50',
            'no_bpjs_kesehatan' => 'nullable|string|max:50',
            'no_bpjs_tenagakerja' => 'nullable|string|max:50',
        ]);

        // Validasi data BANK SIM
        $validatedSocialData = $request->validate([
            'no_rekening_bank' => 'nullable|numeric',
            'nama_bank' => 'nullable|string|max:255',
            'no_sim' => 'nullable|string|max:50',
            'sim_expired' => 'nullable|date',
            'no_simper' => 'nullable|string|max:50',
            'simper_expired' => 'nullable|date',
        ]);

        // Validasi data MCU
        $validatedMCUData = $request->validate([
            'mcu_terakhir' => 'nullable|date',
            'catatan_dokter' => 'nullable|string',
        ]);

        // Validasi data Catatan Penting Karyawan
        $validatedCatatanData = $request->validate([
            'tanggal_catatan' => 'nullable|date',
            'kasus_catatan' => 'nullable|string|max:255',
        ]);

        // Validasi data Kontak Darurat
        $validatedKontakData = $request->validate([
            'nama_kontak_darurat' => 'nullable|string|max:255',
            'no_telepon_kontak_darurat' => 'nullable|numeric',
        ]);

        try {
            // Simpan data karyawan
            $karyawan = Karyawan::create($validatedData);

            // Simpan data pekerjaan karyawan (gunakan ID karyawan yang baru saja dibuat)
            PekerjaanKaryawan::create([
                'id_karyawan' => $karyawan->id,
                'sbu' => $validatedJobData['sbu'],
                'bagian' => $validatedJobData['bagian'],
                'departemen' => $validatedJobData['departemen'],
                'lokasi_kerja' => $validatedJobData['lokasi_kerja'],
                'tanggal_masuk' => $validatedJobData['tanggal_masuk'],
                'status_karyawan' => $validatedJobData['status_karyawan'],
            ]);

            // Simpan data kontrak kerja
            KontrakKerja::create([
                'id_karyawan' => $karyawan->id,
                'jenis_kontrak' => $validatedContractData['jenis_kontrak'],
                'status_kontrak_lanjutan' => $validatedContractData['status_kontrak_lanjutan'],
                'tanggal_awal_kontrak_lanjutan' => $validatedContractData['tanggal_awal_kontrak_lanjutan'],
                'tanggal_akhir_kontrak_lanjutan' => $validatedContractData['tanggal_akhir_kontrak_lanjutan'],
            ]);

            // Simpan data pelatihan
            $filePath = null;
            if ($request->hasFile('file_pelatihan')) {
                // Mendapatkan file yang diupload
                $file = $request->file('file_pelatihan');

                // Menentukan nama file dengan timestamp agar tidak ada bentrok nama
                $fileName = time() . '_' . $file->getClientOriginalName();

                // Menentukan path tujuan penyimpanan
                $filePath = 'assets/file_pelatihan/' . $fileName;

                // Memindahkan file ke folder public/assets/file_pelatihan
                $file->move(public_path('assets/file_pelatihan'), $fileName);
            }


            PelatihanKaryawan::create([
                'id_karyawan' => $karyawan->id,
                'nama_pelatihan' => $validatedTrainingData['nama_pelatihan'],
                'tanggal_pelatihan' => $validatedTrainingData['tanggal_pelatihan'],
                'file_pelatihan' => $filePath,
            ]);

            // Simpan data pajak asuransi
            PajakAsuransi::create([
                'id_karyawan' => $karyawan->id,
                'no_npwp' => $validatedPajakData['no_npwp'],
                'no_bpjs_kesehatan' => $validatedPajakData['no_bpjs_kesehatan'],
                'no_bpjs_tenagakerja' => $validatedPajakData['no_bpjs_tenagakerja'],
            ]);

            // Simpan data jaminan sosial
            BankSIM::create([
                'id_karyawan' => $karyawan->id,
                'no_rekening_bank' => $validatedSocialData['no_rekening_bank'],
                'nama_bank' => $validatedSocialData['nama_bank'],
                'no_sim' => $validatedSocialData['no_sim'],
                'sim_expired' => $validatedSocialData['sim_expired'],
                'no_simper' => $validatedSocialData['no_simper'],
                'simper_expired' => $validatedSocialData['simper_expired'],
            ]);

            // Simpan data MCU
            MCUKaryawan::create([
                'id_karyawan' => $karyawan->id,
                'mcu_terakhir' => $validatedMCUData['mcu_terakhir'],
                'catatan_dokter' => $validatedMCUData['catatan_dokter'],
            ]);

            // Simpan data catatan penting karyawan
            CatatanPentingKaryawan::create([
                'id_karyawan' => $karyawan->id,
                'tanggal_catatan' => $validatedCatatanData['tanggal_catatan'],
                'kasus_catatan' => $validatedCatatanData['kasus_catatan'],
            ]);

            // Simpan data kontak darurat
            KontakDarurat::create([
                'id_karyawan' => $karyawan->id,
                'nama_kontak_darurat' => $validatedKontakData['nama_kontak_darurat'],
                'no_telepon_kontak_darurat' => $validatedKontakData['no_telepon_kontak_darurat'],
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('karyawan.index')->with('success', 'Data karyawan dan pekerjaan berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.')->withInput();
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
