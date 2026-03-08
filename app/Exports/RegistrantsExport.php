<?php

namespace App\Exports;

use App\Models\PpdbRegistrant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RegistrantsExport implements FromCollection, WithMapping, ShouldAutoSize, WithStyles, \Maatwebsite\Excel\Concerns\WithEvents, \Maatwebsite\Excel\Concerns\WithCustomStartCell
{
    protected $jalur;
    protected $count = 0;

    public function __construct($jalur = null)
    {
        $this->jalur = $jalur;
    }

    public function collection()
    {
        $query = PpdbRegistrant::latest();
        
        if ($this->jalur && in_array($this->jalur, ['prestasi', 'reguler'])) {
            $query->where('jalur', $this->jalur);
        }
        
        return $query->get();
    }

    public function startCell(): string
    {
        return 'A6';
    }

    public function map($registrant): array
    {
        $this->count++;
        
        return [
            $this->count,
            strtoupper($registrant->registration_number),
            $registrant->created_at->format('d/m/Y'),
            strtoupper($registrant->full_name),
            $registrant->nisn . ' ',
            $registrant->phone . ' ',
            strtoupper($registrant->origin_school),
            $registrant->gender,
            $registrant->nilai_ipa_3,
            $registrant->nilai_mtk_3,
            $registrant->nilai_ips_3,
            $registrant->nilai_eng_3,
            $registrant->nilai_pai_3,
            $registrant->nilai_ipa_4,
            $registrant->nilai_mtk_4,
            $registrant->nilai_ips_4,
            $registrant->nilai_eng_4,
            $registrant->nilai_pai_4,
            $registrant->nilai_ipa_5,
            $registrant->nilai_mtk_5,
            $registrant->nilai_ips_5,
            $registrant->nilai_eng_5,
            $registrant->nilai_pai_5,
            number_format((float)$registrant->average_grade, 2, '.', ''),
            $registrant->nik . ' ',
            strtoupper($registrant->father_name),
            $registrant->father_phone . ' ',
            $registrant->father_occupation,
            $registrant->pendidikan_ayah,
            $registrant->penghasilan_ayah,
            $registrant->father_nik . ' ',
            strtoupper($registrant->mother_name),
            $registrant->mother_phone . ' ',
            $registrant->mother_occupation,
            $registrant->pendidikan_ibu,
            $registrant->penghasilan_ibu,
            $registrant->mother_nik . ' ',
            $registrant->nomor_kip ? $registrant->nomor_kip . ' ' : '-',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Add header styles for rows 6 and 7
        return [
            6 => ['font' => ['bold' => true], 'alignment' => ['horizontal' => 'center', 'vertical' => 'center']],
            7 => ['font' => ['bold' => true], 'alignment' => ['horizontal' => 'center', 'vertical' => 'center']],
        ];
    }

    public function registerEvents(): array
    {
        return [
            \Maatwebsite\Excel\Events\AfterSheet::class => function(\Maatwebsite\Excel\Events\AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                
                // Add the custom header text for rows 2, 3, 4
                $sheet->setCellValue('A2', 'DATA SISWA DITERIMA JALUR ' . strtoupper($this->jalur ?: 'SEMUA'));
                $sheet->setCellValue('A3', 'TANGGAL : ' . date('d/m/Y'));
                $sheet->setCellValue('A4', 'JUMLAH : ' . \App\Models\PpdbRegistrant::when($this->jalur, fn($q) => $q->where('jalur', $this->jalur))->count());

                $sheet->getStyle('A2')->getFont()->setBold(true);
                $sheet->getStyle('A3')->getFont()->setBold(true);
                $sheet->getStyle('A4')->getFont()->setBold(true);

                // Set headers manually for row 6
                $headersRow6 = [
                    'A6' => 'No', 'B6' => 'NO PENDAFTARAN', 'C6' => 'TGL DAFTAR', 'D6' => 'NAMA',
                    'E6' => 'NISN', 'F6' => 'PHONE', 'G6' => 'SEKOLAH ASAL', 'H6' => 'JK',
                    'I6' => 'NILAI SEMESTER III', 'N6' => 'NILAI SEMESTER IV', 'S6' => 'NILAI SEMESTER V',
                    'X6' => 'NILAI RATA-RATA', 'Y6' => 'NIK SISWA', 'Z6' => 'NAMA AYAH', 'AA6' => 'HP AYAH',
                    'AB6' => 'PEKERJAAN AYAH', 'AC6' => 'PENDIDIKAN AYAH', 'AD6' => 'PENGHASILAN AYAH',
                    'AE6' => 'NIK AYAH', 'AF6' => 'NAMA IBU', 'AG6' => 'HP IBU', 'AH6' => 'PEKERJAAN IBU',
                    'AI6' => 'PENDIDIKAN IBU', 'AJ6' => 'PENGHASILAN IBU', 'AK6' => 'NIK IBU', 'AL6' => 'NOMOR KIP'
                ];
                
                foreach ($headersRow6 as $cell => $value) {
                    $sheet->setCellValue($cell, $value);
                }

                // Set headers manually for row 7 (sub headers for semesters)
                $subjects = ['IPA', 'MATEMATIKA', 'IPS', 'INGGRIS', 'PAI'];
                $colIndex = 9; // I
                for ($sem = 3; $sem <= 5; $sem++) {
                    foreach ($subjects as $subject) {
                        $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($colIndex);
                        $sheet->setCellValue($col . '7', $subject);
                        $colIndex++;
                    }
                }

                // Merge cells for headers that span 2 rows (6 and 7)
                $mergeTwoRows = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL'];
                foreach ($mergeTwoRows as $col) {
                    $sheet->mergeCells($col . '6:' . $col . '7');
                }

                // Merge cells for semester headers
                $sheet->mergeCells('I6:M6');
                $sheet->mergeCells('N6:R6');
                $sheet->mergeCells('S6:W6');

                // Auto size column width for headers
                $highestColumn = $sheet->getHighestColumn();
                $highestDataRow = $sheet->getHighestRow();
                for ($col = 'A'; $col !== $highestColumn; $col++) {
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }
                
                // Add borders to the table
                $styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                ];
                $sheet->getStyle('A6:' . $highestColumn . $highestDataRow)->applyFromArray($styleArray);
            }
        ];
    }
}
