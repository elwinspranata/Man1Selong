@extends('ppdb.layout')

@section('title', 'Kartu Peserta — PPDB ' . ($school_setting->school_name ?: 'MAN 1 Lombok Timur'))

@section('content')
<section class="py-10 bg-slate-50 min-h-[calc(100vh-4rem)]">
    <div class="max-w-xl mx-auto px-4">
        
        {{-- Print button --}}
        <div class="text-center mb-6 no-print">
            <button onclick="window.print()" class="ppdb-btn text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                Cetak Kartu Peserta
            </button>
        </div>

        {{-- Card --}}
        <div class="bg-white border-2 border-primary rounded-2xl overflow-hidden shadow-lg" id="print-area">
            {{-- Card Header --}}
            <div class="bg-gradient-to-r from-primary to-primary-dark p-5 text-white">
                <div class="flex items-center gap-3">
                    <img src="{{ $school_setting->logo ? asset('storage/'.$school_setting->logo) : asset('images/logo.png') }}" alt="Logo" class="h-12 w-auto brightness-0 invert">
                    <div>
                        <p class="text-[10px] font-semibold uppercase tracking-wider opacity-80">Kementerian Agama RI</p>
                        <h1 class="text-sm font-extrabold">{{ $school_setting->school_name ?: 'MAN 1 Lombok Timur' }}</h1>
                        <p class="text-[10px] opacity-70">PPDB {{ $school_setting->ppdb_year ?: '2026/2027' }}</p>
                    </div>
                </div>
            </div>

            {{-- Card Title --}}
            <div class="bg-secondary text-center py-2">
                <h2 class="text-xs font-extrabold text-neutral uppercase tracking-[0.2em]">Kartu Peserta PPDB</h2>
            </div>

            {{-- Card Body --}}
            <div class="p-6">
                <div class="flex gap-5">
                    {{-- Photo --}}
                    <div class="shrink-0">
                        @if($registrant->photo)
                        <img src="{{ asset('storage/' . $registrant->photo) }}" alt="Foto" class="w-24 h-32 object-cover rounded-lg border-2 border-slate-200">
                        @else
                        <div class="w-24 h-32 bg-slate-100 rounded-lg border-2 border-dashed border-slate-300 flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-8 h-8 text-slate-300 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                <p class="text-[8px] text-slate-400 font-medium">3x4</p>
                            </div>
                        </div>
                        @endif
                    </div>

                    {{-- Info --}}
                    <div class="flex-1 text-xs space-y-2">
                        <div class="bg-primary-light p-2 rounded-lg text-center mb-3">
                            <p class="text-[10px] font-bold text-primary/70 uppercase tracking-wider">No. Pendaftaran</p>
                            <p class="text-base font-extrabold text-primary tracking-wider">{{ $registrant->registration_number }}</p>
                        </div>

                        <table class="w-full">
                            <tr>
                                <td class="py-1 text-neutral/60 font-semibold pr-2">Nama</td>
                                <td class="py-1 text-neutral font-bold">: {{ $registrant->full_name }}</td>
                            </tr>
                            <tr>
                                <td class="py-1 text-neutral/60 font-semibold pr-2">NISN</td>
                                <td class="py-1 text-neutral font-medium">: {{ $registrant->nisn ?: '-' }}</td>
                            </tr>
                            <tr>
                                <td class="py-1 text-neutral/60 font-semibold pr-2">TTL</td>
                                <td class="py-1 text-neutral font-medium">: {{ $registrant->birth_place ?: '-' }}, {{ $registrant->birth_date ? $registrant->birth_date->format('d-m-Y') : '-' }}</td>
                            </tr>
                            <tr>
                                <td class="py-1 text-neutral/60 font-semibold pr-2">L/P</td>
                                <td class="py-1 text-neutral font-medium">: {{ $registrant->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            </tr>
                            <tr>
                                <td class="py-1 text-neutral/60 font-semibold pr-2">Sekolah</td>
                                <td class="py-1 text-neutral font-medium">: {{ $registrant->origin_school ?: '-' }}</td>
                            </tr>
                            <tr>
                                <td class="py-1 text-neutral/60 font-semibold pr-2">Jalur</td>
                                <td class="py-1 text-neutral font-bold">: {{ ucfirst($registrant->jalur ?: 'reguler') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Card Footer --}}
            <div class="bg-slate-50 px-6 py-3 border-t border-slate-200">
                <div class="flex items-center justify-between">
                    <p class="text-[10px] text-neutral/40 font-medium">Kartu ini wajib dibawa saat tes seleksi</p>
                    <p class="text-[10px] text-neutral/40 font-medium">Dicetak: {{ now()->format('d/m/Y') }}</p>
                </div>
            </div>
        </div>

        {{-- Note --}}
        <div class="mt-6 text-center no-print">
            <p class="text-xs text-neutral/40">Kartu ini wajib dibawa saat mengikuti tes seleksi dan verifikasi berkas.</p>
        </div>
    </div>
</section>
@endsection
