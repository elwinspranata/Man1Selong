@extends('layouts.base')

@section('title', 'Profil — MAN 1 Lombok Timur')

@section('content')
{{-- Page Header --}}
<section class="relative pt-32 pb-20 bg-primary-dark overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <img src="{{ asset('images/hero-bg.png') }}" class="w-full h-full object-cover">
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-4xl font-extrabold text-white mb-4">Profil Sekolah</h1>
        <p class="text-white/70 max-w-2xl mx-auto italic">Mengenal lebih dekat lingkungan, visi, misi, dan pimpinan MAN 1 Lombok Timur.</p>
    </div>
</section>

{{-- Content: Tentang Sekolah --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="section-badge mb-4">Tentang Kami</span>
                <h2 class="section-heading mb-6">Sejarah & <span class="text-primary">Eksistensi</span></h2>
                <div class="space-y-4 text-neutral-light leading-relaxed">
                    @if($school_setting->history)
                        {!! $school_setting->history !!}
                    @else
                        <p>Madrasah Aliyah Negeri 1 Lombok Timur (MAN 1 Lombok Timur) adalah lembaga pendidikan menengah berciri khas Islam yang terletak di jantung kota Selong, Lombok Timur. Didirikan dengan semangat untuk mencerdaskan kehidupan bangsa melalui perpaduan Ilmu Pengetahuan dan Teknologi (IPTEK) serta Iman dan Taqwa (IMTAQ).</p>
                        <p>Selama berpuluh-puluh tahun, kami telah mencetak ribuan alumni yang kini berkiprah di berbagai bidang, baik di tingkat lokal, nasional, maupun internasional. Kami terus berinovasi dalam fasilitas dan kurikulum guna menjawab tantangan zaman.</p>
                    @endif
                </div>
            </div>
            <div class="rounded-3xl overflow-hidden shadow-2xl border-8 border-light">
                <img src="{{ $school_setting->profile_image ? asset('storage/'.$school_setting->profile_image) : asset('images/hero-bg.png') }}" class="w-full h-80 object-cover">
            </div>
        </div>
    </div>
</section>

{{-- Content: Visi & Misi --}}
<section class="py-20 bg-light">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12">
            <div class="bg-white p-10 rounded-3xl shadow-sm border border-border">
                <h3 class="text-2xl font-bold text-primary mb-6 flex items-center gap-3">
                    <span class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center text-xl">🎯</span> Visi
                </h3>
                <div class="text-lg text-neutral italic prose-sm">
                    {!! $school_setting->vision ?: '"Terwujudnya Madrasah yang unggul, religius, berprestasi, dan berbasis teknologi dalam mencetak generasi yang beriman, berilmu, dan berakhlak mulia."' !!}
                </div>
            </div>
            <div class="bg-white p-10 rounded-3xl shadow-sm border border-border">
                <h3 class="text-2xl font-bold text-secondary mb-6 flex items-center gap-3">
                    <span class="w-8 h-8 bg-secondary/10 rounded-lg flex items-center justify-center text-xl">📜</span> Misi
                </h3>
                <div class="space-y-4 text-neutral-light prose-sm custom-misi">
                    {!! $school_setting->mission ?: '<ul><li>Menyelenggarakan pendidikan berkualitas berdasarkan nilai Islam.</li><li>Mengembangkan kurikulum relevan dengan IPTEK.</li><li>Membina prestasi akademik dan non-akademik.</li><li>Mewujudkan lingkungan islami dan kondusif.</li></ul>' !!}
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Content: Sambutan --}}
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <div class="mb-10 inline-block p-1 border-4 border-primary rounded-full">
            <img src="{{ $school_setting->principal_photo ? asset('storage/'.$school_setting->principal_photo) : asset('images/kepala-sekolah.png') }}" class="w-40 h-40 rounded-full object-cover">
        </div>
        <div class="text-3xl font-bold text-neutral mb-8 italic prose-xl max-w-none">
            {!! $school_setting->welcome_message ?: '"Pendidikan adalah kunci pembentukan karakter. Kami hadir untuk membimbing setiap siswa menemukan potensi terbaiknya."' !!}
        </div>
        <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
        <p class="font-extrabold text-neutral text-xl">{{ $school_setting->principal_name ?: 'Drs. H. Muhammad Amin, M.Pd.' }}</p>
        <p class="text-neutral-light">Kepala {{ $school_setting->school_name ?: 'MAN 1 Lombok Timur' }}</p>
    </div>
</section>
@endsection
