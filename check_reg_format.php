<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\PpdbRegistrant;

// Show current registration number samples
echo "=== Current Registration Number Samples ===\n";
$samples = PpdbRegistrant::orderBy('id')->take(10)->get(['id', 'registration_number', 'nisn', 'full_name', 'created_at']);
foreach ($samples as $s) {
    echo "  ID: {$s->id} | Reg: {$s->registration_number} | NISN: {$s->nisn} | Name: {$s->full_name} | Created: {$s->created_at}\n";
}

echo "\n=== Distinct Registration Number Formats ===\n";
$allRegs = PpdbRegistrant::whereNotNull('registration_number')
    ->pluck('registration_number')
    ->unique()
    ->take(20);
foreach ($allRegs as $r) {
    echo "  $r\n";
}

echo "\n=== Total Records ===\n";
echo "Total: " . PpdbRegistrant::count() . "\n";
echo "With reg number: " . PpdbRegistrant::whereNotNull('registration_number')->where('registration_number', '!=', '')->count() . "\n";
