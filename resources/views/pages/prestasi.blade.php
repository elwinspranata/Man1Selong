@extends('layouts.base')

@section('title', 'Prestasi Siswa — MAN 1 Lombok Timur')

@section('content')
<section class="relative pt-32 pb-16 bg-primary-dark overflow-hidden text-center">
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-white">
        <h1 class="text-4xl font-extrabold mb-2">Prestasi & Penghargaan</h1>
        <p class="text-white/60 max-w-2xl mx-auto">Kebanggaan Madrasah atas dedikasi dan kerja keras para siswa yang berhasil menorehkan tinta emas di berbagai ajang.</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($achievements as $achievement)
            <div class="bg-light p-8 rounded-3xl border border-border group hover:bg-white hover:shadow-2xl transition-all duration-500">
                <div class="text-4xl mb-6 group-hover:scale-110 transition-transform inline-block">{{ $achievement->icon ?: '🏆' }}</div>
                <div class="text-xs font-bold text-primary uppercase tracking-widest mb-1">{{ $achievement->rank ?: 'Juara' }}</div>
                <h3 class="text-xl font-bold text-neutral mb-3">{{ $achievement->title }}</h3>
                <p class="text-neutral-light text-sm leading-relaxed mb-4">{{ $achievement->description }}</p>
                <span class="text-[10px] text-neutral-light font-bold uppercase tracking-widest">{{ $achievement->year }}</span>
            </div>
            @empty
            <p class="text-center text-neutral-light italic col-span-3">Belum ada data prestasi yang dicatat.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
