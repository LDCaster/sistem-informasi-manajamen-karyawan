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
        <h5 class="text-lg font-semibold dark:text-white-light">Ubah Karyawan</h5>
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
            <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- INFORMASI PRIBADI --}}
                <fieldset class="border p-4">
                    <legend class="text-xl text-primary">Informasi Pribadi</legend>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="mb-3">
                            <label for="nik">NIK <span style="color: red; font-size: 12px;">*Harus Diisi</span></label>
                            <input id="nik" type="text" name="nik" class="form-input"
                                value="{{ old('nik', $karyawan->nik) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="nip">NIP <span style="color: red; font-size: 12px;">*Harus Diisi</span></label>
                            <input id="nip" type="text" name="nip" class="form-input"
                                value="{{ old('nip', $karyawan->nip) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="nama">Nama <span style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="nama" type="text" name="nama" class="form-input"
                                value="{{ old('nama', $karyawan->nama) }}" />
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div class="mb-3">
                            <label for="no_telepon">No Telp. <span style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="no_telepon" type="text" name="no_telepon" class="form-input"
                                value="{{ old('no_telepon', $karyawan->no_telepon) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="status_perkawinan">Status Perkawinan <span
                                    style="color: red; font-size: 12px;">*Harus Diisi</span></label>
                            <select class="selectize" id="status_perkawinan" name="status_perkawinan">
                                <option value="Belum Menikah"
                                    {{ old('status_perkawinan', $karyawan->status_perkawinan) == 'Belum Menikah' ? 'selected' : '' }}>
                                    Belum Menikah</option>
                                <option value="Menikah"
                                    {{ old('status_perkawinan', $karyawan->status_perkawinan) == 'Menikah' ? 'selected' : '' }}>
                                    Menikah</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pendidikan">Pendidikan <span style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="pendidikan" type="text" name="pendidikan" class="form-input"
                                value="{{ old('pendidikan', $karyawan->pendidikan) }}" />
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div class="mb-3">
                            <label for="jenis_kelamin">Jenis Kelamin <span style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <select class="selectize" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="L"
                                    {{ old('jenis_kelamin', $karyawan->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-Laki
                                </option>
                                <option value="P"
                                    {{ old('jenis_kelamin', $karyawan->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tempat_lahir">Tempat Lahir <span style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="tempat_lahir" type="text" name="tempat_lahir" class="form-input"
                                value="{{ old('tempat_lahir', $karyawan->tempat_lahir) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir">Tanggal Lahir <span style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="tanggal_lahir" type="date" name="tanggal_lahir" class="form-input"
                                value="{{ old('tanggal_lahir', $karyawan->tanggal_lahir) }}" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-4">
                        <div class="mb-3">
                            <label for="alamat_rumah">Alamat Rumah <span style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <textarea id="alamat_rumah" name="alamat_rumah" class="form-input">{{ old('alamat_rumah', $karyawan->alamat_rumah) }}</textarea>
                        </div>
                    </div>
                </fieldset>

                {{-- KARIR --}}
                <fieldset class="border p-4">
                    <legend class="text-xl text-primary">Karir</legend>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="mb-3">
                            <label for="sbu" class="block">SBU <span style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="sbu" type="text" name="sbu" class="form-input"
                                placeholder="Masukkan SBU"
                                value="{{ old('sbu', $karyawan->editpekerjaanKaryawan->sbu ?? '') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="bagian" class="block">Bagian <span style="color: red; font-size: 12px;">*Harus
                                    Diisi</span></label>
                            <input id="bagian" type="text" name="bagian" class="form-input"
                                placeholder="Masukkan Bagian"
                                value="{{ old('bagian', $karyawan->editpekerjaanKaryawan->bagian ?? '') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="departemen" class="block">Departemen <span
                                    style="color: red; font-size: 12px;">*Harus Diisi</span></label>
                            <input id="departemen" type="text" name="departemen" class="form-input"
                                placeholder="Masukkan Departemen"
                                value="{{ old('departemen', $karyawan->editpekerjaanKaryawan->departemen ?? '') }}" />
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="mb-3">
                            <label for="lokasi_kerja" class="block">Lokasi Kerja <span
                                    style="color: red; font-size: 12px;">*Harus Diisi</span></label>
                            <input id="lokasi_kerja" type="text" name="lokasi_kerja" class="form-input"
                                placeholder="Masukkan Lokasi Kerja"
                                value="{{ old('lokasi_kerja', $karyawan->editpekerjaanKaryawan->lokasi_kerja ?? '') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_masuk" class="block">Tanggal Masuk <span
                                    style="color: red; font-size: 12px;">*Harus Diisi</span></label>
                            <input id="tanggal_masuk" type="date" name="tanggal_masuk" class="form-input"
                                value="{{ old('tanggal_masuk', $karyawan->editpekerjaanKaryawan->tanggal_masuk ?? '') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="status_karyawan" class="block">Status Karyawan <span
                                    style="color: red; font-size: 12px;">*Harus Diisi</span></label>
                            <select class="selectize" id="status_karyawan" name="status_karyawan">
                                <option value="Aktif"
                                    {{ old('status_karyawan', $karyawan->editpekerjaanKaryawan->status_karyawan ?? '') == 'Aktif' ? 'selected' : '' }}>
                                    Aktif</option>
                                <option value="Nonaktif"
                                    {{ old('status_karyawan', $karyawan->editpekerjaanKaryawan->status_karyawan ?? '') == 'Nonaktif' ? 'selected' : '' }}>
                                    Nonaktif</option>
                            </select>
                        </div>
                    </div>
                </fieldset>

                {{-- JAMINAN SOSIAL --}}
                <fieldset class="border p-4">
                    <legend class="text-xl text-primary">Jaminan Sosial</legend>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="mb-3">
                            <label for="no_npwp" class="block">NO NPWP <span
                                    style="color: red; font-size: 12px;">*Harus Diisi</span></label>
                            <input id="no_npwp" type="text" name="no_npwp" class="form-input"
                                placeholder="Masukkan NO NPWP"
                                value="{{ old('no_npwp', $karyawan->editpajakAsuransi->no_npwp ?? '') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="no_bpjs_kesehatan" class="block">NO BPJS Kesehatan <span
                                    style="color: red; font-size: 12px;">*Harus Diisi</span></label>
                            <input id="no_bpjs_kesehatan" type="text" name="no_bpjs_kesehatan" class="form-input"
                                placeholder="Masukkan NO BPJS Kesehatan"
                                value="{{ old('no_bpjs_kesehatan', $karyawan->editpajakAsuransi->no_bpjs_kesehatan ?? '') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="no_bpjs_tenagakerja" class="block">NO BPJS Tenagakerja <span
                                    style="color: red; font-size: 12px;">*Harus Diisi</span></label>
                            <input id="no_bpjs_tenagakerja" type="text" name="no_bpjs_tenagakerja" class="form-input"
                                placeholder="Masukkan NO BPJS Tenagakerja"
                                value="{{ old('no_bpjs_tenagakerja', $karyawan->editpajakAsuransi->no_bpjs_tenagakerja ?? '') }}" />
                        </div>
                    </div>
                </fieldset>

                {{-- BANK SIM Karyawan --}}
                <fieldset class="border p-4">
                    <legend class="text-xl text-primary">Data Bank/SIM</legend>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-3">
                            <label for="no_rekening_bank" class="block">No Rekening Bank</label>
                            <input id="no_rekening_bank" type="text" name="no_rekening_bank" class="form-input"
                                placeholder="Masukkan No Rekening"
                                value="{{ old('no_rekening_bank', $karyawan->editbankSIM->no_rekening_bank ?? '') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="nama_bank" class="block">Nama Bank</label>
                            <input id="nama_bank" type="text" name="nama_bank" class="form-input"
                                placeholder="Masukkan Nama Bank"
                                value="{{ old('nama_bank', $karyawan->editbankSIM->nama_bank ?? '') }}" />
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-3">
                            <label for="no_sim" class="block">No SIM</label>
                            <input id="no_sim" type="text" name="no_sim" class="form-input"
                                placeholder="Masukkan No SIM"
                                value="{{ old('no_sim', $karyawan->editbankSIM->no_sim ?? '') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="sim_expired" class="block">SIM Expired</label>
                            <input id="sim_expired" type="date" name="sim_expired" class="form-input"
                                value="{{ old('sim_expired', $karyawan->editbankSIM->sim_expired ?? '') }}" />
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-3">
                            <label for="no_simper" class="block">No SIMPER</label>
                            <input id="no_simper" type="text" name="no_simper" class="form-input"
                                placeholder="Masukkan No SIMPER"
                                value="{{ old('no_simper', $karyawan->editbankSIM->no_simper ?? '') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="simper_expired" class="block">SIMPER Expired</label>
                            <input id="simper_expired" type="date" name="simper_expired" class="form-input"
                                value="{{ old('simper_expired', $karyawan->editbankSIM->simper_expired ?? '') }}" />
                        </div>
                    </div>

                </fieldset>


                {{-- MCU Karyawan --}}
                <fieldset class="border p-4">
                    <legend class="text-xl text-primary">Data MCU</legend>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-3">
                            <label for="mcu_terakhir" class="block">MCU Terakhir <span
                                    style="color: red; font-size: 12px;">*Harus Diisi</span></label>
                            <input id="mcu_terakhir" type="date" name="mcu_terakhir" class="form-input"
                                value="{{ old('mcu_terakhir', $karyawan->editMCU->mcu_terakhir ?? '') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="catatan_dokter" class="block">Catatan Dokter <span
                                    style="color: red; font-size: 12px;">*Harus Diisi</span></label>
                            <textarea rows="2" class="form-textarea ltr:rounded-l-none rtl:rounded-r-none" id="catatan_dokter"
                                name="catatan_dokter">{{ old('catatan_dokter', $karyawan->editMCU->catatan_dokter ?? '') }}</textarea>
                        </div>
                    </div>
                </fieldset>

                {{-- Catatan Penting --}}
                <fieldset class="border p-4">
                    <legend class="text-xl text-primary">Catatan Penting</legend>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="mb-3">
                            <label for="tanggal_catatan" class="block">Tanggal</label>
                            <input id="tanggal_catatan" type="date" name="tanggal_catatan" class="form-input"
                                value="{{ old('tanggal_catatan', $karyawan->editcatatanPenting->tanggal_catatan ?? '') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="kasus_catatan" class="block">Kasus</label>
                            <textarea rows="2" class="form-textarea ltr:rounded-l-none rtl:rounded-r-none" id="kasus_catatan"
                                name="kasus_catatan">{{ old('kasus_catatan', $karyawan->editcatatanPenting->kasus_catatan ?? '') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan_catatan" class="block">Keterangan</label>
                            <textarea rows="2" class="form-textarea ltr:rounded-l-none rtl:rounded-r-none" id="keterangan_catatan"
                                name="keterangan_catatan">{{ old('keterangan_catatan', $karyawan->editcatatanPenting->keterangan_catatan ?? '') }}</textarea>
                        </div>
                    </div>
                </fieldset>

                {{-- Emergency Call --}}
                <fieldset class="border p-4">
                    <legend class="text-xl text-primary">Data Emergency Call</legend>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-3">
                            <label for="nama_kontak_darurat" class="block">Nama</label>
                            <input id="nama_kontak_darurat" type="text" name="nama_kontak_darurat" class="form-input"
                                value="{{ old('nama_kontak_darurat', $karyawan->editkontakDarurat->nama_kontak_darurat ?? '') }}"
                                placeholder="Masukkan Nama" />
                        </div>
                        <div class="mb-3">
                            <label for="no_telepon_kontak_darurat" class="block">No Telp.</label>
                            <input id="no_telepon_kontak_darurat" type="text" name="no_telepon_kontak_darurat"
                                class="form-input"
                                value="{{ old('no_telepon_kontak_darurat', $karyawan->editkontakDarurat->no_telepon_kontak_darurat ?? '') }}"
                                placeholder="Masukkan No Telp" />
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
