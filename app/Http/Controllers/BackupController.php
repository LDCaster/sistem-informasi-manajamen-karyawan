<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackupController extends Controller
{
    public function backupDatabase()
    {
        $databaseName = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST');
        $backupFile = storage_path("app/backup-{$databaseName}-" . date('Y-m-d_H-i-s') . ".sql");

        // Jalankan perintah mysqldump
        $command = "mysqldump --user={$username} --password={$password} --host={$host} {$databaseName} > {$backupFile}";
        $output = null;
        $resultCode = null;
        exec($command, $output, $resultCode);

        if ($resultCode === 0) {
            return response()->download($backupFile)->deleteFileAfterSend(true);
        } else {
            return back()->with('error', 'Gagal melakukan backup database.');
        }
    }
}
