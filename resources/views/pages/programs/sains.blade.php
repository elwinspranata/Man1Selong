@extends('layouts.base')

@section('title', 'Program Sains & Robotik — MAN 1 Lombok Timur')

@section('content')
<section class="relative pt-32 pb-20 bg-accent overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/circuit-board.png')]"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
        <span class="bg-white/20 text-white text-[10px] font-bold uppercase py-1.5 px-4 rounded-full mb-4 inline-block">Program Keunggulan</span>
        <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Sains & Robotik</h1>
        <p class="text-white/70 max-w-2xl mx-auto font-medium italic">Eksplorasi teknologi masa depan melalui kreativitas dan logika.</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl font-bold text-neutral mb-8">Inovasi Tanpa Batas</h2>
                <div class="space-y-4 text-neutral-light leading-relaxed">
                    <p>Program Sains & Robotik merupakan wadah bagi para peneliti muda (young researchers) untuk menyalurkan minat mereka di bidang teknologi dan ilmu pengetahuan alam.</p>
                    <p>Fasilitas laboratorium yang lengkap serta bimbingan intensif dari praktisi ahli memungkinkan siswa kami menciptakan inovasi yang telah diakui dan menjuarai berbagai kompetisi robotik tingkat nasional maupun internasional.</p>
                </div>
            </div>
            <div class="rounded-3xl overflow-hidden shadow-2xl border-8 border-light">
                <img src="https://images.unsplash.com/photo-1581093588401-fbb62a02f120?q=80&w=800" class="w-full h-96 object-cover">
            </div>
        </div>
    </div>
</section>
@endsection
