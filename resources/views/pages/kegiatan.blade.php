@extends('layouts.base')

@section('title', 'Kegiatan & Program — MAN 1 Lombok Timur')

@section('content')
<section class="relative pt-32 pb-16 bg-primary-dark overflow-hidden text-center">
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-white">
        <h1 class="text-4xl font-extrabold mb-2">Program & Kegiatan</h1>
        <p class="text-white/60 max-w-2xl mx-auto">Kami menyediakan berbagai wadah pengembangan minat dan bakat siswa di bidang akademik maupun non-akademik.</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <span class="section-badge mb-4">Program Unggulan</span>
            <h2 class="section-heading text-primary">Kelas Unggulan & Khusus</h2>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            @forelse($programs as $program)
            <a href="{{ route('program.detail', $program->slug) }}" class="p-10 rounded-3xl bg-light hover:bg-white border border-transparent hover:border-primary shadow-sm hover:shadow-xl transition-all group block">
                <span class="text-5xl block mb-6 transition-transform group-hover:scale-110">{{ $program->icon ?: '✨' }}</span>
                <h3 class="text-2xl font-bold text-neutral mb-3">{{ $program->title }}</h3>
                <p class="text-neutral-light leading-relaxed">{{ $program->excerpt }}</p>
            </a>
            @empty
            <p class="text-center text-neutral-light italic col-span-3">Belum ada program unggulan yang ditambahkan.</p>
            @endforelse
        </div>
    </div>
</section>

<section class="py-24 bg-light">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <span class="section-badge mb-4">Ekstrakurikuler</span>
            <h2 class="section-heading">Minggu Kreatif & <span class="text-primary">Olahraga</span></h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($ekskuls as $ekskul)
            <a href="{{ route('kegiatan.ekskul', $ekskul->slug) }}" class="flex items-center gap-4 p-6 bg-white rounded-2xl shadow-sm border border-border group hover:bg-primary transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <span class="text-3xl transition-transform group-hover:scale-110">{{ $ekskul->icon ?: '🏆' }}</span>
                <span class="font-bold text-neutral group-hover:text-white transition-colors">{{ $ekskul->title }}</span>
            </a>
            @empty
            <p class="text-center text-neutral-light italic col-span-4">Belum ada data ekstrakurikuler.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
