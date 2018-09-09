<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ifsnop\Mysqldump as IMysqldump;
use Carbon;
use Storage;
use DB;

class backupController extends Controller
{
    


public function backup(){

try {
	$filename = "/backup-" . Carbon\Carbon::now()->format('Y-m-d_H-i-s') . ".sql";

    $command ="mysql:host=" . env('DB_HOST') .";";
    $dbname= "dbname=" . env('DB_DATABASE')."";
    $username=env('DB_USERNAME');
    $password=env('DB_PASSWORD');

    $dump = new IMysqldump\Mysqldump($command.$dbname, $username, $password);
    $dump->start(storage_path() . $filename);
    echo "the database has been saved to the storage folder as backup-[timestamp].sql";
    
} catch (\Exception $e) {
    echo 'mysqldump-php error: ' . $e->getMessage();
}



}


}


