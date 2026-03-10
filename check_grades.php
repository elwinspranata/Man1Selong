<?php
define('LARAVEL_START', microtime(true));
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\PpdbRegistrant;

$registrants = PpdbRegistrant::whereNotNull('full_name')->limit(10)->get();

foreach ($registrants as $r) {
    echo "ID: {$r->id}, Name: {$r->full_name}\n";
    echo "  MTK: {$r->nilai_mtk_3}, {$r->nilai_mtk_4}, {$r->nilai_mtk_5}\n";
    echo "  IPA: {$r->nilai_ipa_3}, {$r->nilai_ipa_4}, {$r->nilai_ipa_5}\n";
    echo "  IPS: {$r->nilai_ips_3}, {$r->nilai_ips_4}, {$r->nilai_ips_5}\n";
    echo "  ENG: {$r->nilai_eng_3}, {$r->nilai_eng_4}, {$r->nilai_eng_5}\n";
    echo "  PAI: {$r->nilai_pai_3}, {$r->nilai_pai_4}, {$r->nilai_pai_5}\n";
    echo "  Avg: " . $r->average_grade . "\n";
    echo "---------------------------------\n";
}
