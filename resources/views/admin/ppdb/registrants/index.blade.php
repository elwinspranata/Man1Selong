@extends('layouts.admin')

@section('title', 'Daftar Pendaftar Siswa Baru')
@section('page_title', 'Pendaftar PPDB')

@section('content')
<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-2xl font-black text-slate-800 tracking-tight">Pendaftar Siswa Baru</h3>
            <p class="text-slate-500 font-medium">Daftar calon siswa yang telah mendaftar melalui website.</p>
        </div>
        <a href="{{ route('admin.ppdb.registrants.export', ['jalur' => $jalur]) }}" class="px-5 py-2.5 bg-emerald-600 text-white font-bold rounded-xl shadow-[0_10px_20px_-10px_rgba(5,150,105,0.4)] hover:bg-emerald-700 hover:shadow-[0_15px_25px_-12px_rgba(5,150,105,0.5)] transition-all flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Export Excel
        </a>
    </div>

    @if(session('success'))
        <div class="p-4 bg-emerald-50 border-l-4 border-emerald-500 rounded-r-2xl text-emerald-800 font-bold flex items-center gap-3 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-wrap gap-2 mb-2">
        <a href="{{ route('admin.ppdb.registrants.index') }}" class="px-5 py-2.5 rounded-xl font-bold text-sm transition-all {{ !$jalur ? 'bg-indigo-600 text-white shadow-md' : 'bg-white text-slate-500 hover:text-indigo-600 hover:bg-indigo-50 border border-slate-200' }}">
            Semua ({{ $counts['semua'] ?? 0 }})
        </a>
        <a href="{{ route('admin.ppdb.registrants.index', ['jalur' => 'prestasi']) }}" class="px-5 py-2.5 rounded-xl font-bold text-sm transition-all {{ $jalur == 'prestasi' ? 'bg-indigo-600 text-white shadow-md' : 'bg-white text-slate-500 hover:text-indigo-600 hover:bg-indigo-50 border border-slate-200' }}">
            Jalur Prestasi ({{ $counts['prestasi'] ?? 0 }})
        </a>
        <a href="{{ route('admin.ppdb.registrants.index', ['jalur' => 'reguler']) }}" class="px-5 py-2.5 rounded-xl font-bold text-sm transition-all {{ $jalur == 'reguler' ? 'bg-indigo-600 text-white shadow-md' : 'bg-white text-slate-500 hover:text-indigo-600 hover:bg-indigo-50 border border-slate-200' }}">
            Jalur Reguler ({{ $counts['reguler'] ?? 0 }})
        </a>
    </div>

    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-widest">No. Pendaftaran</th>
                        <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-widest">Nama Lengkap</th>
                        <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-widest">Asal Sekolah</th>
                        <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-widest">Rata-rata</th>
                        <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-widest text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($registrants as $registrant)
                    <tr class="group hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 bg-slate-100 text-slate-600 rounded-lg text-xs font-black tracking-tight">{{ $registrant->registration_number }}</span>
                        </td>
                        <td class="px-8 py-6">
                            <span class="font-bold text-slate-900">{{ $registrant->full_name }}</span>
                            <p class="text-xs text-slate-400 mt-1">NISN: {{ $registrant->nisn ?? '-' }}</p>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-sm font-semibold text-slate-600">{{ $registrant->origin_school ?? '-' }}</span>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-sm font-bold text-slate-700">{{ number_format($registrant->average_grade, 2) }}</span>
                        </td>
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 bg-{{ collect($registrant->status_color)->first() ?? $registrant->status_color }}-100 text-{{ collect($registrant->status_color)->first() ?? $registrant->status_color }}-700 rounded-lg text-xs font-black tracking-tight uppercase">
                                {{ collect($registrant->status_label)->first() ?? $registrant->status_label }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.ppdb.registrants.show', $registrant) }}" class="p-2 text-slate-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.ppdb.registrants.destroy', $registrant) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus data pendaftar ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all">
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
                        <td colspan="6" class="px-8 py-20 text-center">
                            <div class="flex flex-col items-center gap-4">
                                <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center text-slate-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <p class="font-bold text-slate-400">Belum ada pendaftar masuk.</p>
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
