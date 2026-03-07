@extends('layouts.admin')

@section('title', 'Pengaturan PPDB')
@section('page_title', 'Pengaturan PPDB')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h3 class="text-2xl font-black text-slate-800 tracking-tight">Pengaturan PPDB</h3>
        <p class="text-slate-500 font-medium">Aktifkan atau nonaktifkan pendaftaran siswa baru secara sistem.</p>
    </div>

    @if(session('success'))
        <div class="mb-8 p-4 bg-emerald-50 border-l-4 border-emerald-500 rounded-r-2xl text-emerald-800 font-bold flex items-center gap-3 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.ppdb.settings.update') }}" method="POST" class="space-y-8">
        @csrf
        
        <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-slate-200">
            <div class="grid grid-cols-1 gap-8">
                <div class="space-y-4">
                    <label class="text-sm font-bold text-slate-600 ml-1 uppercase tracking-widest">Status Pendaftaran</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <label class="relative flex items-center p-6 border-2 rounded-2xl cursor-pointer transition-all {{ ($settings->ppdb_status ?? 'closed') == 'open' ? 'border-emerald-500 bg-emerald-50/50' : 'border-slate-100 bg-slate-50 hover:border-slate-200' }}">
                            <input type="radio" name="ppdb_status" value="open" class="text-emerald-600 focus:ring-emerald-500" {{ ($settings->ppdb_status ?? 'closed') == 'open' ? 'checked' : '' }}>
                            <div class="ml-4">
                                <span class="block font-black text-slate-800 uppercase tracking-tight">Dibuka</span>
                                <span class="block text-xs font-bold text-slate-400">Siswa dapat mendaftar via website.</span>
                            </div>
                        </label>
                        <label class="relative flex items-center p-6 border-2 rounded-2xl cursor-pointer transition-all {{ ($settings->ppdb_status ?? 'closed') == 'closed' ? 'border-red-500 bg-red-50/50' : 'border-slate-100 bg-slate-50 hover:border-slate-200' }}">
                            <input type="radio" name="ppdb_status" value="closed" class="text-red-600 focus:ring-red-500" {{ ($settings->ppdb_status ?? 'closed') == 'closed' ? 'checked' : '' }}>
                            <div class="ml-4">
                                <span class="block font-black text-slate-800 uppercase tracking-tight">Ditutup</span>
                                <span class="block text-xs font-bold text-slate-400">Pendaftaran tidak tersedia.</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="space-y-2 pt-4">
                    <label class="text-sm font-bold text-slate-600 ml-1">Tahun Pelajaran PPDB</label>
                    <input type="text" name="ppdb_year" value="{{ old('ppdb_year', $settings->ppdb_year ?? date('Y') . '/' . (date('Y')+1)) }}" required
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium"
                        placeholder="Contoh: 2024/2025">
                    <p class="text-[0.65rem] font-bold text-slate-400 ml-1">Tahun pelajaran ini akan ditampilkan di formulir pendaftaran.</p>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" 
                class="px-12 py-5 bg-emerald-600 text-white font-black text-lg rounded-2xl shadow-[0_20px_40px_-10px_rgba(5,150,105,0.4)] hover:shadow-[0_25px_50px_-12px_rgba(5,150,105,0.5)] hover:-translate-y-1 active:translate-y-0 transition-all duration-300 flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
                Perbarui Pengaturan
            </button>
        </div>
    </form>
</div>
@endsection
