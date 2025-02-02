<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\KontrakKerja as ModelsKontrakKerja;
use Illuminate\Http\Request;

class KontrakKerja extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontrakkerja = ModelsKontrakKerja::with('karyawan')->get();
        return view('pages.kontrak_kerja.index', [
            'title' => 'Kontrak Kerja - Karyawan',
            'kontrakkerja' => $kontrakkerja,  // Pass the kontrakkerja data to the view
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        $karyawan = Karyawan::with('editkontrakKerja')->findOrFail($id);
        $title = "Edit Kontrak Kerja Karyawan";
        return view('pages.kontrak_kerja.edit_kontrak_kerja', compact('karyawan', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_kontrak' => 'required|in:PKWT,PKWTT,PKWT/PKWTT',
            'status_kontrak_lanjutan' => 'nullable|integer',
            'tanggal_awal_kontrak_lanjutan' => 'nullable|date',
            'tanggal_akhir_kontrak_lanjutan' => 'nullable|date|after_or_equal:tanggal_awal_kontrak_lanjutan',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $kontrak = $karyawan->editkontrakKerja;

        if (!$kontrak) {
            $kontrak = new ModelsKontrakKerja();
            $kontrak->id_karyawan = $karyawan->id;
        }

        $kontrak->jenis_kontrak = $request->jenis_kontrak;
        $kontrak->status_kontrak_lanjutan = $request->status_kontrak_lanjutan;
        $kontrak->tanggal_awal_kontrak_lanjutan = $request->tanggal_awal_kontrak_lanjutan;
        $kontrak->tanggal_akhir_kontrak_lanjutan = $request->tanggal_akhir_kontrak_lanjutan;
        $kontrak->save();

        return redirect()->route('kontrak-kerja.index')->with('success', 'Kontrak kerja berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
