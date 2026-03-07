@extends('layouts.base')

@section('title', $program->title . ' — MAN 1 Lombok Timur')

@section('content')
<section class="relative pt-32 pb-20 bg-primary overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cardboard-flat.png')]"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
        <span class="bg-white/20 text-white text-[10px] font-bold uppercase py-1.5 px-4 rounded-full mb-4 inline-block">Program Unggulan</span>
        <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">{{ $program->icon }} {{ $program->title }}</h1>
        <p class="text-white/70 max-w-2xl mx-auto font-medium italic">{{ $program->excerpt }}</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-16 items-start">
            <div class="rounded-3xl overflow-hidden shadow-2xl border-8 border-light group">
                <img src="{{ $program->image ? asset('storage/'.$program->image) : 'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=800' }}" class="w-full h-auto max-h-[500px] object-cover group-hover:scale-105 transition-transform duration-700">
            </div>
            <div>
                <h2 class="text-3xl font-bold text-neutral mb-8">Deskripsi Program</h2>
                <article class="prose-content text-neutral-light leading-relaxed">
                    {!! $program->content !!}
                </article>
                
                <div class="mt-12">
                    <a href="{{ route('kegiatan') }}" class="btn-outline">
                         <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                         Kembali ke Daftar Program
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
