@extends('layouts.base')

@section('title', $ekskul->title . ' — Ekstrakurikuler MAN 1 Lombok Timur')

@section('content')
<section class="relative pt-32 pb-20 bg-primary overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/pinstriped-suit.png')]"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
        <span class="bg-white/20 text-white text-[10px] font-bold uppercase py-1.5 px-4 rounded-full mb-4 inline-block">Ekstrakurikuler</span>
        <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">{{ $ekskul->icon ?: '🏆' }} {{ $ekskul->title }}</h1>
        <p class="text-white/70 max-w-2xl mx-auto font-medium italic">{{ $ekskul->description }}</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl font-bold text-neutral mb-8">Tentang {{ $ekskul->title }}</h2>
                <div class="space-y-4 text-neutral-light leading-relaxed text-base">
                    <p>Kegiatan Ekstrakurikuler {{ $ekskul->title }} di MAN 1 Lombok Timur merupakan salah satu wadah yang disediakan madrasah bagi para siswa untuk mengembangkan minat, bakat, serta potensi diri di luar jam pelajaran sekolah. </p>
                    <p>Melalui kegiatan ini, siswa diharapkan tidak hanya cakap secara kognitif, namun juga memiliki keterampilan khusus (soft skills) seperti kerjasama tim, kedisiplinan, tanggap darurat, dan rasa percaya diri yang tinggi.</p>
                    <p>Latihan rutin diadakan setiap minggu dengan bimbingan pelatih/pembina yang berpengalaman untuk memastikan setiap siswa mendapatkan arahan yang tepat.</p>
                </div>
                
                <div class="mt-10 grid grid-cols-2 gap-6">
                    <div class="p-6 bg-light rounded-2xl border border-border">
                        <p class="text-xs font-bold text-primary uppercase mb-1">Jadwal Latihan</p>
                        <p class="text-neutral font-bold">{{ $ekskul->schedule ?: 'Sabtu, 14.00 - Selesai' }}</p>
                    </div>
                    <div class="p-6 bg-light rounded-2xl border border-border">
                        <p class="text-xs font-bold text-primary uppercase mb-1">Lokasi</p>
                        <p class="text-neutral font-bold">{{ $ekskul->location ?: 'Area Madrasah' }}</p>
                    </div>
                </div>
            </div>
            
            <div class="space-y-6">
                <div class="rounded-3xl overflow-hidden shadow-2xl border-8 border-light h-80">
                    <img src="{{ $ekskul->image ? asset('storage/'.$ekskul->image) : 'https://images.unsplash.com/photo-1543269865-cbf427effbad?q=80&w=800' }}" class="w-full h-full object-cover">
                </div>
                <div class="bg-primary/5 p-8 rounded-3xl border border-primary/10 italic text-neutral-light">
                    "Aktif berorganisasi dan berkegiatan adalah cara terbaik untuk melatih kepemimpinan sejak dini."
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-light">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h3 class="text-2xl font-bold text-neutral mb-4">Tertarik bergabung?</h3>
        <p class="text-neutral-light mb-8">Segera hubungi pembina atau pengurus OSIS bagian sekbid kesiswaan.</p>
        <a href="{{ route('kontak') }}" class="btn-primary">Hubungi Kami</a>
    </div>
</section>
@endsection
