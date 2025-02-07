<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;

class LaporanKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.laporan.laporan_karyawan', [
            'title' => 'Laporan - Karyawan',
        ]);
    }
    public function export()
    {
        $karyawanList = Karyawan::with('editpekerjaanKaryawan', 'editpajakAsuransi', 'editbankSIM', 'editUser', 'editkontrakKerja', 'editResignasi', 'editMCU', 'editcatatanPenting', 'editkontakDarurat', 'excelpelatihan')->get();
        // dd($karyawanList);
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Merge Cells untuk Judul Utama
        $mergeCells = [
            'B4:B5',
            'C4:C5',
            'D4:D5',
            'E4:E5',
            'F4:F5',
            'G4:G5',
            'H4:H5',
            'I4:I5',
            'J4:J5',
            'K4:K5',
            'L4:L5',
            'M4:M5',
            'N4:N5',
            'O4:O5',
            'P4:P5',
            'Q4:Q5',
            'R4:R5',
            'S4:S5',
            'T4:T5',
            'U4:U5',
            'V4:V5',
            'W4:X4',
            'Y4:Z4',
            'AA4:AA5',
            'AB4:AE4',
            'AF4:AF5',
            'AG4:AG5',
            'AH4:AI4',
            'AJ4:AK4',
            'AL4:AN4',
            'AO4:AP4'
        ];

        foreach ($mergeCells as $cells) {
            $sheet->mergeCells($cells);
        }

        // Set Judul Utama
        $headers = [
            'B4' => 'NO',
            'C4' => 'NIK',
            'D4' => 'NIP',
            'E4' => 'NAMA',
            'F4' => 'SBU',
            'G4' => 'BAGIAN',
            'H4' => 'DEPT',
            'I4' => 'LOCATION',
            'J4' => 'TANGGAL MASUK',
            'K4' => 'ALAMAT RUMAH',
            'L4' => 'NO. TELEPON',
            'M4' => 'TEMPAT LAHIR',
            'N4' => 'TANGGAL LAHIR',
            'O4' => 'L/P',
            'P4' => 'PENDIDIKAN',
            'Q4' => 'STATUS PERKAWINAN',
            'R4' => 'NO. NPWP',
            'S4' => 'NO. BPJS KES',
            'T4' => 'NO. BPJS TK',
            'U4' => 'BANK ACCOUNT',
            'V4' => 'BANK',
            'W4' => 'SIM',
            'Y4' => 'PERMIT/SIMPER',
            'AA4' => 'EMAIL',
            'AB4' => 'STATUS KONTRAK KERJA',
            'AF4' => 'STATUS KARYAWAN (AKTIF/NONAKTIF)',
            'AG4' => 'PELATIHAN / TRAINING',
            'AH4' => 'RESIGNATION',
            'AJ4' => 'MCU TERAKHIR',
            'AL4' => 'CATATAN PENTING',
            'AO4' => 'EMERGENCY CALL'
        ];

        foreach ($headers as $cell => $text) {
            $sheet->setCellValue($cell, $text);
        }

        // Set Sub-Judul
        $subHeaders = [
            'W5' => 'NO.',
            'X5' => 'EXPIRED',
            'Y5' => 'NO.',
            'Z5' => 'EXPIRED',
            'AB5' => 'PKWT/PKWTT',
            'AC5' => 'KONTRAK LANJUTAN (KE-)',
            'AD5' => 'AWAL KONTRAK LANJUTAN',
            'AE5' => 'AKHIR KONTRAK LANJUTAN',
            'AH5' => 'TGL. KELUAR',
            'AI5' => 'KETERANGAN KELUAR',
            'AJ5' => 'TANGGAL',
            'AK5' => 'CATATAN DOKTER',
            'AL5' => 'TANGGAL',
            'AM5' => 'KASUS',
            'AN5' => 'KETERANGAN',
            'AO5' => 'NAMA',
            'AP5' => 'NO. TELEPON'
        ];

        foreach ($subHeaders as $cell => $text) {
            $sheet->setCellValue($cell, $text);
        }

        // Styling Header
        $headerCells = array_keys($headers);
        $subHeaderCells = array_keys($subHeaders);
        $allHeaderCells = array_merge($headerCells, $subHeaderCells);

        foreach ($allHeaderCells as $cell) {
            $sheet->getStyle($cell)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle($cell)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle($cell)->getFont()->setBold(true);
            $sheet->getStyle($cell)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('ED7D31'); // Warna header
        }

        // Sesuaikan Ukuran Kolom
        $columnWidths = [
            'B' => 5.89,
            'C' => 20.78,
            'D' => 11.67,
            'E' => 31.11,
            'F' => 15.89,
            'G' => 19.78,
            'H' => 18.78,
            'I' => 15.11,
            'J' => 16.22,
            'K' => 30.56,
            'L' => 16.67,
            'M' => 19.89,
            'N' => 18.56,
            'O' => 19.89,
            'P' => 19.33,
            'Q' => 12.78,
            'R' => 19.78,
            'S' => 17.11,
            'T' => 21.78,
            'U' => 19.78,
            'V' => 21.11,
            'W' => 16.33,
            'X' => 16.33,
            'Y' => 16.33,
            'Z' => 16.33,
            'AA' => 34.78,
            'AB' => 17.33,
            'AC' => 17.33,
            'AD' => 17.33,
            'AE' => 16.78,
            'AF' => 16.22,
            'AG' => 33.67,
            'AH' => 18.56,
            'AI' => 19.89,
            'AJ' => 18.56,
            'AK' => 19.89,
            'AL' => 18.56,
            'AM' => 41.22,
            'AN' => 35.33,
            'AO' => 23.56,
            'AP' => 27.67
        ];

        foreach ($columnWidths as $col => $width) {
            $sheet->getColumnDimension($col)->setWidth($width);
        }

        // Mengaktifkan Wrap Text untuk header yang memiliki teks panjang
        $wrapCells = ['Q4', 'AF4', 'AC5', 'AD5', 'AE5'];

        foreach ($wrapCells as $cell) {
            $sheet->getStyle($cell)->getAlignment()->setWrapText(true);
        }

        // Set Data Karyawan
        $row = 6; // Baris awal untuk data
        $no = 1;

        foreach ($karyawanList as $karyawan) {
            $sheet->setCellValue('B' . $row, $no++)
                ->setCellValueExplicit('C' . $row, $karyawan->nik, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                ->setCellValue('D' . $row, $karyawan->nip)
                ->setCellValue('E' . $row, $karyawan->nama)
                ->setCellValue('K' . $row, $karyawan->alamat_rumah)
                ->setCellValue('L' . $row, $karyawan->no_telepon)
                ->setCellValue('M' . $row, $karyawan->tempat_lahir)
                ->setCellValue('N' . $row, $karyawan->tanggal_lahir)
                ->setCellValue('O' . $row, $karyawan->jenis_kelamin)
                ->setCellValue('P' . $row, $karyawan->pendidikan)
                ->setCellValue('Q' . $row, $karyawan->status_perkawinan)
                ->setCellValue('R' . $row, $karyawan->npwp)
                ->setCellValue('S' . $row, $karyawan->bpjs_kes)
                ->setCellValue('T' . $row, $karyawan->bpjs_tk)
                ->setCellValue('U' . $row, $karyawan->bank_account)
                ->setCellValue('V' . $row, $karyawan->bank)
                ->setCellValue('W' . $row, $karyawan->sim)
                // Pekerjaan
                ->setCellValue('F' . $row, $karyawan->editpekerjaanKaryawan->sbu ?? '')
                ->setCellValue('G' . $row, $karyawan->editpekerjaanKaryawan->bagian ?? '')
                ->setCellValue('H' . $row, $karyawan->editpekerjaanKaryawan->departemen ?? '')
                ->setCellValue('I' . $row, $karyawan->editpekerjaanKaryawan->lokasi_kerja ?? '')
                ->setCellValue('J' . $row, $karyawan->editpekerjaanKaryawan->tanggal_masuk ?? '')
                ->setCellValue('AF' . $row, $karyawan->editpekerjaanKaryawan->status_karyawan ?? '')
                //PAJAK ASURANSI
                ->setCellValue('R' . $row, $karyawan->editpajakAsuransi->no_npwp ?? '')
                ->setCellValue('S' . $row, $karyawan->editpajakAsuransi->no_bpjs_kesehatan ?? '')
                ->setCellValue('T' . $row, $karyawan->editpajakAsuransi->no_bpjs_tenagakerja ?? '')
                //BANK ACCOUNT
                ->setCellValue('U' . $row, $karyawan->editbankSIM->no_rekening_bank ?? '')
                ->setCellValue('V' . $row, $karyawan->editbankSIM->nama_bank ?? '')
                ->setCellValue('W' . $row, $karyawan->editbankSIM->no_sim ?? '')
                ->setCellValue('X' . $row, $karyawan->editbankSIM->sim_expired ?? '')
                ->setCellValue('Y' . $row, $karyawan->editbankSIM->no_simper ?? '')
                ->setCellValue('Z' . $row, $karyawan->editbankSIM->simper_expired ?? '')
                //EMAIL
                ->setCellValue('AA' . $row, $karyawan->editUser->email ?? '')

                //KONTRAK KERJA
                ->setCellValue('AB' . $row, $karyawan->editkontrakKerja->jenis_kontrak ?? '')
                ->setCellValue('AC' . $row, $karyawan->editkontrakKerja->status_kontrak_lanjutan ?? '')
                ->setCellValue('AD' . $row, $karyawan->editkontrakKerja->tanggal_awal_kontrak_lanjutan ?? '')
                ->setCellValue('AE' . $row, $karyawan->editkontrakKerja->tanggal_akhir_kontrak_lanjutan ?? '')
                //RESIGNATION
                ->setCellValue('AH' . $row, $karyawan->editResignasi->tanggal_keluar ?? '')
                ->setCellValue('AI' . $row, $karyawan->editResignasi->keterangan_keluar ?? '')
                //MCU
                ->setCellValue('AJ' . $row, $karyawan->editMCU->mcu_terakhir ?? '')
                ->setCellValue('AK' . $row, $karyawan->editMCU->catatan_dokter ?? '')
                //CATATAN PENTING
                ->setCellValue('AL' . $row, $karyawan->editcatatanPenting->tanggal_catatan ?? '')
                ->setCellValue('AM' . $row, $karyawan->editcatatanPenting->kasus_catatan ?? '')
                ->setCellValue('AN' . $row, $karyawan->editcatatanPenting->keterangan_catatan ?? '')
                //EMMERGENCY CALL
                ->setCellValue('AO' . $row, $karyawan->editkontakDarurat->nama_kontak_darurat ?? '')
                ->setCellValue('AP' . $row, $karyawan->editkontakDarurat->no_telepon_kontak_darurat ?? '');
            // dd($karyawan->editUser->email);

            if ($karyawan->excelpelatihan->isNotEmpty()) {
                $pelatihanText = '';
                foreach ($karyawan->excelpelatihan as $pelatihan) {
                    $pelatihanText .= $pelatihan->nama_pelatihan . " (" . $pelatihan->tanggal_pelatihan . ")\n";
                }
                $sheet->setCellValue('AG' . $row, rtrim($pelatihanText, "\n"));
            }
            $row++;
        }

        // Tambahkan border pada semua data
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ];

        $sheet->getStyle('B4:AP' . ($row - 1))->applyFromArray($styleArray);


        // Download File Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'Data_Karyawan.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . urlencode($filename) . '"');
        $writer->save('php://output');
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
