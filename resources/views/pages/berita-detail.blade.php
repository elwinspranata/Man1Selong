@extends('layouts.base')

@section('title', $post->title . ' — MAN 1 Lombok Timur')
@section('description', $post->excerpt ?: Str::limit(strip_tags($post->content), 160))

@section('content')
<section class="relative pt-32 pb-16 bg-primary-dark overflow-hidden">
    {{-- Background --}}
    <div class="absolute inset-0 opacity-10">
        <img src="{{ $post->image ? asset('storage/'.$post->image) : asset('images/hero-bg.png') }}" class="w-full h-full object-cover blur-sm">
    </div>
    
    <div class="relative z-10 max-w-4xl mx-auto px-4 text-center">
        <span class="inline-block bg-secondary text-neutral text-[10px] font-bold uppercase px-4 py-1.5 rounded-full mb-6 shadow-lg">
            {{ $post->category ?: 'Berita' }}
        </span>
        <h1 class="text-3xl md:text-5xl font-extrabold text-white leading-tight mb-6">
            {{ $post->title }}
        </h1>
        <div class="flex items-center justify-center gap-6 text-white/60 text-sm">
            <span class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                {{ $post->created_at->translatedFormat('d F Y') }}
            </span>
            <span class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                Administrator
            </span>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4">
        {{-- Main Image --}}
        @if($post->image)
        <div class="rounded-3xl overflow-hidden shadow-2xl mb-12 -mt-24 relative z-20 border-8 border-white">
            <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" class="w-full h-auto max-h-[500px] object-cover">
        </div>
        @endif

        {{-- Content --}}
        <article class="prose-content text-neutral-light text-lg">
            {!! $post->content !!}
        </article>

        {{-- Footer Detail --}}
        <div class="mt-16 pt-8 border-t border-border flex flex-col sm:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-3">
                <span class="text-sm font-bold text-neutral">Bagikan:</span>
                <div class="flex gap-2">
                    @foreach(['FB', 'WA', 'X'] as $soc)
                    <button class="w-9 h-9 rounded-lg bg-light border border-border flex items-center justify-center text-neutral/50 hover:bg-primary hover:text-white transition-all">
                        <span class="text-[10px] font-black">{{ $soc }}</span>
                    </button>
                    @endforeach
                </div>
            </div>
            <a href="{{ route('berita') }}" class="btn-outline !py-2.5 !px-6 !text-xs">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Berita
            </a>
        </div>
    </div>
</section>
@endsection
