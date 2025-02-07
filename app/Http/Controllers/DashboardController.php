<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\PelatihanKaryawan;
use App\Models\ResignasiKaryawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Total Users
        $totalUsers = User::count();

        // Total Karyawan
        $totalEmployees = Karyawan::count();

        // Total Data Pelatihan
        $totalTrainings = PelatihanKaryawan::count();

        // Total Karyawan yang Resign
        $resignedEmployees = ResignasiKaryawan::count();

        // Pelatihan Terbaru (ambil 5 data terbaru)
        $recentTrainings = PelatihanKaryawan::latest()->take(5)->get();

        // Karyawan Resign Terbaru (ambil 5 data terbaru)
        $recentResigned = ResignasiKaryawan::with('karyawan')->latest()->take(5)->get();

        return view('pages.dashboard', [
            'title'             => 'Dashboard',
            'user'              => $user,
            'totalUsers'        => $totalUsers,
            'totalEmployees'    => $totalEmployees,
            'totalTrainings'    => $totalTrainings,
            'resignedEmployees' => $resignedEmployees,
            'recentTrainings'   => $recentTrainings,
            'recentResigned'    => $recentResigned,
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
