@extends('layouts.admin')

@section('title', 'Dashboard Utama')
@section('page_title', 'Ringkasan Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Stat Cards -->
    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200 group hover:border-emerald-500 transition-all duration-300">
        <div class="flex items-center gap-4">
            <div class="p-3 bg-emerald-50 text-emerald-600 rounded-2xl group-hover:bg-emerald-600 group-hover:text-white transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-widest leading-none mb-1">Total Berita</p>
                <p class="text-2xl font-black text-slate-900">{{ $stats['posts_count'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200 group hover:border-emerald-500 transition-all duration-300">
        <div class="flex items-center gap-4">
            <div class="p-3 bg-blue-50 text-blue-600 rounded-2xl group-hover:bg-blue-600 group-hover:text-white transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-widest leading-none mb-1">Total Guru</p>
                <p class="text-2xl font-black text-slate-900">{{ $stats['teachers_count'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200 group hover:border-emerald-500 transition-all duration-300">
        <div class="flex items-center gap-4">
            <div class="p-3 bg-purple-50 text-purple-600 rounded-2xl group-hover:bg-purple-600 group-hover:text-white transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-widest leading-none mb-1">Agenda</p>
                <p class="text-2xl font-black text-slate-900">{{ $stats['agendas_count'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200 group hover:border-emerald-500 transition-all duration-300">
        <div class="flex items-center gap-4">
            <div class="p-3 bg-orange-50 text-orange-600 rounded-2xl group-hover:bg-orange-600 group-hover:text-white transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-widest leading-none mb-1">Pendaftar PPDB</p>
                <p class="text-2xl font-black text-slate-900">{{ $stats['registrants_count'] }}</p>
            </div>
        </div>
    </div>
</div>

<div class="mt-8">
    <h3 class="text-xl font-black text-slate-800 tracking-tight mb-6 flex items-center gap-3">
        <span class="w-1.5 h-6 bg-emerald-500 rounded-full"></span>
        Statistik Penerimaan Peserta Didik Baru (PPDB)
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Jalur Prestasi -->
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-200 hover:border-emerald-500 transition-all duration-300">
            <div class="flex items-center justify-between mb-8">
                <h4 class="text-lg font-black text-slate-800 flex items-center gap-3">
                    <span class="w-10 h-10 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                    </span>
                    Jalur Prestasi
                </h4>
                <span class="px-4 py-1.5 bg-slate-100 text-slate-700 font-extrabold text-xs tracking-widest uppercase rounded-xl border border-slate-200">Total: {{ $ppdb_stats['prestasi']['total'] }} Pendaftar</span>
            </div>
            <div class="space-y-6">
                <div>
                    <div class="flex justify-between text-sm font-bold mb-2">
                        <span class="text-emerald-600 flex items-center gap-2"><div class="w-2 h-2 rounded-full bg-emerald-500"></div>Diterima</span>
                        <span class="text-emerald-700">{{ $ppdb_stats['prestasi']['accepted'] }} / {{ $ppdb_stats['prestasi']['total'] }}</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-3">
                        <div class="bg-emerald-500 h-3 rounded-full transition-all duration-1000" style="width: {{ $ppdb_stats['prestasi']['total'] > 0 ? ($ppdb_stats['prestasi']['accepted'] / $ppdb_stats['prestasi']['total'] * 100) : 0 }}%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm font-bold mb-2">
                        <span class="text-yellow-600 flex items-center gap-2"><div class="w-2 h-2 rounded-full bg-yellow-400"></div>Proses Validasi</span>
                        <span class="text-yellow-700">{{ $ppdb_stats['prestasi']['process'] }} / {{ $ppdb_stats['prestasi']['total'] }}</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-3">
                        <div class="bg-yellow-400 h-3 rounded-full transition-all duration-1000" style="width: {{ $ppdb_stats['prestasi']['total'] > 0 ? ($ppdb_stats['prestasi']['process'] / $ppdb_stats['prestasi']['total'] * 100) : 0 }}%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm font-bold mb-2">
                        <span class="text-red-500 flex items-center gap-2"><div class="w-2 h-2 rounded-full bg-red-500"></div>Ditolak</span>
                        <span class="text-red-600">{{ $ppdb_stats['prestasi']['rejected'] }} / {{ $ppdb_stats['prestasi']['total'] }}</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-3">
                        <div class="bg-red-500 h-3 rounded-full transition-all duration-1000" style="width: {{ $ppdb_stats['prestasi']['total'] > 0 ? ($ppdb_stats['prestasi']['rejected'] / $ppdb_stats['prestasi']['total'] * 100) : 0 }}%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jalur Reguler -->
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-200 hover:border-emerald-500 transition-all duration-300">
            <div class="flex items-center justify-between mb-8">
                <h4 class="text-lg font-black text-slate-800 flex items-center gap-3">
                    <span class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </span>
                    Jalur Reguler
                </h4>
                <span class="px-4 py-1.5 bg-slate-100 text-slate-700 font-extrabold text-xs tracking-widest uppercase rounded-xl border border-slate-200">Total: {{ $ppdb_stats['reguler']['total'] }} Pendaftar</span>
            </div>
            <div class="space-y-6">
                <div>
                    <div class="flex justify-between text-sm font-bold mb-2">
                        <span class="text-emerald-600 flex items-center gap-2"><div class="w-2 h-2 rounded-full bg-emerald-500"></div>Diterima</span>
                        <span class="text-emerald-700">{{ $ppdb_stats['reguler']['accepted'] }} / {{ $ppdb_stats['reguler']['total'] }}</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-3">
                        <div class="bg-emerald-500 h-3 rounded-full transition-all duration-1000" style="width: {{ $ppdb_stats['reguler']['total'] > 0 ? ($ppdb_stats['reguler']['accepted'] / $ppdb_stats['reguler']['total'] * 100) : 0 }}%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm font-bold mb-2">
                        <span class="text-yellow-600 flex items-center gap-2"><div class="w-2 h-2 rounded-full bg-yellow-400"></div>Proses Validasi</span>
                        <span class="text-yellow-700">{{ $ppdb_stats['reguler']['process'] }} / {{ $ppdb_stats['reguler']['total'] }}</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-3">
                        <div class="bg-yellow-400 h-3 rounded-full transition-all duration-1000" style="width: {{ $ppdb_stats['reguler']['total'] > 0 ? ($ppdb_stats['reguler']['process'] / $ppdb_stats['reguler']['total'] * 100) : 0 }}%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm font-bold mb-2">
                        <span class="text-red-500 flex items-center gap-2"><div class="w-2 h-2 rounded-full bg-red-500"></div>Ditolak</span>
                        <span class="text-red-600">{{ $ppdb_stats['reguler']['rejected'] }} / {{ $ppdb_stats['reguler']['total'] }}</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-3">
                        <div class="bg-red-500 h-3 rounded-full transition-all duration-1000" style="width: {{ $ppdb_stats['reguler']['total'] > 0 ? ($ppdb_stats['reguler']['rejected'] / $ppdb_stats['reguler']['total'] * 100) : 0 }}%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-10 bg-emerald-700 rounded-[2.5rem] p-10 text-white relative overflow-hidden shadow-2xl">
    <div class="relative z-10 w-full lg:w-2/3">
        <h3 class="text-4xl font-black tracking-tighter mb-4">Selamat datang kembali!</h3>
        <p class="text-emerald-100 font-medium text-lg leading-relaxed mb-8">
            Halaman admin ini sedang dalam proses migrasi kustom. Anda sekarang memiliki kontrol penuh atas setiap baris kode di portal ini.
        </p>
        <div class="flex gap-4">
            <div class="px-6 py-3 bg-white text-emerald-800 font-black rounded-2xl shadow-xl transition-all hover:-translate-y-1">
                Pelajari Fitur Kustom
            </div>
        </div>
    </div>
    <div class="absolute right-0 bottom-0 opacity-10 pointer-events-none transform translate-x-1/4 translate-y-1/4">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-96 h-96" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2L1 21h22L12 2zm0 3.83L18.42 19H5.58L12 5.83z" />
        </svg>
    </div>
</div>
@endsection
