@extends('ppdb.layout')

@section('title', 'Bukti Pendaftaran — PPDB ' . ($school_setting->school_name ?: 'MAN 1 Lombok Timur'))

@section('content')
<section class="py-10 bg-slate-50 min-h-[calc(100vh-4rem)]">
    <div class="max-w-3xl mx-auto px-4">
        
        {{-- Print button --}}
        <div class="text-center mb-6 no-print">
            <button onclick="window.print()" class="ppdb-btn text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                Cetak Bukti Pendaftaran
            </button>
        </div>

        {{-- Print content --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-8 md:p-12 shadow-sm" id="print-area">
            {{-- Header --}}
            <div class="text-center border-b-2 border-neutral pb-6 mb-8">
                <div class="flex items-center justify-center gap-4 mb-3">
                    <img src="{{ $school_setting->logo ? asset('storage/'.$school_setting->logo) : asset('images/logo.png') }}" alt="Logo" class="h-16 w-auto">
                    <div class="text-left">
                        <p class="text-xs font-semibold text-neutral/50 uppercase tracking-wider">Kementerian Agama Republik Indonesia</p>
                        <h1 class="text-xl font-extrabold text-neutral">{{ $school_setting->school_name ?: 'MAN 1 Lombok Timur' }}</h1>
                        <p class="text-xs text-neutral/60">{{ $school_setting->address ?: 'Lombok Timur, Nusa Tenggara Barat' }}</p>
                    </div>
                </div>
                <h2 class="text-lg font-bold text-neutral uppercase tracking-wider mt-4">Bukti Pendaftaran PPDB</h2>
                <p class="text-sm text-neutral/60">Tahun Ajaran {{ $school_setting->ppdb_year ?: '2026/2027' }}</p>
            </div>

            {{-- Registration info --}}
            <div class="bg-primary-light p-4 rounded-xl mb-8 text-center">
                <p class="text-xs font-bold text-primary uppercase tracking-wider mb-1">Nomor Pendaftaran</p>
                <p class="text-2xl font-extrabold text-primary tracking-widest">{{ $registrant->registration_number }}</p>
            </div>

            {{-- Data table --}}
            <div class="space-y-0">
                @php
                    $dataRows = [
                        ['label' => 'Nama Lengkap', 'value' => $registrant->full_name],
                        ['label' => 'NISN', 'value' => $registrant->nisn ?: '-'],
                        ['label' => 'NIK', 'value' => $registrant->nik ?: '-'],
                        ['label' => 'Jenis Kelamin', 'value' => $registrant->gender == 'L' ? 'Laki-laki' : 'Perempuan'],
                        ['label' => 'Tempat, Tanggal Lahir', 'value' => ($registrant->birth_place ?: '-') . ', ' . ($registrant->birth_date ? $registrant->birth_date->format('d F Y') : '-')],
                        ['label' => 'Agama', 'value' => $registrant->religion ?: '-'],
                        ['label' => 'Asal Sekolah', 'value' => $registrant->origin_school ?: '-'],
                        ['label' => 'Alamat', 'value' => $registrant->address ?: '-'],
                        ['label' => 'No. HP/WhatsApp', 'value' => $registrant->phone ?: '-'],
                        ['label' => 'Nama Ayah', 'value' => $registrant->father_name ?: '-'],
                        ['label' => 'Nama Ibu', 'value' => $registrant->mother_name ?: '-'],
                        ['label' => 'Jalur Pendaftaran', 'value' => ucfirst($registrant->jalur ?: 'reguler')],
                        ['label' => 'Tanggal Daftar', 'value' => $registrant->submitted_at ? $registrant->submitted_at->format('d F Y, H:i') . ' WITA' : '-'],
                        ['label' => 'Status', 'value' => $registrant->status_label],
                    ];
                @endphp

                <table class="w-full text-sm">
                    @foreach($dataRows as $row)
                    <tr class="border-b border-slate-100">
                        <td class="py-3 pr-4 font-semibold text-neutral/70 w-1/3 align-top">{{ $row['label'] }}</td>
                        <td class="py-3 text-neutral font-medium">: {{ $row['value'] }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>

            {{-- Footer notice --}}
            <div class="mt-10 pt-6 border-t border-slate-200">
                <div class="grid grid-cols-2 gap-8">
                    <div class="text-xs text-neutral/50 leading-relaxed">
                        <p class="font-bold text-neutral/70 mb-2">Catatan:</p>
                        <ul class="space-y-1 list-disc list-inside">
                            <li>Bukti pendaftaran ini harap dicetak dan dibawa saat verifikasi berkas</li>
                            <li>Berkas dikumpulkan dalam MAP: Hijau (MTs) / Merah (SMP)</li>
                        </ul>
                    </div>
                    <div class="text-center">
                        <p class="text-xs text-neutral/60 mb-12">Lombok Timur, {{ now()->format('d F Y') }}</p>
                        <p class="text-xs font-bold text-neutral border-t border-neutral inline-block pt-1 px-4">Panitia PPDB</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
