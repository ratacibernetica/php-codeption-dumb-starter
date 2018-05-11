<?php
/**
 * This script will download an xls file containing USD-MXN
 * exchange rates.
 *
 * Then, It will parse it and save it to a table in a database.
 */

require 'vendor/autoload.php';

use mroldan\php\ExcelParser;

$path = __DIR__ . '/../downloads/';

$date = date('Ymd');

$fileName = "tc_$date.xls";
$fullPath = $path . $fileName;

if (file_exists($fullPath)) {
    unlink($fullPath);
}

$wasDownloaded = downloadFile($fullPath);

if (!file_exists($fullPath)) {
    die("file $fileName not found");
}

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
$reader->setReadDataOnly(true);
$sheet = $reader->load($fullPath);

print_r($sheet);

/**
 * Downloads a XLS file from SAT Mexico and will save it to $fullPath
 *
 * @param string $fullPath i.e /tmp
 *
 * @return bool|int
 */
function downloadFile($fullPath)
{
    $year = date('Y');
    $url
        = file_get_contents("http://www.sat.gob.mx/informacion_fiscal/tablas_indicadores/Documents/tc_$year.xls");

    return file_put_contents($fullPath, $url);
}
