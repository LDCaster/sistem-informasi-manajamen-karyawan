@extends('../main')

@section('content')
    <div class="panel flex items-center overflow-x-auto whitespace-nowrap p-3 text-primary">
        <div class="rounded-full bg-primary p-1.5 text-white ring-2 ring-primary/30 ltr:mr-3 rtl:ml-3">
            <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="h-3.5 w-3.5">
                <path
                    d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z"
                    stroke="currentColor" stroke-width="1.5"></path>
                <path opacity="0.5" d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            </svg>
        </div>
        <h5 class="text-lg font-semibold dark:text-white-light">Ubah Kontrak Kerja Karyawan</h5>
    </div>

    @if ($errors->any())
        <div class="flex items-center p-3.5 rounded text-danger bg-danger-light dark:bg-danger-dark-light">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="panel flex items-center overflow-x-auto whitespace-nowrap p-3">
        <div class="container">
            <form action="{{ route('kontrak-kerja.update', $karyawan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- KONTRAK KERJA --}}
                <fieldset class="border p-4">
                    <legend class="text-xl text-primary">Kontrak Kerja</legend>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-3">
                            <label for="jenis_kontrak" class="block">Jenis Kontrak <span
                                    style="color: red; font-size: 12px;">*Harus Diisi</span></label>
                            <select class="selectize" id="jenis_kontrak" name="jenis_kontrak">
                                <option value="PKWT"
                                    {{ old('jenis_kontrak', $karyawan->editkontrakKerja->jenis_kontrak ?? '') == 'PKWT' ? 'selected' : '' }}>
                                    PKWT</option>
                                <option value="PKWTT"
                                    {{ old('jenis_kontrak', $karyawan->editkontrakKerja->jenis_kontrak ?? '') == 'PKWTT' ? 'selected' : '' }}>
                                    PKWTT</option>
                                <option value="PKWT/PKWTT"
                                    {{ old('jenis_kontrak', $karyawan->editkontrakKerja->jenis_kontrak ?? '') == 'PKWT/PKWTT' ? 'selected' : '' }}>
                                    PKWT/PKWTT</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status_kontrak_lanjutan" class="block">Kontrak Kerja Ke-</label>
                            <input id="status_kontrak_lanjutan" type="number" name="status_kontrak_lanjutan"
                                class="form-input" placeholder="Masukkan Status Kontrak Kerja"
                                value="{{ old('status_kontrak_lanjutan', $karyawan->editkontrakKerja->status_kontrak_lanjutan ?? '') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_awal_kontrak_lanjutan" class="block">Tanggal Awal Kontrak Kerja</label>
                            <input id="tanggal_awal_kontrak_lanjutan" type="date" name="tanggal_awal_kontrak_lanjutan"
                                class="form-input"
                                value="{{ old('tanggal_awal_kontrak_lanjutan', $karyawan->editkontrakKerja->tanggal_awal_kontrak_lanjutan ?? '') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_akhir_kontrak_lanjutan" class="block">Tanggal Akhir Kontrak Kerja</label>
                            <input id="tanggal_akhir_kontrak_lanjutan" type="date" name="tanggal_akhir_kontrak_lanjutan"
                                class="form-input"
                                value="{{ old('tanggal_akhir_kontrak_lanjutan', $karyawan->editkontrakKerja->tanggal_akhir_kontrak_lanjutan ?? '') }}" />
                        </div>
                    </div>
                </fieldset>

                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
