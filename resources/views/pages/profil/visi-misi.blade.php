@extends('layouts.base')

@section('title', 'Visi & Misi — MAN 1 Lombok Timur')

@section('content')
<section class="relative pt-32 pb-20 bg-primary-dark overflow-hidden text-center">
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-white">
        <h1 class="text-4xl font-extrabold mb-2">Visi & Misi</h1>
        <p class="text-white/60 max-w-2xl mx-auto italic">Landasan filosofis dan arah perjuangan MAN 1 Lombok Timur dalam dunia pendidikan.</p>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12">
            {{-- Visi --}}
            <div class="bg-light rounded-3xl p-10 border border-border shadow-sm hover:shadow-xl transition-shadow">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-14 h-14 bg-primary text-white rounded-2xl flex items-center justify-center text-2xl shadow-lg">🎯</div>
                    <h2 class="text-3xl font-bold text-neutral">Visi</h2>
                </div>
                <div class="p-8 bg-white rounded-2xl border-l-8 border-primary italic text-xl text-neutral leading-relaxed prose-sm custom-visi">
                    {!! $school_setting->vision ?: '"Terwujudnya Madrasah yang unggul, religius, berprestasi, dan berbasis teknologi dalam mencetak generasi yang beriman, berilmu, dan berakhlak mulia."' !!}
                </div>
            </div>

            {{-- Misi --}}
            <div class="bg-light rounded-3xl p-10 border border-border shadow-sm hover:shadow-xl transition-shadow">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-14 h-14 bg-secondary text-neutral rounded-2xl flex items-center justify-center text-2xl shadow-lg">📜</div>
                    <h2 class="text-3xl font-bold text-neutral">Misi</h2>
                </div>
                <div class="space-y-4 prose-sm custom-misi">
                    {!! $school_setting->mission ?: '<ul><li>Menyelenggarakan pendidikan berkualitas berdasarkan nilai Islam.</li><li>Mengembangkan kurikulum relevan dengan IPTEK.</li><li>Membina prestasi akademik dan non-akademik.</li><li>Mewujudkan lingkungan islami dan kondusif.</li></ul>' !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
