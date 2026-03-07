@extends('layouts.base')

@section('title', 'PPDB ' . ($school_setting->ppdb_year ? explode('/', $school_setting->ppdb_year)[0] : '2026') . ' — ' . ($school_setting->school_name ?: 'MAN 1 Lombok Timur'))

@section('content')
<section class="relative pt-32 pb-20 bg-secondary overflow-hidden">
    <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
        <span class="bg-primary text-white text-[10px] font-bold uppercase py-1.5 px-4 rounded-full mb-4 inline-block">Tahun Ajaran {{ $school_setting->ppdb_year ?: '2026/2027' }}</span>
        <h1 class="text-4xl md:text-5xl font-extrabold text-neutral mb-4 leading-tight">Pendaftaran Peserta Didik Baru</h1>
        <p class="text-neutral/70 max-w-2xl mx-auto font-medium italic">Mari bergabung menjadi bagian dari generasi hebat, religius, dan berprestasi di MAN 1 Lombok Timur.</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-16">
            {{-- Alur Pendaftaran --}}
            <div>
                <h2 class="text-3xl font-bold text-neutral mb-10">Alur Pendaftaran</h2>
                <div class="space-y-12">
                    @php
                        $flows = $school_setting->ppdb_flow ?? [
                            ['icon' => '📝', 'title' => 'Pendaftaran Online', 'description' => 'Mengisi formulir melalui portal PPDB resmi madrasah.'],
                            ['icon' => '📄', 'title' => 'Verifikasi Berkas', 'description' => 'Membawa dokumen asli ke madrasah untuk divalidasi oleh panitia.'],
                            ['icon' => '📝', 'title' => 'Tes Seleksi', 'description' => 'Mengikuti tes akademik, baca tulis Al-Qur\'an, dan wawancara.'],
                            ['icon' => '🎉', 'title' => 'Pengumuman', 'description' => 'Pengumuman kelulusan dapat dilihat secara online atau di papan informasi.'],
                        ];
                    @endphp
                    @foreach($flows as $i => $flow)
                    <div class="flex gap-6 relative">
                        @if(!$loop->last)
                        <div class="absolute top-12 left-6 w-0.5 h-16 bg-border"></div>
                        @endif
                        <div class="w-14 h-14 bg-light text-2xl flex items-center justify-center rounded-2xl shadow-sm border border-border shrink-0 z-10">{{ $flow['icon'] ?? '📝' }}</div>
                        <div>
                            <p class="text-xs font-bold text-primary uppercase mb-1 tracking-widest">Tahap {{ $i + 1 }}</p>
                            <h3 class="text-xl font-bold text-neutral mb-2">{{ $flow['title'] ?? '' }}</h3>
                            <p class="text-neutral-light text-sm leading-relaxed">{{ $flow['description'] ?? '' }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Syarat --}}
            <div class="bg-light p-10 rounded-3xl border border-border shadow-sm">
                <h3 class="text-2xl font-bold text-neutral mb-8">Persyaratan Berkas</h3>
                <ul class="space-y-4">
                    @php
                        $requirements = $school_setting->ppdb_requirements ?? [
                            ['item' => 'Fotokopi Ijazah/SKL dilegalisir (2 lembar)'],
                            ['item' => 'Fotokopi Kartu Keluarga & Akta Kelahiran'],
                            ['item' => 'Pas foto terbaru ukuran 3x4 (4 lembar)'],
                            ['item' => 'Fotokopi KIP/PKH (jika ada)'],
                            ['item' => 'Sertifikat prestasi minimal tingkat kabupaten (jika ada)'],
                        ];
                    @endphp
                    @foreach($requirements as $req)
                    <li class="flex items-center gap-4 text-neutral-light">
                        <svg class="w-5 h-5 text-primary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-sm font-medium">{{ $req['item'] ?? '' }}</span>
                    </li>
                    @endforeach
                </ul>
                <div class="mt-12 p-8 bg-white border border-border rounded-2xl">
                    <p class="text-center text-sm text-neutral-light mb-6">
                        {!! $school_setting->ppdb_info ?: 'Pendaftaran Gelombang 1 Dibuka: <strong>01 Maret — 30 April 2026</strong>' !!}
                    </p>
                    @if($school_setting->ppdb_url)
                    <a href="{{ $school_setting->ppdb_url }}" target="_blank" class="btn-primary w-full py-4 uppercase tracking-[0.2em] font-extrabold shadow-gold text-center block">Daftar Sekarang (Eksternal)</a>
                    @else
                    <a href="#form-pendaftaran" class="btn-primary w-full py-4 uppercase tracking-[0.2em] font-extrabold shadow-gold text-center block">Isi Formulir Online</a>
                    @endif
                </div>
            </div>
        </div>

        @if(!$school_setting->ppdb_url)
        <div id="form-pendaftaran" class="mt-24 max-w-4xl mx-auto">
            <div class="bg-white p-10 md:p-16 rounded-[3rem] border border-border shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-bl-full"></div>
                <div class="relative z-10">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-neutral mb-4">Formulir Pendaftaran</h2>
                        <p class="text-neutral-light text-sm font-medium">Silakan lengkapi data calon peserta didik baru di bawah ini dengan benar.</p>
                    </div>
                    
                    <livewire:ppdb-registration-form />
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
