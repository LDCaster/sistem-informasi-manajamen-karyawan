<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\ResignasiKaryawan as ModelsResignasiKaryawan;

use Illuminate\Http\Request;

class ResignasiKaryawan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resignasikaryawan = ModelsResignasiKaryawan::with('karyawan')->get();

        return view('pages.resignasi_karyawan.index', [
            'title' => 'Daftar Resignasi Karyawan',
            'resignasikaryawan' => $resignasikaryawan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil hanya karyawan yang belum memiliki resignasi
        $karyawan = Karyawan::whereDoesntHave('editResignasi')->get();

        return view('pages.resignasi_karyawan.tambah_resignasi', [
            'title' => 'Tambah Resignasi Karyawan',
            'karyawan' => $karyawan,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_karyawan' => 'required|exists:karyawan,id',
            'tanggal_keluar' => 'required|date',
            'keterangan_keluar' => 'nullable|string|max:255',
        ]);

        ModelsResignasiKaryawan::create([
            'id_karyawan' => $request->id_karyawan,
            'tanggal_keluar' => $request->tanggal_keluar,
            'keterangan_keluar' => $request->keterangan_keluar,
        ]);

        return redirect()->route('resignasi-karyawan.index')->with('success', 'Data resignasi berhasil ditambahkan.');
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
        $karyawan = Karyawan::with('editResignasi')->findOrFail($id);
        $title = "Edit Resignasi Karyawan";
        return view('pages.resignasi_karyawan.edit_resignasi', compact('karyawan', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_keluar' => 'required|date',
            'keterangan_keluar' => 'nullable|string|max:255',
        ]);

        $resignasi = ModelsResignasiKaryawan::where('id_karyawan', $id)->first();

        if (!$resignasi) {
            return redirect()->route('resignasi-karyawan.index')->with('error', 'Data tidak ditemukan.');
        }

        $resignasi->update([
            'tanggal_keluar' => $request->tanggal_keluar,
            'keterangan_keluar' => $request->keterangan_keluar,
        ]);

        return redirect()->route('resignasi-karyawan.index')->with('success', 'Data resignasi berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $resignasi = ModelsResignasiKaryawan::where('id_karyawan', $id)->first();

        if (!$resignasi) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        $resignasi->delete();

        return response()->json(['message' => 'Karyawan berhasil dihapus.']);
    }
}
