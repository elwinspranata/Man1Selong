@extends('ppdb.layout')

@section('title', 'PPDB Online ' . ($school_setting->ppdb_year ?: '2026/2027') . ' — ' . ($school_setting->school_name ?: 'MAN 1 Lombok Timur'))

@section('content')
{{-- Hero Section --}}
<section class="relative pt-20 pb-32 bg-gradient-to-br from-primary via-primary-dark to-accent overflow-hidden">
    {{-- Decorative elements --}}
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-10 w-72 h-72 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-secondary rounded-full blur-3xl"></div>
    </div>
    <div class="absolute inset-0 opacity-5 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
    
    <div class="relative z-10 max-w-5xl mx-auto px-4 text-center">
        <div class="animate-fade-in-up">
            <div class="inline-flex items-center gap-2 bg-white/15 backdrop-blur-sm text-white text-xs font-bold uppercase py-2 px-5 rounded-full mb-6 border border-white/20">
                <span class="w-2 h-2 bg-secondary rounded-full animate-pulse"></span>
                Pendaftaran Dibuka
            </div>
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 leading-tight">
                PENDAFTARAN PESERTA<br>DIDIK BARU <span class="text-secondary">{{ $school_setting->ppdb_year ? explode('/', $school_setting->ppdb_year)[0] : '2026' }}/{{ $school_setting->ppdb_year ? explode('/', $school_setting->ppdb_year)[1] ?? '2027' : '2027' }}</span>
            </h1>
            <p class="text-white/80 max-w-2xl mx-auto text-lg font-medium mb-10 leading-relaxed">
                Mari bergabung menjadi bagian dari generasi hebat, religius, dan berprestasi di {{ $school_setting->school_name ?: 'MAN 1 Lombok Timur' }}
            </p>
        </div>
        
        <div class="animate-fade-in-up-delay flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('ppdb.informasi') }}" class="bg-white text-primary px-8 py-4 rounded-2xl font-bold text-sm shadow-xl hover:shadow-2xl transition-all hover:scale-[1.02] inline-flex items-center gap-2 uppercase tracking-wider">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Informasi Pendaftaran
            </a>
            <a href="{{ route('ppdb.daftar') }}" class="bg-secondary text-neutral px-8 py-4 rounded-2xl font-bold text-sm shadow-xl hover:shadow-2xl transition-all hover:scale-[1.02] inline-flex items-center gap-2 uppercase tracking-wider">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Formulir Pendaftaran
            </a>
        </div>
    </div>
</section>

{{-- Info Cards --}}
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-8 -mt-20 relative z-20">
            {{-- Jalur Prestasi --}}
            <div class="ppdb-card p-8 hover:shadow-lg transition-shadow">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-secondary/10 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-neutral">Jalur Prestasi</h3>
                        <p class="text-xs text-primary font-semibold uppercase tracking-wider">Sedang Berlangsung</p>
                    </div>
                </div>
                <div class="space-y-3 text-sm text-neutral/70">
                    @php
                        $flows = $school_setting->ppdb_flow ?? [];
                    @endphp
                    <div class="bg-slate-50 p-4 rounded-xl">
                        <p class="font-bold text-neutral text-xs uppercase tracking-wider mb-2">Jadwal Pendaftaran</p>
                        <p>Pendaftaran mulai tanggal <strong>2 Maret 2026</strong> s/d <strong>12 Maret 2026</strong></p>
                        <p class="mt-1">Tes ibadah dan Baca Qur'an: <strong>4 Maret 2026</strong> s/d <strong>14 Maret 2026</strong></p>
                        <p class="mt-1">Pengumuman: <strong>18 Maret 2026</strong></p>
                    </div>
                </div>
            </div>

            {{-- Jalur Reguler --}}
            <div class="ppdb-card p-8 hover:shadow-lg transition-shadow">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-neutral">Jalur Reguler</h3>
                        <p class="text-xs text-neutral/50 font-semibold uppercase tracking-wider">Segera Dibuka</p>
                    </div>
                </div>
                <div class="space-y-3 text-sm text-neutral/70">
                    <div class="bg-slate-50 p-4 rounded-xl">
                        <p class="font-bold text-neutral text-xs uppercase tracking-wider mb-2">Jadwal Pendaftaran</p>
                        <p>Pendaftaran mulai tanggal <strong>4 Mei 2026</strong> s/d <strong>9 Mei 2026</strong></p>
                        <p class="mt-1">Tes ibadah: <strong>6 Mei 2026</strong> s/d <strong>12 Mei 2026</strong></p>
                        <p class="mt-1">Tes Potensi Akademik: <strong>13 Mei 2026</strong></p>
                        <p class="mt-1">Pengumuman: <strong>16 Mei 2026</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Alur Pendaftaran --}}
<section class="py-16 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-12">
            <span class="inline-flex items-center gap-2 bg-primary-light text-primary px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest mb-4">Tata Cara</span>
            <h2 class="text-3xl font-extrabold text-neutral">Alur Pendaftaran Online</h2>
        </div>

        <div class="grid md:grid-cols-4 gap-6">
            @php
                $steps = [
                    ['icon' => '👤', 'title' => 'Buat Akun', 'desc' => 'Daftarkan akun dengan email dan password di halaman pendaftaran.'],
                    ['icon' => '📝', 'title' => 'Isi Formulir', 'desc' => 'Login dan lengkapi data diri, data orang tua, dan upload dokumen.'],
                    ['icon' => '📄', 'title' => 'Cetak Bukti', 'desc' => 'Cetak bukti pendaftaran dan kartu peserta untuk verifikasi.'],
                    ['icon' => '✅', 'title' => 'Verifikasi', 'desc' => 'Serahkan berkas ke panitia PPDB untuk diverifikasi.'],
                ];
            @endphp
            @foreach($steps as $i => $step)
            <div class="text-center group">
                <div class="w-16 h-16 bg-white shadow-md rounded-2xl flex items-center justify-center text-3xl mx-auto mb-4 group-hover:shadow-lg group-hover:scale-110 transition-all border border-slate-100">
                    {{ $step['icon'] }}
                </div>
                <span class="text-xs font-bold text-primary uppercase tracking-widest">Langkah {{ $i + 1 }}</span>
                <h4 class="text-base font-bold text-neutral mt-1 mb-2">{{ $step['title'] }}</h4>
                <p class="text-xs text-neutral/60 leading-relaxed">{{ $step['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-16 bg-white">
    <div class="max-w-3xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-extrabold text-neutral mb-4">Siap Mendaftar?</h2>
        <p class="text-neutral/60 mb-8">Buat akun dan lengkapi formulir pendaftaran sekarang juga.</p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('ppdb.register') }}" class="ppdb-btn text-sm px-8 py-4 !rounded-2xl uppercase tracking-wider">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                Buat Akun Baru
            </a>
            <a href="{{ route('ppdb.daftar') }}" class="border-2 border-primary text-primary px-8 py-4 rounded-2xl font-bold text-sm hover:bg-primary hover:text-white transition-all uppercase tracking-wider inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                Sudah Punya Akun
            </a>
        </div>
    </div>
</section>
@endsection
