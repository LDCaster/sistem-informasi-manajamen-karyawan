@extends('../main')

@section('content')
    <div class="panel flex items-center overflow-x-auto whitespace-nowrap p-3 text-primary">
        <div class="rounded-full bg-primary p-1.5 text-white ring-2 ring-primary/30 ltr:mr-3 rtl:ml-3">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M16 6C16 8.20914 14.2091 10 12 10C9.79086 10 8 8.20914 8 6C8 3.79086 9.79086 2 12 2C14.2091 2 16 3.79086 16 6Z"
                    fill="currentColor" />
                <path opacity="0.5"
                    d="M14.4774 21.9208C13.7513 21.9728 12.9296 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C14.8806 13 17.4056 13.8564 18.8142 15.1412C18.298 15 17.5737 15 16.5 15C14.8501 15 14.0251 15 13.5126 15.5126C13 16.0251 13 16.8501 13 18.5C13 20.1499 13 20.9749 13.5126 21.4874C13.7501 21.725 14.0547 21.8524 14.4774 21.9208Z"
                    fill="currentColor" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M16.5 22C14.8501 22 14.0251 22 13.5126 21.4874C13 20.9749 13 20.1499 13 18.5C13 16.8501 13 16.0251 13.5126 15.5126C14.0251 15 14.8501 15 16.5 15C18.1499 15 18.9749 15 19.4874 15.5126C20 16.0251 20 16.8501 20 18.5C20 20.1499 20 20.9749 19.4874 21.4874C18.9749 22 18.1499 22 16.5 22ZM17.0833 16.9444C17.0833 16.6223 16.8222 16.3611 16.5 16.3611C16.1778 16.3611 15.9167 16.6223 15.9167 16.9444V17.9167H14.9444C14.6223 17.9167 14.3611 18.1778 14.3611 18.5C14.3611 18.8222 14.6223 19.0833 14.9444 19.0833H15.9167V20.0556C15.9167 20.3777 16.1778 20.6389 16.5 20.6389C16.8222 20.6389 17.0833 20.3777 17.0833 20.0556V19.0833H18.0556C18.3777 19.0833 18.6389 18.8222 18.6389 18.5C18.6389 18.1778 18.3777 17.9167 18.0556 17.9167H17.0833V16.9444Z"
                    fill="currentColor" />
            </svg>
        </div>
        <h5 class="text-lg font-semibold dark:text-white-light">Tambah Karyawan</h5>

    </div>
    {{-- <div class="panel"> --}}
    @if ($errors->any())
        <!-- danger -->
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
            <form action="{{ route('karyawan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- INFORMASI PRIBADI  --}}
                <fieldset class="border p-4">
                    <legend class="text-xl text-primary">Informasi Pribadi</legend>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="mb-3">
                            <label for="nik" class="block">NIK <span style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="nik" type="text" name="nik" class="form-input"
                                placeholder="Masukkan NIK" />
                        </div>
                        <div class="mb-3">
                            <label for="nip" class="block">NIP <span style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="nip" type="text" name="nip" class="form-input"
                                placeholder="Masukkan NIP" />
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="block">Nama <span style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="nama" type="text" name="nama" class="form-input"
                                placeholder="Masukkan Nama" />
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="mb-3">
                            <label for="no_telepon" class="block">No Telp. <span
                                    style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="no_telepon" type="text" name="no_telepon" class="form-input"
                                placeholder="Masukkan No Telp" />
                        </div>
                        <div class="mb-3">
                            <label for="status_perkawinan" class="block">Status Perkawinan <span
                                    style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <!-- basic -->
                            <select class="selectize" id="status_perkawinan" name="status_perkawinan">
                                <option selected value="Belum Menikah">Belum Menikah</option>
                                <option value="Menikah">Menikah</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pendidikan" class="block">Pendidikan</label>
                            <input id="pendidikan" type="text" name="pendidikan" class="form-input"
                                placeholder="Masukkan Pendidikan" />
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="block">Jenis Kelamin <span
                                    style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <!-- basic -->
                            <select class="selectize" id="jenis_kelamin" name="jenis_kelamin">
                                <option selected value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tempat_lahir" class="block">Tempat Lahir <span
                                    style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="tempat_lahir" type="text" name="tempat_lahir" class="form-input"
                                placeholder="Masukkan Tempat Lahir" />
                        </div>
                        <div class="mb-3">
                            <label for="Tanggal Lahir" class="block">Tanggal Lahir <span
                                    style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="Tanggal Lahir" type="date" name="tanggal_lahir" class="form-input"
                                placeholder="Masukkan Tanggal Lahir" />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="mb-3">
                            <label for="Alamat Rumah" class="block">Alamat Rumah <span
                                    style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <textarea rows="2" class="form-textarea ltr:rounded-l-none rtl:rounded-r-none" id="alamat_rumah"
                                name="alamat_rumah"></textarea>
                        </div>
                    </div>
                </fieldset>
                {{-- KARIR  --}}
                <fieldset class="border p-4">
                    <legend class="text-xl text-primary">Karir</legend>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="mb-3">
                            <label for="sbu" class="block">SBU <span style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="sbu" type="text" name="sbu" class="form-input"
                                placeholder="Masukkan sbu" />
                        </div>
                        <div class="mb-3">
                            <label for="bagian" class="block">Bagian <span style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="bagian" type="text" name="bagian" class="form-input"
                                placeholder="Masukkan Bagian" />
                        </div>
                        <div class="mb-3">
                            <label for="departemen" class="block">Departemen <span
                                    style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="departemen" type="text" name="departemen" class="form-input"
                                placeholder="Masukkan Departemen" />
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="mb-3">
                            <label for="lokasi_kerja" class="block">Lokasi Kerja <span
                                    style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="lokasi_kerja" type="text" name="lokasi_kerja" class="form-input"
                                placeholder="Masukkan Lokasi Kerja" />
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_masuk" class="block">Tanggal Masuk <span
                                    style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="tanggal_masuk" type="date" name="tanggal_masuk" class="form-input"
                                placeholder="Masukkan Tanggal Masuk" />
                        </div>
                        <div class="mb-3">
                            <label for="status_karyawan" class="block">Status Karyawan <span
                                    style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <!-- basic -->
                            <select class="selectize" id="status_karyawan" name="status_karyawan">
                                <option selected value="Aktif">Aktif</option>
                                <option value="Nonaktif">Nonaktif</option>
                            </select>
                        </div>
                    </div>

                </fieldset>
                {{-- Kontrak Kerja  --}}
                <fieldset class="border p-4">
                    <legend class="text-xl text-primary">Kontrak Kerja</legend>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-3">
                            <label for="jenis_kontrak" class="block">Jenis Kontrak <span
                                    style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <!-- basic -->
                            <select class="selectize" id="jenis_kontrak" name="jenis_kontrak">
                                <option selected value="PKWT">PKWT</option>
                                <option value="PKWTT">PKWTT</option>
                                <option value="PKWT/PKWTT">PKWT/PKWTT</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status_kontrak_lanjutan" class="block">Kontrak Kerja Ke-</label>
                            <input id="status_kontrak_lanjutan" type="number" name="status_kontrak_lanjutan"
                                class="form-input" placeholder="Masukkan Status Kontrak Kerja" />
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_awal_kontrak_lanjutan" class="block">Tanggal Awal Kontrak Kerja <span
                                    style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="tanggal_awal_kontrak_lanjutan" type="date" name="tanggal_awal_kontrak_lanjutan"
                                class="form-input" placeholder="Masukkan Awal Kontrak Kerja" />
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_akhir_kontrak_lanjutan" class="block">Tanggal Akhir Kontrak Kerja <span
                                    style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="tanggal_akhir_kontrak_lanjutan" type="date"
                                name="tanggal_akhir_kontrak_lanjutan" class="form-input"
                                placeholder="Masukkan Akhir Kontrak Kerja" />
                        </div>
                    </div>
                </fieldset>
                {{-- Pelatihan Karyawn  --}}
                <fieldset class="border p-4">
                    <legend class="text-xl text-primary">Pelatihan Karyawan</legend>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-3">
                            <label for="nama_pelatihan" class="block">Nama Pelatihan</label>
                            <input id="nama_pelatihan" type="text" name="nama_pelatihan" class="form-input"
                                placeholder="Masukkan Nama Pelatihan" />
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_pelatihan" class="block">Tamggal Pelatihan</label>
                            <input id="tanggal_pelatihan" type="date" name="tanggal_pelatihan" class="form-input"
                                placeholder="Masukkan Status Kontrak Kerja" />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="mb-3">
                            <label for="file_pelatihan" class="block">File Upload</label>
                            <input id="file_pelatihan" type="file" name="file_pelatihan" class="form-input" />
                        </div>
                    </div>
                </fieldset>
                {{-- Data Jaminan Sosial  --}}
                <fieldset class="border p-4">
                    <legend class="text-xl text-primary">Jaminan Sosial</legend>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="mb-3">
                            <label for="no_npwp" class="block">NO NPWP <span
                                    style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="no_npwp" type="text" name="no_npwp" class="form-input"
                                placeholder="Masukkan NO NPWP" />
                        </div>
                        <div class="mb-3">
                            <label for="no_bpjs_kesehatan" class="block">NO BPJS Kesehatan <span
                                    style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="no_bpjs_kesehatan" type="text" name="no_bpjs_kesehatan" class="form-input"
                                placeholder="Masukkan NO BPJS Kesehatan" />
                        </div>
                        <div class="mb-3">
                            <label for="no_bpjs_tenagakerja" class="block">NO BPJS Tenagakerja <span
                                    style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="no_bpjs_tenagakerja" type="text" name="no_bpjs_tenagakerja" class="form-input"
                                placeholder="Masukkan NO BPJS Tenagakerja" />
                        </div>
                    </div>

                </fieldset>
                {{-- BANK SIM Karyawan  --}}
                <fieldset class="border p-4">
                    <legend class="text-xl text-primary">Data Bank/SIM</legend>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-3">
                            <label for="no_rekening_bank" class="block">No Rekening Bank</label>
                            <input id="no_rekening_bank" type="text" name="no_rekening_bank" class="form-input"
                                placeholder="Masukkan No Rekening" />
                        </div>
                        <div class="mb-3">
                            <label for="nama_bank" class="block">Nama Bank</label>
                            <input id="nama_bank" type="text" name="nama_bank" class="form-input"
                                placeholder="Masukkan Nama Bank" />
                        </div>

                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-3">
                            <label for="no_sim" class="block">No SIM</label>
                            <input id="no_sim" type="text" name="no_sim" class="form-input"
                                placeholder="Masukkan No SIM" />
                        </div>
                        <div class="mb-3">
                            <label for="sim_expired" class="block">SIM Expired</label>
                            <input id="sim_expired" type="date" name="sim_expired" class="form-input"
                                placeholder="Masukkan SIM Expired" />
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-3">
                            <label for="no_simper" class="block">No SIMPER</label>
                            <input id="no_simper" type="text" name="no_simper" class="form-input"
                                placeholder="Masukkan No SIMPER" />
                        </div>
                        <div class="mb-3">
                            <label for="simper_expired" class="block">SIMPER Expired</label>
                            <input id="simper_expired" type="date" name="simper_expired" class="form-input"
                                placeholder="Masukkan SIMPER Expired" />
                        </div>
                    </div>

                </fieldset>
                {{-- MCU Karyawan  --}}
                <fieldset class="border p-4">
                    <legend class="text-xl text-primary">Data MCU</legend>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-3">
                            <label for="mcu_terakhir" class="block">MCU Terakhir <span
                                    style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="mcu_terakhir" type="date" name="mcu_terakhir" class="form-input"
                                placeholder="Masukkan MCU Terakhir" />
                        </div>
                        <div class="mb-3">
                            <label for="nama_bank" class="block">Catatan Dokter <span
                                    style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <textarea rows="2" class="form-textarea ltr:rounded-l-none rtl:rounded-r-none" id="catatan_dokter"
                                name="catatan_dokter"></textarea>
                        </div>
                    </div>

                </fieldset>
                {{-- Catatan Penting  --}}
                <fieldset class="border p-4">
                    <legend class="text-xl text-primary">Catatan Penting</legend>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="mb-3">
                            <label for="tanggal_catatan" class="block">Tanggal</label>
                            <input id="tanggal_catatan" type="date" name="tanggal_catatan" class="form-input"
                                placeholder="Masukkan Tanggal Catatan" />
                        </div>
                        <div class="mb-3">
                            <label for="kasus_catatan" class="block">Kasus</label>
                            <textarea rows="2" class="form-textarea ltr:rounded-l-none rtl:rounded-r-none" id="kasus_catatan"
                                name="kasus_catatan"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan_catatan" class="block">Keterangan</label>
                            <textarea rows="2" class="form-textarea ltr:rounded-l-none rtl:rounded-r-none" id="keterangan_catatan"
                                name="keterangan_catatan"></textarea>
                        </div>
                    </div>

                </fieldset>
                {{-- Emergency Call  --}}
                <fieldset class="border p-4">
                    <legend class="text-xl text-primary">Data Emergancy Call</legend>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-3">
                            <label for="nama_kontak_darurat" class="block">Nama</label>
                            <input id="nama_kontak_darurat" type="text" name="nama_kontak_darurat" class="form-input"
                                placeholder="Masukkan Nama" />
                        </div>
                        <div class="mb-3">
                            <label for="no_telepon_kontak_darurat" class="block">No Telp.</label>
                            <input id="no_telepon_kontak_darurat" type="text" name="no_telepon_kontak_darurat"
                                class="form-input" placeholder="Masukkan No Telp" />
                        </div>
                    </div>

                </fieldset>

                <button type="submit" class="btn btn-primary w-full mt-6">Simpan Data Karyawan</button>
            </form>
        </div>
    </div>
@endsection
