@extends('layouts.base')

@section('title', 'MAN 1 Lombok Timur — Madrasah Unggul, Religius & Berprestasi')
@section('description', 'Website Resmi MAN 1 Lombok Timur, Lombok Timur. Madrasah berkualitas yang memadukan IPTEK dan IMTAQ.')

@section('content')

{{-- ┌─────────────────────────────────────────────────────┐
     │  1 ·  HERO SECTION                                  │
     └─────────────────────────────────────────────────────┘ --}}
<section class="relative min-h-[90vh] flex items-center overflow-hidden pt-16 group">
    {{-- Background with Ultra-HD Processing --}}
    <div class="absolute inset-0">
        <img src="{{ $school_setting->hero_image ? asset('storage/'.$school_setting->hero_image) : asset('images/hero-bg.png') }}" 
             alt="Kampus MAN 1 Lombok Timur"
             class="w-full h-full object-cover transition-transform duration-[12000ms] ease-out group-hover:scale-110 brightness-[0.88] contrast-[1.12] saturate-[1.1] will-change-transform"
             style="image-rendering: -webkit-optimize-contrast; -webkit-backface-visibility: hidden;">
        
        {{-- Professional Layering --}}
        <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/40 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/20"></div>
        
        {{-- High-End Glow Effects --}}
        <div class="absolute top-1/4 -left-20 w-[600px] h-[600px] rounded-full bg-primary/10 blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-1/4 -right-20 w-[600px] h-[600px] rounded-full bg-secondary/10 blur-[120px] animate-pulse" style="animation-delay: 3s;"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-20">
        <div class="max-w-4xl">
            {{-- Animated Glass Badge --}}
            <div class="inline-flex items-center gap-2 py-2 px-4 rounded-full bg-white/10 backdrop-blur-md border border-white/20 mb-8 animate-fade-in-down">
                <span class="w-2 h-2 rounded-full bg-secondary animate-ping"></span>
                <span class="text-white text-xs font-bold uppercase tracking-[0.2em]">Terakreditasi A — Unggul</span>
            </div>

            {{-- Bold Premium Typography --}}
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black text-white leading-[1.05] mb-6 drop-shadow-2xl tracking-tighter">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-white to-white/70">
                    {{ $school_setting->hero_title ?: 'MAN 1 Lombok Timur' }}
                </span>
            </h1>

            <p class="text-white/90 text-lg sm:text-xl leading-relaxed mb-12 max-w-2xl font-medium drop-shadow-lg">
                {{ $school_setting->hero_subtitle ?: 'Mencetak generasi cerdas, religius, dan berdaya saing global melalui pendidikan berkualitas berbasis iman dan takwa.' }}
            </p>

            {{-- Premium Action Buttons --}}
            <div class="flex flex-wrap gap-5">
                <a href="#profil" class="group/btn relative px-8 py-4 bg-white text-primary font-bold rounded-2xl overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-[0_20px_50px_rgba(255,255,255,0.2)]">
                    <span class="relative z-10 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Eksplorasi Profil
                    </span>
                </a>
                <a href="/ppdb" class="group/btn relative px-8 py-4 bg-secondary text-white font-bold rounded-2xl overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-[0_20px_50px_rgba(212,160,23,0.3)]">
                    <span class="relative z-10 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        Daftar PPDB 2026
                    </span>
                    <div class="absolute inset-0 bg-white/20 translate-y-full transition-transform duration-300 group-hover/btn:translate-y-0"></div>
                </a>
            </div>
        </div>
    </div>
</section>


{{-- ┌─────────────────────────────────────────────────────┐
     │  NEWS TICKER                                        │
     └─────────────────────────────────────────────────────┘ --}}
<div class="bg-secondary py-2.5 overflow-hidden">
    <div class="flex items-center max-w-7xl mx-auto px-4">
        <span class="flex-shrink-0 bg-primary text-white text-[11px] font-bold uppercase tracking-widest px-4 py-1.5 rounded-md mr-5 flex items-center gap-1.5">
            📢 Info
        </span>
        <div class="overflow-hidden flex-1">
            <div class="animate-scroll flex whitespace-nowrap gap-20 text-sm font-semibold text-neutral">
                @foreach($agendas as $agenda)
                <span>📅 {{ $agenda->title }} — {{ \Carbon\Carbon::parse($agenda->event_date)->format('d M Y') }}</span>
                @endforeach
                @if($agendas->isEmpty())
                <span>Selamat Datang di MAN 1 Lombok Timur — Madrasah Unggul & Berprestasi</span>
                @endif
            </div>
        </div>
    </div>
</div>


{{-- ┌─────────────────────────────────────────────────────┐
     │  2 ·  PROFIL SINGKAT                                │
     └─────────────────────────────────────────────────────┘ --}}
<section id="profil" class="py-24 bg-white scroll-mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="section-badge mb-4">Tentang Kami</span>
            <h2 class="section-heading">Mengenal <span class="text-primary">MAN 1 Lombok Timur</span></h2>
            <div class="w-14 h-1 bg-primary rounded-full mx-auto mt-5"></div>
        </div>

        <div class="grid lg:grid-cols-2 gap-14 items-center">
            {{-- Text --}}
            <div>
                <div class="text-neutral-light text-base leading-[1.9] mb-8">
                    @if($school_setting->history)
                        {!! Str::limit(strip_tags($school_setting->history), 350) !!}
                    @else
                        <strong class="text-neutral">Madrasah Aliyah Negeri 1 Lombok Timur</strong> merupakan lembaga pendidikan menengah atas di bawah Kementerian Agama Kabupaten Lombok Timur, Nusa Tenggara Barat. Dengan komitmen kuat pada keunggulan akademik dan pembentukan karakter islami, kami siap mengantarkan siswa meraih cita‑cita tertinggi.
                    @endif
                </div>
                <div class="grid sm:grid-cols-2 gap-5">
                    @foreach([
                        ['🕌', 'Pendidikan Islami', 'Integrasi nilai-nilai Al-Qur\'an dalam setiap aspek pembelajaran.'],
                        ['🎓', 'Akademik Unggul', 'Kurikulum berstandar nasional dengan pengayaan STEM & literasi.'],
                        ['💡', 'Berbasis Teknologi', 'Fasilitas digital modern mendukung pembelajaran abad 21.'],
                        ['🤝', 'Karakter Mulia', 'Membina akhlakul karimah melalui pembiasaan dan keteladanan.'],
                    ] as [$icon, $title, $desc])
                    <div class="p-5 rounded-xl border border-border bg-light/50 hover:shadow-md transition-all duration-300 group">
                        <span class="text-2xl block mb-2">{{ $icon }}</span>
                        <h4 class="font-bold text-sm text-neutral mb-1 group-hover:text-primary transition-colors">{{ $title }}</h4>
                        <p class="text-neutral-light text-xs leading-relaxed">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Image with Ultra-HD Processing System --}}
            <div class="relative lg:pl-10 group/img">
                {{-- Decorative frames --}}
                <div class="absolute inset-0 bg-primary/10 rounded-3xl -rotate-6 scale-95 blur-sm transition-transform duration-700 group-hover/img:-rotate-3"></div>
                
                <div class="relative rounded-2xl overflow-hidden shadow-[0_30px_60px_-15px_rgba(0,0,0,0.4)] border-[6px] border-white ring-1 ring-black/5">
                    {{-- The Master HD Image --}}
                    <img src="{{ ($school_setting->profile_image ? asset('storage/'.$school_setting->profile_image) : ($school_setting->hero_image ? asset('storage/'.$school_setting->hero_image) : asset('images/hero-bg.png'))) . '?v=' . time() }}" 
                         alt="Gedung MAN 1 Lombok Timur"
                         class="w-full h-[480px] object-cover transition-all duration-1000 group-hover/img:scale-105 brightness-[1.05] contrast-[1.18] saturate-[1.12]"
                         style="image-rendering: -webkit-optimize-contrast; image-rendering: crisp-edges; filter: contrast(1.1) brightness(1.05) saturate(1.1) drop-shadow(0 0 1px rgba(0,0,0,0.2));">
                    
                    {{-- HD Texture Overlay (Masks blurriness) --}}
                    <div class="absolute inset-0 opacity-[0.03] pointer-events-none bg-[url('https://www.transparenttextures.com/patterns/stardust.png')]"></div>
                    
                    {{-- Gradient polish --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-60"></div>
                </div>

                {{-- Floating Experience Badge --}}
                <div class="absolute -bottom-8 -left-2 bg-gradient-to-br from-primary-dark via-primary to-primary-light text-white rounded-2xl p-6 shadow-2xl border border-white/20 transform hover:-translate-y-2 transition-all duration-500">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-white/10 backdrop-blur-md rounded-full flex items-center justify-center text-3xl shadow-inner italic font-serif">A</div>
                        <div>
                            <div class="text-3xl font-black leading-none tracking-tighter">30+</div>
                            <div class="text-[10px] uppercase font-bold tracking-[0.2em] text-white/80 mt-1">Tahun Mengabdi</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ┌─────────────────────────────────────────────────────┐
     │  VISI & MISI                                        │
     └─────────────────────────────────────────────────────┘ --}}
<section id="visi-misi" class="py-24 bg-light scroll-mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="section-badge mb-4">Visi & Misi</span>
            <h2 class="section-heading">Visi & <span class="text-primary">Misi</span></h2>
            <div class="w-14 h-1 bg-primary rounded-full mx-auto mt-5"></div>
        </div>

        <div class="grid lg:grid-cols-2 gap-10">
            {{-- Visi --}}
            <div class="bg-white rounded-2xl p-8 border border-border shadow-md hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-primary text-white rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-neutral">Visi</h3>
                </div>
                <div class="text-neutral-light leading-[1.9] text-base italic prose-content">
                    {!! $school_setting->vision ?: '"Terwujudnya Madrasah yang unggul, religius, berprestasi, dan berbasis teknologi dalam mencetak generasi yang beriman, berilmu, dan berakhlak mulia."' !!}
                </div>
            </div>

            {{-- Misi --}}
            <div class="bg-white rounded-2xl p-8 border border-border shadow-md hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-secondary text-neutral rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-neutral">Misi</h3>
                </div>
                <div class="text-neutral-light leading-[1.9] text-base prose-content custom-misi">
                    {!! $school_setting->mission ?: '<ul><li>Menyelenggarakan pendidikan berkualitas berdasarkan nilai Islam.</li><li>Mengembangkan kurikulum relevan dengan IPTEK.</li><li>Membina prestasi akademik dan non-akademik.</li><li>Mewujudkan lingkungan islami dan kondusif.</li></ul>' !!}
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ┌─────────────────────────────────────────────────────┐
     │  3 ·  STATISTIK                                     │
     └─────────────────────────────────────────────────────┘ --}}
<section id="statistik" class="py-20 bg-white scroll-mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">
            @forelse($stats as $stat)
            <div class="bg-white rounded-2xl border border-border p-7 text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                <div class="w-14 h-14 bg-primary-light text-primary rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $stat->icon }}"/>
                    </svg>
                </div>
                <div class="text-3xl font-extrabold text-primary mb-1">{{ $stat->value }}</div>
                <div class="text-neutral-light text-xs font-semibold tracking-wide uppercase">{{ $stat->label }}</div>
            </div>
            @empty
            {{-- Fallback or empty --}}
            @endforelse
        </div>
    </div>
</section>


{{-- ┌─────────────────────────────────────────────────────┐
     │  4 ·  SAMBUTAN KEPALA MADRASAH                      │
     └─────────────────────────────────────────────────────┘ --}}
<section id="sambutan" class="py-24 bg-white scroll-mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-5 gap-14 items-center">
            {{-- Photo column --}}
            <div class="lg:col-span-2 flex justify-center">
                <div class="relative">
                    <div class="w-64 h-80 rounded-2xl overflow-hidden shadow-xl border-4 border-white ring-1 ring-border">
                        <img src="{{ $school_setting->principal_photo ? asset('storage/'.$school_setting->principal_photo) : asset('images/kepala-sekolah.png') }}" alt="Kepala Madrasah"
                             class="w-full h-full object-cover">
                    </div>
                    <div class="absolute -bottom-4 left-1/2 -translate-x-1/2 bg-primary text-white px-5 py-2 rounded-full text-xs font-bold shadow-lg whitespace-nowrap">
                        Kepala Madrasah
                    </div>
                </div>
            </div>

            {{-- Text column --}}
            <div class="lg:col-span-3">
                <span class="section-badge mb-4">Sambutan</span>
                <h2 class="section-heading !text-left mb-6">Sambutan <span class="text-primary">Kepala Madrasah</span></h2>
                <blockquote class="border-l-4 border-primary pl-5 mb-6">
                    <div class="text-neutral-light text-base leading-[1.9] italic prose-content">
                        {!! $school_setting->welcome_message ?: '"Pendidikan bukanlah semata-mata tentang ilmu pengetahuan..."' !!}
                    </div>
                </blockquote>
                <p class="text-neutral-light text-sm leading-relaxed mb-6">
                    Dengan dukungan tenaga pengajar yang profesional, kurikulum yang relevan, serta lingkungan yang kondusif, kami yakin seluruh potensi peserta didik dapat berkembang secara optimal. Mari bersama-sama kita wujudkan generasi terbaik untuk masa depan bangsa.
                </p>
                <div>
                    <p class="font-bold text-neutral">{{ $school_setting->principal_name ?: 'Drs. H. Muhammad Amin, M.Pd.' }}</p>
                    <p class="text-neutral-light text-sm">Kepala MAN 1 Lombok Timur</p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ┌─────────────────────────────────────────────────────┐
     │  5 ·  PROGRAM UNGGULAN                              │
     └─────────────────────────────────────────────────────┘ --}}
<section id="program" class="py-24 bg-light scroll-mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="section-badge mb-4">Keunggulan</span>
            <h2 class="section-heading">Program <span class="text-primary">Unggulan</span></h2>
            <p class="section-desc mt-4">Berbagai program yang dirancang untuk mengembangkan potensi siswa secara holistik.</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($programs as $program)
            <a href="{{ route('program.detail', $program->slug) }}" class="bg-white rounded-2xl p-7 border border-border hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                <span class="text-3xl block mb-4">{{ $program->icon ?: '✨' }}</span>
                <h4 class="font-bold text-neutral mb-2 group-hover:text-primary transition-colors">{{ $program->title }}</h4>
                <p class="text-neutral-light text-sm leading-relaxed">{{ $program->excerpt }}</p>
            </a>
            @empty
            <p class="text-center text-neutral-light italic col-span-3">Belum ada program unggulan.</p>
            @endforelse
        </div>
    </div>
</section>


{{-- ┌─────────────────────────────────────────────────────┐
     │  6 ·  BERITA TERBARU                                │
     └─────────────────────────────────────────────────────┘ --}}
<section id="berita" class="py-24 bg-white scroll-mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-14">
            <div>
                <span class="section-badge mb-4">Kabar Terbaru</span>
                <h2 class="section-heading !text-left">Berita & <span class="text-primary">Informasi</span></h2>
            </div>
            <a href="{{ route('berita') }}" class="btn-outline !py-2.5 !px-5 !text-xs self-start sm:self-auto">
                Semua Berita
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-7">
            @forelse($posts as $post)
            <article class="bg-white rounded-2xl border border-border overflow-hidden group hover:shadow-xl transition-all duration-300">
                <div class="h-52 overflow-hidden relative">
                    <span class="absolute top-3 left-3 z-10 bg-primary text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-md">{{ $post->category ?: 'Berita' }}</span>
                    <img src="{{ $post->image ? asset('storage/'.$post->image) : 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=800' }}" alt="{{ $post->title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-6">
                    <time class="text-xs text-neutral-light font-medium flex items-center gap-1.5 mb-3">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        {{ $post->created_at->format('d M Y') }}
                    </time>
                    <h3 class="font-bold text-neutral leading-snug mb-2 group-hover:text-primary transition-colors line-clamp-2">{{ $post->title }}</h3>
                    <p class="text-neutral-light text-sm leading-relaxed line-clamp-3 mb-4">{{ $post->excerpt ?: Str::limit(strip_tags($post->content), 100) }}</p>
                    <a href="{{ route('berita') }}" class="inline-flex items-center gap-1 text-primary text-sm font-semibold hover:gap-2 transition-all">
                        Baca selengkapnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </article>
            @empty
            <p class="text-center text-neutral-light italic col-span-3">Belum ada berita terbaru.</p>
            @endforelse
        </div>
    </div>
</section>


{{-- ┌─────────────────────────────────────────────────────┐
     │  7 ·  GALERI                                        │
     └─────────────────────────────────────────────────────┘ --}}
<section id="galeri" class="py-24 bg-light scroll-mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="section-badge mb-4">Dokumentasi</span>
            <h2 class="section-heading">Galeri <span class="text-primary">Kegiatan</span></h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse($galleries as $gallery)
            <div class="rounded-xl overflow-hidden group cursor-pointer aspect-[4/3]">
                <img src="{{ $gallery->image ? asset('storage/'.$gallery->image) : 'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=600' }}" alt="{{ $gallery->title ?: 'Galeri MAN 1 Lombok Timur' }}"
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
            </div>
            @empty
            <p class="text-center text-neutral-light italic col-span-4">Belum ada dokumentasi.</p>
            @endforelse
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('galeri') }}" class="btn-outline !py-2.5 !px-6 !text-xs">Lihat Semua Galeri</a>
        </div>
    </div>
</section>


{{-- ┌─────────────────────────────────────────────────────┐
     │  8 ·  KONTAK & PETA                                 │
     └─────────────────────────────────────────────────────┘ --}}
<section id="kontak" class="py-24 bg-white scroll-mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="section-badge mb-4">Lokasi</span>
            <h2 class="section-heading">Hubungi <span class="text-primary">Kami</span></h2>
        </div>

        <div class="grid lg:grid-cols-5 gap-8">
            {{-- Map --}}
            <div class="lg:col-span-3 rounded-2xl overflow-hidden shadow-md border border-border h-[400px]">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3942.8!2d116.6!3d-8.65!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOMKwMzknMDAuMCJTIDExNsKwMzYnMDAuMCJF!5e0!3m2!1sid!2sid!4v1600000000000"
                    width="100%" height="100%" style="border:0;" allowfullscreen loading="lazy"
                    class="w-full h-full"></iframe>
            </div>

            {{-- Contact card --}}
            <div class="lg:col-span-2 bg-white rounded-2xl border border-border p-8 shadow-md flex flex-col justify-between">
                <div>
                    <h3 class="text-xl font-bold text-neutral mb-6">Informasi Kontak</h3>
                    <div class="space-y-5">
                        @foreach([
                             ['M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z|M15 11a3 3 0 11-6 0 3 3 0 016 0z', 'Alamat', 'Jl. Pejanggik No. 123, Selong, Lombok Timur, NTB 83611'],
                             ['M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z', 'Telepon', '(0376) 21234'],
                             ['M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'Email', 'info@man1lomboktimur.sch.id'],
                             ['M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'Jam Operasional', 'Senin – Sabtu · 07:00 – 15:00 WITA'],
                        ] as [$paths, $label, $value])
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-primary-light text-primary rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    @foreach(explode('|', $paths) as $d)
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $d }}"/>
                                    @endforeach
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-neutral uppercase tracking-wide">{{ $label }}</p>
                                <p class="text-neutral-light text-sm mt-0.5">{{ $value }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <a href="https://www.google.com/maps/search/MAN+1+Lombok+Timur" target="_blank" rel="noopener" class="btn-primary w-full mt-8 justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                    Petunjuk Arah
                </a>
            </div>
        </div>
    </div>
</section>


{{-- ┌─────────────────────────────────────────────────────┐
     │  CTA / PPDB                                         │
     └─────────────────────────────────────────────────────┘ --}}
<section id="ppdb" class="relative py-20 bg-primary overflow-hidden scroll-mt-20">
    <div class="absolute -top-24 -right-24 w-80 h-80 bg-white/5 rounded-full"></div>
    <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-secondary/10 rounded-full"></div>

    <div class="relative z-10 max-w-3xl mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4 leading-tight">
            Siap Bergabung Bersama Kami?
        </h2>
        <p class="text-white/70 text-base md:text-lg mb-10 max-w-xl mx-auto">
            Pendaftaran Peserta Didik Baru (PPDB) MAN 1 Lombok Timur tahun ajaran 2026/2027 telah dibuka. Daftarkan diri Anda sekarang!
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('ppdb') }}" class="btn-gold !py-3.5 !px-10">Daftar Sekarang</a>
            <a href="{{ route('ppdb') }}" class="bg-transparent border-2 border-white/30 text-white px-10 py-3.5 rounded-xl font-semibold text-sm hover:bg-white/10 transition cursor-pointer inline-flex items-center gap-2">
                Info PPDB
            </a>
        </div>
    </div>
</section>

@endsection
