@extends('layouts.admin')

@section('title', 'Ekstrakurikuler')
@section('page_title', 'Manajemen Ekstrakurikuler')

@section('content')
<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-2xl font-black text-slate-800 tracking-tight">Daftar Ekstrakurikuler</h3>
            <p class="text-slate-500 font-medium">Kelola kegiatan pengembangan diri siswa di luar jam sekolah.</p>
        </div>
        <a href="{{ route('admin.extracurriculars.create') }}" class="px-8 py-4 bg-emerald-600 text-white font-black rounded-2xl shadow-lg hover:shadow-emerald-500/20 hover:-translate-y-1 transition-all flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Tambah Ekskul Baru
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

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        @forelse($extracurriculars as $ekskul)
        <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-slate-200 group hover:border-emerald-500 hover:shadow-xl hover:shadow-emerald-500/5 transition-all duration-500 h-full flex flex-col">
            <div class="flex items-start justify-between mb-6">
                <div class="w-16 h-16 rounded-2xl bg-emerald-50 flex items-center justify-center text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-500 overflow-hidden">
                    @if($ekskul->image)
                        <img src="{{ asset('storage/' . $ekskul->image) }}" class="w-full h-full object-cover">
                    @elseif($ekskul->icon)
                        <i data-lucide="{{ $ekskul->icon }}" class="w-8 h-8"></i>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    @endif
                </div>
                <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <a href="{{ route('admin.extracurriculars.edit', $ekskul) }}" class="p-2 bg-slate-50 text-slate-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <form action="{{ route('admin.extracurriculars.destroy', $ekskul) }}" method="POST" onsubmit="return confirm('Hapus ekstrakurikuler ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 bg-slate-50 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-xl transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="mb-4">
                <h4 class="text-xl font-black text-slate-900 leading-tight mb-2">{{ $ekskul->title }}</h4>
                <div class="flex items-center gap-2">
                    @if($ekskul->is_active)
                        <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 rounded-lg text-[0.65rem] font-black uppercase tracking-widest inline-flex items-center gap-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aktif
                        </span>
                    @else
                        <span class="px-2.5 py-1 bg-slate-100 text-slate-500 rounded-lg text-[0.65rem] font-black uppercase tracking-widest inline-flex items-center gap-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Nonaktif
                        </span>
                    @endif
                </div>
            </div>

            <p class="text-slate-500 font-medium text-sm leading-relaxed mb-6 flex-grow">
                {{ \Illuminate\Support\Str::limit($ekskul->excerpt, 100) }}
            </p>

            <div class="space-y-2 text-xs font-bold text-slate-400 pt-4 border-t border-slate-100">
                @if($ekskul->schedule)
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ $ekskul->schedule }}
                </div>
                @endif
                @if($ekskul->location)
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{ $ekskul->location }}
                </div>
                @endif
            </div>
        </div>
        @empty
        <div class="md:col-span-2 xl:col-span-3 py-20 text-center bg-white rounded-[2.5rem] border border-dashed border-slate-200">
            <div class="flex flex-col items-center gap-4">
                <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <p class="font-bold text-slate-400">Belum ada data ekstrakurikuler.</p>
                <a href="{{ route('admin.extracurriculars.create') }}" class="text-emerald-600 font-black text-sm hover:underline">Tambah Sekarang</a>
            </div>
        </div>
        @endforelse
    </div>

    @if($extracurriculars->hasPages())
    <div class="mt-8">
        {{ $extracurriculars->links() }}
    </div>
    @endif
</div>
@endsection
