<?php

namespace App\Http\Controllers;

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
        return view('pages.pelatihan_karyawan.tambah_pelatihan', [
            'title' => 'Tambah Pelatihan Karyawan',
        ]);
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
