<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class ManajemenUsers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('karyawan')->get();
        return view('pages.manajemen_users.index', [
            'title' => 'Daftar Users',
            'users' => $users,
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
        $user = User::with('karyawan')->findOrFail($id);
        $karyawans = Karyawan::all(); // Ambil semua karyawan untuk dropdown
        $title = "Edit User";

        return view('pages.manajemen_users.ubah_user', compact('user', 'karyawans', 'title'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_karyawan' => 'required|exists:karyawan,id',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'role' => 'required|in:hrd,admin,staff',
            'status' => 'required|in:active,inactive,suspended',
        ]);

        $user = User::findOrFail($id);

        $user->id_karyawan = $request->id_karyawan;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->status = $request->status;

        // Update password jika diisi
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        try {
            $user->delete();
            return response()->json(['message' => 'User berhasil dihapus.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus user.'], 500);
        }
    }
}
