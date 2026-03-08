<?php
require __DIR__.'/vendor/autoload.php';
$inputFileName = __DIR__.'/Prestasiexcel/PRESTASI_DITERIMA_070326.xlsx';
if (!file_exists($inputFileName)) {
    echo "File not found: $inputFileName\n";
    exit;
}
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
$worksheet = $spreadsheet->getActiveSheet();
$highestColumn = $worksheet->getHighestColumn();
$row = 1; // Assuming headers are on row 1, maybe row 2? Let's read first 5 rows just in case.
for ($i = 1; $i <= 5; $i++) {
    $rowData = $worksheet->rangeToArray('A' . $i . ':' . $highestColumn . $i, NULL, TRUE, FALSE);
    echo "Row $i: ";
    print_r($rowData[0]);
}
