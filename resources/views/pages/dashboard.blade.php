@extends('../main')

@section('content')
    <!-- Informasi User Login -->
    <div id="welcome-banner" class="text-white bg-primary p-5 rounded-lg shadow-md mb-6 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <!-- Icon -->
            <div class="bg-primary bg-opacity-20 p-2 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m0-4h.01M12 2a10 10 0 110 20 10 10 0 010-20z" />
                </svg>
            </div>

            <!-- Pesan Selamat Datang -->
            <div>
                <h2 class="text-lg font-bold">Selamat Datang, {{ $user->name }}!</h2>
                <p class="text-sm">Anda masuk sebagai <span class="font-bold">{{ ucfirst($user->role) }}</span> di Sistem
                    Informasi Manajemen Karyawan.</p>
            </div>
        </div>

        <!-- Tombol Close -->
        <button onclick="document.getElementById('welcome-banner').remove()"
            class="text-white hover:bg-white hover:text-blue-600 rounded-full p-2 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M6.293 6.293a1 1 0 011.414 0L10 8.586l2.293-2.293a1 1 0 111.414 1.414L11.414 10l2.293 2.293a1 1 0 01-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 10 6.293 7.707a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>



    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Total Users -->
        <div class="panel p-5 text-center bg-blue-500 rounded-lg shadow-md">
            <h6 class="text-lg font-semibold">Total Users</h6>
            <p class="text-3xl font-bold">{{ $totalUsers }}</p>
        </div>

        <!-- Total Employees -->
        <div class="panel p-5 text-center bg-green-500 rounded-lg shadow-md">
            <h6 class="text-lg font-semibold">Total Karyawan</h6>
            <p class="text-3xl font-bold">{{ $totalEmployees }}</p>
        </div>

        <!-- Training Data -->
        <div class="panel p-5 text-center bg-yellow-500 rounded-lg shadow-md">
            <h6 class="text-lg font-semibold">Data Pelatihan</h6>
            <p class="text-3xl font-bold">{{ $totalTrainings }}</p>
        </div>

        <!-- Resigned Employees -->
        <div class="panel p-5 text-center bg-red-500 rounded-lg shadow-md">
            <h6 class="text-lg font-semibold">Karyawan Resign</h6>
            <p class="text-3xl font-bold">{{ $resignedEmployees }}</p>
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Training Details -->
        <div class="panel p-5 bg-white rounded-lg shadow-md">
            <h6 class="text-lg font-semibold mb-4">Pelatihan Terbaru</h6>
            <ul>
                @foreach ($recentTrainings as $training)
                    <li class="mb-2 border-b pb-2">
                        <span class="text-blue-500 font-semibold" style="color: blue">{{ $training->nama_pelatihan }}</span>
                        - {{ $training->tanggal_pelatihan }}
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Recent Resigned Employees -->
        <div class="panel p-5 bg-white rounded-lg shadow-md">
            <h6 class="text-lg font-semibold mb-4">Karyawan Resign Terbaru</h6>
            <ul>
                @foreach ($recentResigned as $employee)
                    <li class="mb-2 border-b pb-2"><span style="color: red">{{ $employee->karyawan->nama }}</span> -
                        {{ $employee->tanggal_keluar }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
