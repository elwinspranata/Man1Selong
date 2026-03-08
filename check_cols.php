<?php 
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$columns = Illuminate\Support\Facades\Schema::getColumnListing('school_settings');
file_put_contents('cols.json', json_encode($columns, JSON_PRETTY_PRINT));
