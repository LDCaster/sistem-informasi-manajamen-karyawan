@extends('../main')

@section('content')
    <div class="panel flex items-center overflow-x-auto whitespace-nowrap p-3 text-primary">
        <div class="rounded-full bg-primary p-1.5 text-white ring-2 ring-primary/30 ltr:mr-3 rtl:ml-3">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.5"
                    d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                    fill="currentColor" />
                <path
                    d="M12.75 11C12.75 10.5858 12.4142 10.25 12 10.25C11.5858 10.25 11.25 10.5858 11.25 11L11.25 13.25H9C8.58579 13.25 8.25 13.5858 8.25 14C8.25 14.4142 8.58579 14.75 9 14.75H11.25V17C11.25 17.4142 11.5858 17.75 12 17.75C12.4142 17.75 12.75 17.4142 12.75 17V14.75H15C15.4142 14.75 15.75 14.4142 15.75 14C15.75 13.5858 15.4142 13.25 15 13.25H12.75L12.75 11Z"
                    fill="currentColor" />
            </svg>

        </div>
        <h5 class="text-lg font-semibold dark:text-white-light">Tambah Pelatihan Karyawan</h5>
    </div>

    <div class="panel flex items-center overflow-x-auto whitespace-nowrap p-3">
        <div class="container">
            <form action="{{ route('karyawan.store') }}" method="POST">
                @csrf
                {{-- Pelatihan Karyawn  --}}
                <fieldset class="border p-4">
                    <legend class="text-xl text-primary">Pelatihan Karyawan</legend>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-3">
                            <label for="jenis_kontrak" class="block">Nama Pelatihan</label>
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
                            <label for="jenis_kontrak" class="block">File Upload</label>
                            <input id="nama_pelatihan" type="file" name="nama_pelatihan" class="form-input"
                                placeholder="Masukkan Nama Pelatihan" />
                        </div>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-primary w-full mt-6">Simpan Data Pelatihan</button>
            </form>
        </div>
    </div>
@endsection
