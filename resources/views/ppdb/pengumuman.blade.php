@extends('ppdb.layout')

@section('title', 'Pengumuman PPDB — ' . ($school_setting->school_name ?: 'MAN 1 Lombok Timur'))

@section('content')
{{-- Hero --}}
<section class="relative pt-20 pb-16 bg-gradient-to-br from-primary via-primary-dark to-accent overflow-hidden">
    <div class="absolute inset-0 opacity-5 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
    <div class="relative z-10 max-w-4xl mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-3">Pengumuman PPDB</h1>
        <p class="text-white/70 text-sm font-medium">Cek hasil seleksi dan pengumuman penting</p>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-3xl mx-auto px-4">
        
        {{-- Search box Section --}}
        @if($school_setting->pengumuman_status)
        <div class="ppdb-card p-6 md:p-8 mb-10">
            <h2 class="text-xl font-bold text-neutral mb-4 text-center">Cek Status Pendaftaran</h2>
            <p class="text-sm text-neutral/50 text-center mb-6">Masukkan NISN atau Nomor Pendaftaran untuk memeriksa status</p>
            
            <form action="{{ route('ppdb.pengumuman') }}" method="GET" class="flex gap-3">
                <input type="text" name="nisn" value="{{ request('nisn') }}" class="ppdb-input flex-1" placeholder="Masukkan NISN atau No. Pendaftaran" required>
                <button type="submit" class="ppdb-btn whitespace-nowrap cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    Cari
                </button>
            </form>

            @if(request('nisn'))
            <div class="mt-6">
                @if($result)
                    <div class="bg-slate-50 border border-slate-200 p-6 rounded-xl text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full mb-4 {{ $result->status == 'accepted' ? 'bg-emerald-100 text-emerald-600' : ($result->status == 'rejected' ? 'bg-red-100 text-red-600' : 'bg-yellow-100 text-yellow-600') }}">
                            @if($result->status == 'accepted')
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            @elseif($result->status == 'rejected')
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            @else
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold text-slate-800 mb-1">{{ $result->full_name }}</h3>
                        <p class="text-sm font-medium text-slate-500 mb-4">{{ $result->registration_number }} - NISN: {{ $result->nisn }}</p>
                        
                        <div class="inline-block px-4 py-2 rounded-lg font-bold text-sm tracking-wide {{ $result->status == 'accepted' ? 'bg-emerald-500 text-white' : ($result->status == 'rejected' ? 'bg-red-500 text-white' : 'bg-yellow-500 text-white') }}">
                            STATUS: {{ strtoupper(collect($result->status_label)->first() ?? $result->status_label) }}
                        </div>
                        
                        @if($result->status == 'accepted')
                        <p class="text-sm text-emerald-600 font-medium mt-4">Selamat! Anda telah diterima sebagai calon peserta didik baru.</p>
                        @elseif($result->status == 'rejected')
                        <p class="text-sm text-red-600 font-medium mt-4">Mohon maaf, Anda belum lulus seleksi.</p>
                        @else
                        <p class="text-sm text-yellow-600 font-medium mt-4">Proses seleksi/verifikasi masih berlangsung. Harap cek kembali secara berkala.</p>
                        @endif
                    </div>
                @else
                    <div class="bg-red-50 border border-red-200 p-6 rounded-xl text-center">
                        <p class="text-red-600 font-medium">Data pendaftar dengan NISN / Nomor Pendaftaran <strong>{{ request('nisn') }}</strong> tidak ditemukan.</p>
                    </div>
                @endif
            </div>
            @endif
        </div>
        @else
        <div class="ppdb-card p-10 mb-10 text-center">
            <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-400">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            </div>
            <h2 class="text-2xl font-black text-slate-800 mb-2">Pengumuman Belum Dibuka</h2>
            <p class="text-slate-500 font-medium max-w-md mx-auto">Hasil seleksi PPDB untuk tahun ini belum diumumkan. Silakan pantau terus informasi terbaru di website kami.</p>
        </div>
        @endif

        {{-- Announcements Timeline --}}
        <div>
            <h2 class="text-2xl font-extrabold text-neutral mb-8 flex items-center gap-3">
                <span class="w-10 h-10 bg-primary-light rounded-xl flex items-center justify-center text-primary text-xl">📢</span>
                Pengumuman Terbaru
            </h2>

            <div class="space-y-6">
                <div class="ppdb-card p-6 border-l-4 border-l-secondary">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-secondary/10 rounded-xl flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-secondary uppercase tracking-wider">Jalur Prestasi</span>
                            <h3 class="text-base font-bold text-neutral mt-1 mb-2">Pendaftaran Jalur Prestasi Telah Dibuka</h3>
                            <p class="text-sm text-neutral/60 leading-relaxed">Pendaftaran Jalur Prestasi MAN 1 Lombok Timur T.A 2026/2027 telah dibuka mulai tanggal 2 Maret 2026. Silakan daftarkan diri Anda melalui formulir online.</p>
                            <p class="text-xs text-neutral/40 mt-3">2 Maret 2026</p>
                        </div>
                    </div>
                </div>

                <div class="ppdb-card p-6 border-l-4 border-l-primary">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-primary uppercase tracking-wider">Jalur Reguler</span>
                            <h3 class="text-base font-bold text-neutral mt-1 mb-2">Jadwal Jalur Reguler</h3>
                            <p class="text-sm text-neutral/60 leading-relaxed">Pendaftaran Jalur Reguler akan dibuka tanggal 4 Mei 2026 s/d 9 Mei 2026. Pastikan mempersiapkan seluruh berkas yang dibutuhkan.</p>
                            <p class="text-xs text-neutral/40 mt-3">1 Maret 2026</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
