<?php
// Parse the formulir INSERT to find the column index for no_pendaftaran
$file = fopen('routes/databaselama/old_db.sql', 'r');
if (!$file) { echo "File not found\n"; exit; }

$foundCreate = false;
$columns = [];
$sampleValues = [];

while (($line = fgets($file)) !== false) {
    // Find CREATE TABLE formulir to get column order
    if (stripos($line, 'CREATE TABLE') !== false && stripos($line, 'formulir') !== false) {
        $foundCreate = true;
        continue;
    }
    
    if ($foundCreate && stripos($line, 'no_pendaftaran') !== false) {
        echo "Found column definition: " . trim($line) . "\n";
    }
    
    if ($foundCreate && (stripos($line, 'ENGINE=') !== false || stripos($line, ');') !== false)) {
        $foundCreate = false;
    }
    
    // Find INSERT INTO formulir to get sample data
    if (stripos($line, 'INSERT INTO') !== false && stripos($line, 'formulir') !== false) {
        // Extract column list if present
        if (preg_match('/INSERT INTO\s+`?formulir`?\s*\(([^)]+)\)/i', $line, $colMatch)) {
            $colList = $colMatch[1];
            $cols = array_map(function($c) { return trim($c, " `'\"\t\n\r"); }, explode(',', $colList));
            echo "\nColumn list found (" . count($cols) . " columns):\n";
            foreach ($cols as $i => $c) {
                if (stripos($c, 'no_pendaftaran') !== false || stripos($c, 'pendaftaran') !== false || stripos($c, 'nomor') !== false) {
                    echo "  Index $i: $c\n";
                }
            }
            
            // Find no_pendaftaran index
            $noPendaftaranIdx = array_search('no_pendaftaran', $cols);
            if ($noPendaftaranIdx !== false) {
                echo "\nno_pendaftaran is at index: $noPendaftaranIdx\n";
            }
        }
        
        // Extract first few values
        preg_match_all("/\(([^)]+)\)/", $line, $rowMatches);
        if (!empty($rowMatches[1])) {
            echo "\nSample no_pendaftaran values:\n";
            foreach (array_slice($rowMatches[1], 0, 5) as $row) {
                $vals = str_getcsv($row, ',', "'");
                if (isset($noPendaftaranIdx) && $noPendaftaranIdx !== false && isset($vals[$noPendaftaranIdx])) {
                    echo "  " . trim($vals[$noPendaftaranIdx]) . "\n";
                } else {
                    // Show first few fields to help identify
                    echo "  First 5 vals: " . implode(' | ', array_slice($vals, 0, 5)) . "\n";
                }
            }
        }
        break;
    }
}
fclose($file);
