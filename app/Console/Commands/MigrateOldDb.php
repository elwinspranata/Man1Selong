<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MigrateOldDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:migrate-old-db {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate data from old SQL dump to ppdb_registrants table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filePath = $this->argument('file');

        if (!file_exists($filePath)) {
            $this->error("File not found: {$filePath}");
            return 1;
        }

        $this->info("Starting migration from {$filePath}...");

        $akunSiswa = [];
        $formulir = [];

        $handle = fopen($filePath, "r");
        if ($handle) {
            $currentTable = null;
            while (($line = fgets($handle)) !== false) {
                if (preg_match("/INSERT INTO `akun_siswa`/", $line)) {
                    $currentTable = 'akun_siswa';
                    continue;
                } elseif (preg_match("/INSERT INTO `formulir`/", $line)) {
                    $currentTable = 'formulir';
                    continue;
                } elseif (preg_match("/INSERT INTO `/", $line)) {
                    $currentTable = null;
                    continue;
                }

                if ($currentTable === 'akun_siswa' || $currentTable === 'formulir') {
                    $trimmedLine = trim($line);
                    if (empty($trimmedLine) || str_starts_with($trimmedLine, '--') || str_starts_with($trimmedLine, '/*')) {
                        continue;
                    }

                    // Extract values inside parentheses carefully
                    // This handles multiple values in one INSERT statement
                    // Note: This still relies on values not containing complex combinations of ), ( and , 
                    // but it's much better than the previous one for basic SQL dumps.
                    if (preg_match_all("/\((.+)\)(?:,|;)/U", $trimmedLine, $matches)) {
                        foreach ($matches[1] as $match) {
                            $values = str_getcsv($match, ",", "'");
                            $values = array_map(function($val) {
                                $val = trim($val);
                                return ($val === 'NULL' || $val === '') ? null : trim($val, "'");
                            }, $values);

                            if ($currentTable === 'akun_siswa') {
                                // id, nisn, password
                                if (count($values) >= 3) {
                                    $akunSiswa[$values[1]] = $values[2];
                                }
                            } else {
                                // many columns
                                if (count($values) > 10) {
                                    $formulir[] = $values;
                                }
                            }
                        }
                    }
                }
            }
            fclose($handle);
        }

        $this->info("Found " . count($akunSiswa) . " accounts and " . count($formulir) . " forms.");

        $count = 0;
        DB::beginTransaction();
        try {
            foreach ($formulir as $f) {
                $nisn = $f[1];
                $password = $akunSiswa[$nisn] ?? Hash::make('password'); // Default password if not found

                // Mapping
                $gender = ($f[3] === 'Laki-laki') ? 'L' : 'P';
                
                $statusMapping = [
                    'Belum Diverifikasi' => 'pending',
                    'Diterima' => 'accepted',
                    'Tidak Diterima' => 'rejected',
                    'Cadangan' => 'pending',
                ];
                $status = $statusMapping[$f[58]] ?? 'pending';

                $jalur = strtolower($f[50] ?? 'reguler');

                DB::table('ppdb_registrants')->updateOrInsert(
                    ['nisn' => $nisn],
                    [
                        'email' => "{$nisn}@man1selong.sch.id",
                        'password' => $password, 
                        'full_name' => $f[2],
                        'nik' => $f[8],
                        'gender' => $gender,
                        'birth_place' => $f[4],
                        'birth_date' => $this->formatDate($f[5]),
                        'religion' => $f[6],
                        'origin_school' => $f[31],
                        'origin_school_npsn' => $f[30],
                        'phone' => $f[11],
                        'address' => $f[10],
                        'father_name' => $f[13],
                        'father_occupation' => $f[15],
                        'father_phone' => $f[17],
                        'mother_name' => $f[19],
                        'mother_occupation' => $f[21],
                        'mother_phone' => $f[23],
                        'guardian_name' => $f[25],
                        'guardian_phone' => $f[29],
                        'jalur' => $jalur,
                        'photo' => $f[12],
                        'status' => $status,
                        'is_submitted' => true,
                        'submitted_at' => $this->formatDate($f[59]),
                        'created_at' => $this->formatDate($f[59]) ?: now(),
                        'updated_at' => $this->formatDateTime($f[62] ?? null) ?: now(),
                    ]
                );
                $count++;
            }
            DB::commit();
            $this->info("Successfully migrated {$count} registrants.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Migration failed: " . $e->getMessage());
            $this->error("Trace: " . $e->getTraceAsString());
        }

        return 0;
    }

    private function formatDate($date)
    {
        if (!$date || $date === '0000-00-00') return null;
        return $date;
    }

    private function formatDateTime($dateTime)
    {
        if (!$dateTime || $dateTime === '0000-00-00 00:00:00') return null;
        return $dateTime;
    }
}
