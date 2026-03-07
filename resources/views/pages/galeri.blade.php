@extends('layouts.base')

@section('title', 'Galeri — MAN 1 Lombok Timur')

@section('content')
<section class="relative pt-32 pb-16 bg-primary-dark overflow-hidden text-center">
    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <h1 class="text-4xl font-extrabold text-white mb-2">Dokumentasi Sekolah</h1>
        <p class="text-white/60">Melihat momen-momen berharga dalam perjalanan pendidikan di MAN 1 Lombok Timur.</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="columns-1 sm:columns-2 lg:columns-3 xl:columns-4 gap-6 space-y-6">
            @forelse($galleries as $gallery)
            <div class="break-inside-avoid relative rounded-3xl overflow-hidden shadow-md group cursor-pointer border border-border mb-6">
                @if($gallery->type === 'video_url')
                    @php
                        $videoUrl = $gallery->image;
                        $youtubeId = '';
                        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $videoUrl, $match)) {
                            $youtubeId = $match[1];
                        }
                    @endphp
                    @if($youtubeId)
                        <!-- Youtube Video Thumbnail -->
                        <div class="relative w-full aspect-video overflow-hidden">
                            <img src="https://img.youtube.com/vi/{{ $youtubeId }}/maxresdefault.jpg" onerror="this.src='https://img.youtube.com/vi/{{ $youtubeId }}/hqdefault.jpg'" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Video Thumbnail">
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-colors flex items-center justify-center pointer-events-none">
                                <div class="w-16 h-16 bg-white/90 rounded-full flex items-center justify-center backdrop-blur-sm group-hover:scale-110 transition-transform shadow-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-primary ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6 pointer-events-none">
                                <p class="text-white font-bold text-sm tracking-wide">{{ $gallery->title ?: 'Video Kegiatan' }} ✦ {{ $gallery->created_at->format('Y') }}</p>
                            </div>
                            <a href="{{ $videoUrl }}" target="_blank" class="absolute inset-0 z-10"></a>
                        </div>
                    @else
                        <!-- Non-Youtube Video -->
                        <div class="relative w-full aspect-video bg-slate-900 group-hover:bg-slate-800 transition-colors">
                            <a href="{{ $videoUrl }}" target="_blank" class="absolute inset-0 z-10 flex flex-col items-center justify-center text-white/50 group-hover:text-emerald-400 transition-colors">
                                <div class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center backdrop-blur-sm group-hover:bg-white/20 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </a>
                            <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6 pointer-events-none">
                                <p class="text-white font-bold text-sm tracking-wide">{{ $gallery->title ?: 'Video Kegiatan' }} ✦ {{ $gallery->created_at->format('Y') }}</p>
                            </div>
                        </div>
                    @endif
                @else
                    <!-- Photo -->
                    <div class="relative">
                        <img src="{{ $gallery->image ? asset('storage/'.$gallery->image) : 'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=800' }}" class="w-full h-auto group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6 pointer-events-none">
                            <p class="text-white font-bold text-sm tracking-wide">{{ $gallery->title ?: 'Momen Kegiatan' }} ✦ {{ $gallery->created_at->format('Y') }}</p>
                        </div>
                        <!-- Link to full image (optional but good idea if using a lightbox, otherwise just display) -->
                        <a href="{{ $gallery->image ? asset('storage/'.$gallery->image) : 'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=800' }}" target="_blank" class="absolute inset-0 z-10"></a>
                    </div>
                @endif
            </div>
            @empty
            <p class="text-center text-neutral-light italic col-span-4">Belum ada koleksi foto.</p>
            @endforelse
        </div>

        <div class="mt-16">
            {{ $galleries->links() }}
        </div>
    </div>
</section>
@endsection
