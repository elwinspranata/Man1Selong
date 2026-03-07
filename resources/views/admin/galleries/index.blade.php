@extends('layouts.admin')

@section('title', 'Galeri Sekolah')
@section('page_title', 'Manajemen Galeri')

@section('content')
<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-2xl font-black text-slate-800 tracking-tight">Media & Dokumentasi</h3>
            <p class="text-slate-500 font-medium">Kelola foto dan video kegiatan, fasilitas, dan dokumentasi sekolah lainnya.</p>
        </div>
        <a href="{{ route('admin.galleries.create') }}" class="px-8 py-4 bg-emerald-600 text-white font-black rounded-2xl shadow-lg hover:shadow-emerald-500/20 hover:-translate-y-1 transition-all flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Tambah Media Baru
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

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse($galleries as $gallery)
        <div class="bg-white rounded-[2rem] shadow-sm border border-slate-200 overflow-hidden group hover:border-emerald-500 hover:shadow-xl hover:shadow-emerald-500/5 transition-all duration-500 flex flex-col">
            <div class="relative aspect-video bg-slate-100 overflow-hidden">
                @if($gallery->type === 'image')
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-slate-900 group-hover:bg-slate-800 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white/50 group-hover:text-emerald-400 group-hover:scale-110 transition-all duration-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z" />
                        </svg>
                    </div>
                @endif
                
                <div class="absolute top-4 left-4">
                    @if($gallery->type === 'image')
                        <span class="px-3 py-1.5 bg-white/90 backdrop-blur-md text-slate-700 rounded-xl text-[0.65rem] font-black uppercase tracking-widest flex items-center gap-1.5 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                            </svg>
                            Foto
                        </span>
                    @else
                        <span class="px-3 py-1.5 bg-blue-600/90 backdrop-blur-md text-white rounded-xl text-[0.65rem] font-black uppercase tracking-widest flex items-center gap-1.5 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
                            </svg>
                            Video
                        </span>
                    @endif
                </div>

                <div class="absolute top-4 right-4 flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity translate-y-2 group-hover:translate-y-0 duration-300">
                    <a href="{{ route('admin.galleries.edit', $gallery) }}" class="p-2 bg-white/90 backdrop-blur-md text-slate-600 hover:text-emerald-600 hover:bg-white rounded-xl shadow-sm transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" onsubmit="return confirm('Hapus media ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 bg-white/90 backdrop-blur-md text-slate-600 hover:text-red-600 hover:bg-white rounded-xl shadow-sm transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="p-6 flex-grow flex flex-col">
                <h4 class="text-base font-black text-slate-900 leading-tight mb-2 line-clamp-2" title="{{ $gallery->title }}">{{ $gallery->title }}</h4>
                <p class="text-slate-500 font-medium text-xs leading-relaxed mb-4 line-clamp-2 flex-grow">
                    {{ $gallery->description ?: 'Tidak ada deskripsi.' }}
                </p>
                <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                    <span class="text-[0.65rem] font-bold text-slate-400 capitalize">
                        {{ $gallery->created_at->diffForHumans() }}
                    </span>
                    @if($gallery->is_active)
                        <span class="w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_10px_rgba(16,185,129,0.5)]"></span>
                    @else
                        <span class="w-2 h-2 rounded-full bg-slate-300"></span>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-1 sm:col-span-2 lg:col-span-3 xl:col-span-4 py-20 text-center bg-white rounded-[2.5rem] border border-dashed border-slate-200">
            <div class="flex flex-col items-center gap-4">
                <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <p class="font-bold text-slate-400">Belum ada foto atau video di galeri.</p>
                <a href="{{ route('admin.galleries.create') }}" class="text-emerald-600 font-black text-sm hover:underline">Unggah Sekarang</a>
            </div>
        </div>
        @endforelse
    </div>

    @if($galleries->hasPages())
    <div class="mt-8">
        {{ $galleries->links() }}
    </div>
    @endif
</div>
@endsection
