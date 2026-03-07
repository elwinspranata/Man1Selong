@extends('layouts.base')

@section('title', 'Program Tahfidz — MAN 1 Lombok Timur')

@section('content')
<section class="relative pt-32 pb-20 bg-primary overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cardboard-flat.png')]"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
        <span class="bg-white/20 text-white text-[10px] font-bold uppercase py-1.5 px-4 rounded-full mb-4 inline-block">Program Unggulan</span>
        <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Tahfidz Al-Qur'an</h1>
        <p class="text-white/70 max-w-2xl mx-auto font-medium italic">Mencetak generasi rabbani yang hafal Kalamullah dan berakhlaqul karimah.</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="rounded-3xl overflow-hidden shadow-2xl border-8 border-light">
                <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=800" class="w-full h-96 object-cover">
            </div>
            <div>
                <h2 class="text-3xl font-bold text-neutral mb-8">Deskripsi Program</h2>
                <div class="space-y-4 text-neutral-light leading-relaxed">
                    <p>Program Tahfidz Al-Qur'an MAN 1 Lombok Timur dirancang bagi siswa yang memiliki kemauan kuat untuk menghafal Al-Qur'an di sela-sela kesibukan akademik mereka. Kami menggunakan metode yang terukur dan didampingi ustadz/ustadzah yang mumpuni.</p>
                    <p>Target minimal kelulusan dari program ini adalah hafal 3 Juz, namun bagi siswa yang berdedikasi tinggi, madrasah memfasilitasi hingga 30 Juz dengan kurikulum khusus.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
