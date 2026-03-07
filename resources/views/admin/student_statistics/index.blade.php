@extends('layouts.admin')

@section('title', 'Statistik Siswa')
@section('page_title', 'Statistik Siswa')

@section('content')
<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-2xl font-black text-slate-800 tracking-tight">Data Jumlah Siswa</h3>
            <p class="text-slate-500 font-medium">Kelola data statistik jumlah siswa berdasarkan tahun ajaran dan tingkat kelas.</p>
        </div>
        <a href="{{ route('admin.student_statistics.create') }}" class="px-8 py-4 bg-emerald-600 text-white font-black rounded-2xl shadow-lg hover:shadow-emerald-500/20 hover:-translate-y-1 transition-all flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Tambah Data
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

    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-widest">Tahun Ajaran</th>
                        <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-widest">Tingkat Kelas</th>
                        <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-widest text-center">Laki-laki</th>
                        <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-widest text-center">Perempuan</th>
                        <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-widest text-center">Total</th>
                        <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-widest text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($statistics as $stat)
                    <tr class="group hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 bg-slate-100 text-slate-700 rounded-lg text-xs font-black tracking-tight">{{ $stat->academic_year }}</span>
                        </td>
                        <td class="px-8 py-6">
                            <span class="font-bold text-slate-900">{{ $stat->grade_level }}</span>
                        </td>
                        <td class="px-8 py-6 text-center">
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-blue-50 text-blue-600 font-black">
                                {{ $stat->male_count }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-center">
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-pink-50 text-pink-600 font-black">
                                {{ $stat->female_count }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-center">
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 font-black border border-emerald-100 shadow-sm shadow-emerald-500/10">
                                {{ $stat->total_count }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.student_statistics.edit', $stat) }}" class="p-2 text-slate-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.student_statistics.destroy', $stat) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus data statistik ini?')">
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
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                </div>
                                <p class="font-bold text-slate-400">Belum ada statistik jumlah siswa tercatat.</p>
                                <a href="{{ route('admin.student_statistics.create') }}" class="text-emerald-600 font-black text-sm hover:underline">Tambah Data Pertama</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($statistics->hasPages())
        <div class="px-8 py-6 bg-slate-50/50 border-t border-slate-100">
            {{ $statistics->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
