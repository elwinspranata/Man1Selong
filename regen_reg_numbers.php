<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\PpdbRegistrant;
use Illuminate\Support\Facades\DB;

echo "=== Regenerating Registration Numbers ===\n";
echo "New format: NNN/PNT-PPDB/YY/X (A=Prestasi, B=Reguler)\n\n";

// Group by year and jalur, then assign sequential numbers
$years = PpdbRegistrant::selectRaw('YEAR(created_at) as year')
    ->distinct()
    ->orderBy('year')
    ->pluck('year');

$totalUpdated = 0;

DB::beginTransaction();
try {
    foreach ($years as $year) {
        $shortYear = substr((string) $year, -2);
        
        foreach (['prestasi', 'reguler'] as $jalur) {
            $jalurCode = $jalur === 'prestasi' ? 'A' : 'B';
            
            $registrants = PpdbRegistrant::whereYear('created_at', $year)
                ->where('jalur', $jalur)
                ->orderBy('id')
                ->get();
            
            $count = 0;
            foreach ($registrants as $registrant) {
                $count++;
                $newRegNumber = str_pad($count, 3, '0', STR_PAD_LEFT) . '/PNT-PPDB/' . $shortYear . '/' . $jalurCode;
                
                $registrant->update(['registration_number' => $newRegNumber]);
                $totalUpdated++;
            }
            
            if ($count > 0) {
                echo "Year $year, Jalur $jalur ($jalurCode): $count registrants updated\n";
            }
        }
    }
    
    DB::commit();
    echo "\nTotal updated: $totalUpdated\n";
    
    // Show samples
    echo "\n=== Sample Results ===\n";
    $samples = PpdbRegistrant::orderBy('id')->take(10)->get(['registration_number', 'full_name', 'jalur']);
    foreach ($samples as $s) {
        echo "  {$s->registration_number} | {$s->full_name} | {$s->jalur}\n";
    }
    
} catch (\Exception $e) {
    DB::rollBack();
    echo "ERROR: " . $e->getMessage() . "\n";
}
