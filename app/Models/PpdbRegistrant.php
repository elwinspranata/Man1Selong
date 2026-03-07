<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class PpdbRegistrant extends Authenticatable
{
    protected $fillable = [
        'registration_number', 'email', 'password',
        'full_name', 'nisn', 'nik', 'gender', 'birth_place', 'birth_date', 'religion',
        'origin_school', 'origin_school_npsn',
        'phone', 'address', 'province', 'city', 'district', 'village', 'postal_code',
        'father_name', 'father_occupation', 'father_phone',
        'mother_name', 'mother_occupation', 'mother_phone',
        'guardian_name', 'guardian_phone',
        'jalur', 'photo', 'ijazah_file', 'kk_file', 'akta_file', 'prestasi_file', 'raport_file',
        'nilai_mtk_3', 'nilai_mtk_4', 'nilai_mtk_5',
        'nilai_ipa_3', 'nilai_ipa_4', 'nilai_ipa_5',
        'nilai_ips_3', 'nilai_ips_4', 'nilai_ips_5',
        'nilai_eng_3', 'nilai_eng_4', 'nilai_eng_5',
        'is_submitted', 'status', 'notes', 'submitted_at',
    ];

    protected $hidden = ['password'];

    protected $casts = [
        'birth_date' => 'date',
        'is_submitted' => 'boolean',
        'submitted_at' => 'datetime',
    ];

    public static function generateRegistrationNumber(): string
    {
        $year = date('Y');
        $count = static::whereYear('created_at', $year)->count() + 1;
        return 'PPDB-' . $year . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'draft' => 'Draft',
            'pending' => 'Menunggu Verifikasi',
            'verified' => 'Terverifikasi',
            'accepted' => 'Diterima',
            'rejected' => 'Ditolak',
            default => $this->status,
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'draft' => 'gray',
            'pending' => 'yellow',
            'verified' => 'blue',
            'accepted' => 'green',
            'rejected' => 'red',
            default => 'gray',
        };
    }
}
