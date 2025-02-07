<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\PelatihanKaryawan as ModelsPelatihanKaryawan;
use Illuminate\Http\Request;

class PelatihanKaryawan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelatihankaryawan = ModelsPelatihanKaryawan::with('karyawan')->get();
        return view('pages.pelatihan_karyawan.daftar_pelatihan', [
            'title' => 'Daftar Pelatihan Karyawan',
            'pelatihankaryawan' => $pelatihankaryawan,  // Pass the pelatihankaryawan data to the view
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawan = Karyawan::all(); // Ambil semua data karyawan

        return view('pages.pelatihan_karyawan.tambah_pelatihan', [
            'title' => 'Tambah Pelatihan Karyawan',
            'karyawan' => $karyawan, // Kirim data ke view
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'id_karyawan' => 'required',
            'nama_pelatihan' => 'nullable|string|max:255',
            'tanggal_pelatihan' => 'nullable|date',
            'file_pelatihan' => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048', // Sesuaikan jenis file
        ]);

        // Simpan file pelatihan jika ada
        $filePath = null;
        if ($request->hasFile('file_pelatihan')) {
            $file = $request->file('file_pelatihan');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'assets/file_pelatihan/' . $fileName;

            // Pindahkan file ke public/assets/file_pelatihan
            $file->move(public_path('assets/file_pelatihan'), $fileName);
        }

        // Simpan data ke database
        ModelsPelatihanKaryawan::create([
            'id_karyawan' => $validatedData['id_karyawan'],
            'nama_pelatihan' => $validatedData['nama_pelatihan'],
            'tanggal_pelatihan' => $validatedData['tanggal_pelatihan'],
            'file_pelatihan' => $filePath,
        ]);

        return redirect()->route('pelatihan-karyawan.index')->with('success', 'Data pelatihan berhasil ditambahkan!');
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
        $pelatihan = ModelsPelatihanKaryawan::with('karyawan')->findOrFail($id);
        $karyawan = Karyawan::all(); // Ambil semua karyawan untuk pilihan dropdown
        $title = "Edit Pelatihan Karyawan";

        return view('pages.pelatihan_karyawan.edit_pelatihan', compact('pelatihan', 'karyawan', 'title'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_pelatihan' => 'nullable|string|max:255',
            'tanggal_pelatihan' => 'nullable|date',
            'file_pelatihan' => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048',
        ]);

        // Cari data pelatihan
        $pelatihan = ModelsPelatihanKaryawan::findOrFail($id);

        // Update data
        $pelatihan->nama_pelatihan = $validatedData['nama_pelatihan'];
        $pelatihan->tanggal_pelatihan = $validatedData['tanggal_pelatihan'];

        // Cek apakah ada file baru yang diunggah
        if ($request->hasFile('file_pelatihan')) {
            // Hapus file lama jika ada
            if ($pelatihan->file_pelatihan && file_exists(public_path($pelatihan->file_pelatihan))) {
                unlink(public_path($pelatihan->file_pelatihan));
            }

            // Simpan file baru
            $file = $request->file('file_pelatihan');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'assets/file_pelatihan/' . $fileName;
            $file->move(public_path('assets/file_pelatihan'), $fileName);

            $pelatihan->file_pelatihan = $filePath;
        }

        $pelatihan->save();

        return redirect()->route('pelatihan-karyawan.index')->with('success', 'Data pelatihan berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pelatihan = ModelsPelatihanKaryawan::findOrFail($id);

        if ($pelatihan->delete()) {
            return response()->json(['message' => 'Karyawan berhasil dihapus'], 200);
        } else {
            return response()->json(['message' => 'Gagal menghapus karyawan'], 500);
        }
    }
}
