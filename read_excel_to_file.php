<?php
require __DIR__.'/vendor/autoload.php';
$inputFileName = __DIR__.'/Prestasiexcel/PRESTASI_DITERIMA_070326.xlsx';
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
$worksheet = $spreadsheet->getActiveSheet();
$highestColumn = $worksheet->getHighestColumn();
$highestRow = min(20, $worksheet->getHighestRow());

$output = "";
for ($row = 1; $row <= $highestRow; $row++) {
    $rowData = $worksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
    // Filter out completely empty rows
    $filtered = array_filter($rowData[0], function($v) { return $v !== null && $v !== ''; });
    if (!empty($filtered)) {
        $output .= "Row $row: " . implode(" | ", $rowData[0]) . "\n";
    }
}
file_put_contents(__DIR__.'/excel_headers.txt', $output);
echo "Done";
