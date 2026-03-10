@extends('layouts.admin')

@section('title', 'Daftar Pendaftar Siswa Baru')
@section('page_title', 'Pendaftar PPDB')

@section('content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h3 class="text-2xl font-black text-slate-800 tracking-tight">Pendaftar Siswa Baru</h3>
            <p class="text-slate-500 font-medium">Kelola dan verifikasi data calon siswa dengan presisi.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.ppdb.registrants.export', ['jalur' => $jalur, 'tahun' => $tahun]) }}" class="px-5 py-2.5 bg-emerald-600 text-white font-bold rounded-xl shadow-[0_10px_20px_-10px_rgba(5,150,105,0.4)] hover:bg-emerald-700 hover:shadow-[0_15px_25px_-12px_rgba(5,150,105,0.5)] transition-all flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Export Excel
            </a>
        </div>
    </div>

    <!-- Quick Stats Bar -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Total Pendaftar</p>
                <h4 class="text-xl font-black text-slate-800">{{ $counts['semua'] }}</h4>
            </div>
        </div>
        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-amber-50 rounded-2xl flex items-center justify-center text-amber-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Menunggu</p>
                <h4 class="text-xl font-black text-slate-800">{{ $counts['pending'] }}</h4>
            </div>
        </div>
        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Terverifikasi</p>
                <h4 class="text-xl font-black text-slate-800">{{ $counts['verified'] }}</h4>
            </div>
        </div>
        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Diterima</p>
                <h4 class="text-xl font-black text-slate-800">{{ $counts['accepted'] }}</h4>
            </div>
        </div>
    </div>

    <!-- Filters & Search -->
    <div class="bg-white p-4 rounded-[2rem] border border-slate-200 shadow-sm">
        <form action="{{ route('admin.ppdb.registrants.index') }}" method="GET" class="flex flex-col lg:flex-row items-center gap-4">
            <input type="hidden" name="jalur" value="{{ $jalur }}">
            
            <div class="relative flex-1 w-full">
                <span class="absolute inset-y-0 left-4 flex items-center text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>
                <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama, NISN, atau nomor pendaftaran..." class="w-full pl-12 pr-4 py-3 bg-slate-50 border-none rounded-2xl text-sm font-bold text-slate-700 focus:ring-2 focus:ring-indigo-500 transition-all outline-none">
            </div>

            <div class="flex items-center gap-4 w-full lg:w-auto">
                <select name="tahun" class="flex-1 lg:w-40 px-4 py-3 bg-slate-50 border-none rounded-2xl text-sm font-bold text-slate-700 focus:ring-2 focus:ring-indigo-500 transition-all outline-none">
                    <option value="">Semua Tahun</option>
                    @foreach($availableYears as $year)
                        <option value="{{ $year }}" {{ $tahun == $year ? 'selected' : '' }}>{{ $year }}</option>
                    @endforeach
                </select>

                <button type="submit" class="px-6 py-3 bg-indigo-600 text-white font-black rounded-2xl shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition-all">
                    Filter
                </button>
            </div>
        </form>
    </div>

    <!-- Tab Navigation -->
    <div class="flex flex-wrap gap-2">
        <a href="{{ route('admin.ppdb.registrants.index', ['tahun' => $tahun, 'search' => $search]) }}" class="px-6 py-3 rounded-2xl font-black text-sm transition-all {{ !$jalur ? 'bg-indigo-600 text-white shadow-xl shadow-indigo-200' : 'bg-white text-slate-500 hover:text-indigo-600 hover:bg-indigo-50 border border-slate-200' }}">
            Semua ({{ $counts['semua'] }})
        </a>
        <a href="{{ route('admin.ppdb.registrants.index', ['jalur' => 'prestasi', 'tahun' => $tahun, 'search' => $search]) }}" class="px-6 py-3 rounded-2xl font-black text-sm transition-all {{ $jalur == 'prestasi' ? 'bg-indigo-600 text-white shadow-xl shadow-indigo-200' : 'bg-white text-slate-500 hover:text-indigo-600 hover:bg-indigo-50 border border-slate-200' }}">
            Jalur Prestasi ({{ $counts['prestasi'] }})
        </a>
        <a href="{{ route('admin.ppdb.registrants.index', ['jalur' => 'reguler', 'tahun' => $tahun, 'search' => $search]) }}" class="px-6 py-3 rounded-2xl font-black text-sm transition-all {{ $jalur == 'reguler' ? 'bg-indigo-600 text-white shadow-xl shadow-indigo-200' : 'bg-white text-slate-500 hover:text-indigo-600 hover:bg-indigo-50 border border-slate-200' }}">
            Jalur Reguler ({{ $counts['reguler'] }})
        </a>
    </div>

    @if(session('success'))
        <div class="p-4 bg-emerald-50 border-l-4 border-emerald-500 rounded-r-2xl text-emerald-800 font-bold flex items-center gap-3 shadow-sm" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <!-- Table Section -->
    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="px-8 py-5 text-[0.65rem] font-black text-slate-400 uppercase tracking-[0.2em]">Pendaftar</th>
                        <th class="px-8 py-5 text-[0.65rem] font-black text-slate-400 uppercase tracking-[0.2em]">Data Akademik</th>
                        <th class="px-8 py-5 text-[0.65rem] font-black text-slate-400 uppercase tracking-[0.2em]">Nilai Akhir</th>
                        <th class="px-8 py-5 text-[0.65rem] font-black text-slate-400 uppercase tracking-[0.2em]">Status</th>
                        <th class="px-8 py-5 text-[0.65rem] font-black text-slate-400 uppercase tracking-[0.2em] text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($registrants as $registrant)
                    <tr class="group hover:bg-slate-50/50 transition-all duration-300">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-slate-100 flex-shrink-0 border-2 border-white shadow-sm overflow-hidden group-hover:scale-105 transition-transform duration-300">
                                    @if($registrant->photo)
                                        <img src="{{ asset('storage/' . $registrant->photo) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center font-black text-slate-400 text-lg uppercase">
                                            {{ substr($registrant->full_name, 0, 1) }}
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <div class="text-xs font-black text-emerald-600 uppercase tracking-widest mb-1">{{ $registrant->registration_number }}</div>
                                    <div class="font-black text-slate-800 tracking-tight group-hover:text-indigo-600 transition-colors">{{ $registrant->full_name }}</div>
                                    <div class="text-[0.65rem] font-bold text-slate-400 uppercase tracking-widest mt-1">NISN: {{ $registrant->nisn ?? '-' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <div class="text-xs font-black text-slate-800 tracking-tight">{{ $registrant->origin_school ?? 'Belum Diisi' }}</div>
                            <div class="inline-flex items-center gap-1 px-2 py-0.5 bg-slate-100 text-[0.65rem] font-black text-slate-500 rounded-md uppercase tracking-widest mt-1">
                                {{ $registrant->jalur }}
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            @php
                                $avg = $registrant->average_grade;
                                $colorClass = $avg >= 85 ? 'text-emerald-600 bg-emerald-50' : ($avg >= 75 ? 'text-blue-600 bg-blue-50' : 'text-slate-600 bg-slate-50');
                            @endphp
                            <div class="flex flex-col gap-1">
                                <span class="px-3 py-1.5 {{ $colorClass }} rounded-xl text-sm font-black tracking-tight inline-flex items-center justify-center w-16 shadow-inner">
                                    {{ number_format($avg, 2) }}
                                </span>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            @php
                                $status = $registrant->status;
                                $statusLabel = match($status) {
                                    'draft' => 'Draft',
                                    'pending' => 'Pending',
                                    'verified' => 'Terverifikasi',
                                    'accepted' => 'Diterima',
                                    'rejected' => 'Ditolak',
                                    default => 'Unknown'
                                };
                                $statusColor = match($status) {
                                    'draft' => 'bg-slate-100 text-slate-600',
                                    'pending' => 'bg-amber-100 text-amber-700',
                                    'verified' => 'bg-blue-100 text-blue-700',
                                    'accepted' => 'bg-emerald-100 text-emerald-700',
                                    'rejected' => 'bg-red-100 text-red-700',
                                    default => 'bg-slate-100 text-slate-600'
                                };
                            @endphp
                            <span class="px-3 py-1 {{ $statusColor }} rounded-lg text-[0.65rem] font-black tracking-[0.2em] uppercase">
                                {{ $statusLabel }}
                            </span>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <div class="flex items-center justify-end gap-1">
                                <a href="{{ route('admin.ppdb.registrants.show', $registrant) }}" class="p-2.5 text-slate-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-all shadow-sm hover:shadow-emerald-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.ppdb.registrants.destroy', $registrant) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus data pendaftar ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2.5 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-xl transition-all shadow-sm hover:shadow-red-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-32 text-center">
                            <div class="flex flex-col items-center gap-6">
                                <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center text-slate-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-xl font-black text-slate-800 tracking-tight">Tidak Ada Pendaftar</p>
                                    <p class="text-slate-400 font-bold">Cobalah menyesuaikan filter atau kata kunci pencarian Anda.</p>
                                </div>
                                <a href="{{ route('admin.ppdb.registrants.index') }}" class="px-6 py-3 bg-slate-800 text-white font-black rounded-2xl hover:bg-slate-900 transition-all">
                                    Reset Semua Filter
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($registrants->hasPages())
        <div class="px-8 py-6 bg-slate-50/50 border-t border-slate-100">
            {{ $registrants->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
