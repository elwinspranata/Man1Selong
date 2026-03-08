<?php
require __DIR__.'/vendor/autoload.php';
$inputFileName = __DIR__.'/Prestasiexcel/PRESTASI_DITERIMA_070326.xlsx';
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
$worksheet = $spreadsheet->getActiveSheet();
$highestColumn = $worksheet->getHighestColumn();
$result = [];
for ($i = 1; $i <= 20; $i++) {
    $rowData = $worksheet->rangeToArray('A' . $i . ':' . $highestColumn . $i, NULL, TRUE, FALSE);
    $result["Row $i"] = array_filter($rowData[0], function($v) { return !is_null($v) && $v !== ''; });
}
echo json_encode($result, JSON_PRETTY_PRINT);
