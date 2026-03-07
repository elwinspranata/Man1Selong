@extends('layouts.base')

@section('title', 'Bilingual Class — MAN 1 Lombok Timur')

@section('content')
<section class="relative pt-32 pb-20 bg-secondary-dark overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/constellation.png')]"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
        <span class="bg-black/20 text-white text-[10px] font-bold uppercase py-1.5 px-4 rounded-full mb-4 inline-block">Global Perspective</span>
        <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Bilingual Class</h1>
        <p class="text-white/70 max-w-2xl mx-auto font-medium italic">Kuasai dunia dengan kemampuan bahasa internasional yang fasih.</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="rounded-3xl overflow-hidden shadow-2xl border-8 border-light">
                <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?q=80&w=800" class="w-full h-96 object-cover">
            </div>
            <div>
                <h2 class="text-3xl font-bold text-neutral mb-8">Berwawasan Global</h2>
                <div class="space-y-4 text-neutral-light leading-relaxed">
                    <p>Program Bilingual Class difokuskan pada penguasaan aktif dua bahasa asing utama: Bahasa Arab dan Bahasa Inggris. Siswa dalam program ini dibiasakan berkomunikasi menggunakan bahasa target dalam lingkungan madrasah.</p>
                    <p>Selain kurikulum nasional, mereka juga mendapatkan penguatan persiapan beasiswa luar negeri dan sertifikasi bahasa internasional (seperti TOEFL/IELTS).</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
