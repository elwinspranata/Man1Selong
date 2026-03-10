<?php
define('LARAVEL_START', microtime(true));
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\PpdbRegistrant;
use Illuminate\Support\Facades\DB;

$registrants = PpdbRegistrant::whereNull('registration_number')
    ->orderBy('created_at')
    ->orderBy('id')
    ->get();

$counts = [];

// DB::beginTransaction();

try {
    foreach ($registrants as $r) {
        $year = $r->created_at ? $r->created_at->format('Y') : '2025';
        
        if (!isset($counts[$year])) {
            // Check if there are already records for this year with registration numbers
            // and find the last count
            $lastRecord = PpdbRegistrant::whereYear('created_at', $year)
                ->whereNotNull('registration_number')
                ->where('registration_number', 'LIKE', "PPDB-{$year}-%")
                ->orderBy('registration_number', 'desc')
                ->first();
            
            if ($lastRecord) {
                $lastNum = (int) substr($lastRecord->registration_number, -4);
                $counts[$year] = $lastNum;
            } else {
                $counts[$year] = 0;
            }
        }
        
        $counts[$year]++;
        $regNum = 'PPDB-' . $year . '-' . str_pad($counts[$year], 4, '0', STR_PAD_LEFT);
        
        $r->registration_number = $regNum;
        $r->save();
        
        echo "Updating ID: {$r->id} -> {$regNum}\n";
    }
    
    // DB::commit();
    echo "Successfully updated " . count($registrants) . " records.\n";
} catch (\Exception $e) {
    // DB::rollBack();
    echo "Error: " . $e->getMessage() . "\n";
}
