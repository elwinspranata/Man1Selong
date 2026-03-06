@extends('layouts.base')

@section('title', 'MAN 1 Selong — Madrasah Unggul, Religius & Berprestasi')
@section('description', 'Website Resmi MAN 1 Selong, Lombok Timur. Madrasah berkualitas yang memadukan IPTEK dan IMTAQ.')

@section('content')

{{-- ┌─────────────────────────────────────────────────────┐
     │  1 ·  HERO SECTION                                  │
     └─────────────────────────────────────────────────────┘ --}}
<section class="relative min-h-[88vh] flex items-center overflow-hidden pt-16">
    {{-- Background --}}
    <div class="absolute inset-0">
        <img src="{{ asset('images/hero-bg.png') }}" alt="Kampus MAN 1 Selong"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-primary-dark/85 via-primary/70 to-accent/80"></div>
        {{-- Decorative circles --}}
        <div class="absolute -top-32 -right-32 w-[500px] h-[500px] rounded-full bg-white/5"></div>
        <div class="absolute -bottom-40 -left-40 w-[400px] h-[400px] rounded-full bg-secondary/10"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-20">
        <div class="max-w-3xl">
            <span class="section-badge !bg-white/15 !text-white mb-6 backdrop-blur-sm border border-white/20">
                ✦ Terakreditasi A — Kemenag Lombok Timur
            </span>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-[1.1] mb-6">
                Selamat Datang di<br>
                <span class="text-secondary">MAN 1 Selong</span>
            </h1>
            <p class="text-white/80 text-lg sm:text-xl leading-relaxed mb-10 max-w-xl">
                Madrasah unggul, religius, berprestasi, dan berbasis teknologi — mencetak generasi yang beriman, berilmu, dan berakhlak mulia.
            </p>
            <div class="flex flex-wrap gap-3">
                <a href="#profil" class="btn-white !py-3.5 !px-8 !text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Lihat Profil
                </a>
                <a href="#berita" class="btn-gold !py-3.5 !px-8 !text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    Berita Terbaru
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
                <span>Pendaftaran Peserta Didik Baru (PPDB) TA 2026/2027 telah dibuka!</span>
                <span>🏆 Tim Robotik MAN 1 Selong meraih Juara 1 Nasional 2026</span>
                <span>Ujian Akhir Madrasah dilaksanakan 15 — 25 Maret 2026</span>
                <span>Pendaftaran Peserta Didik Baru (PPDB) TA 2026/2027 telah dibuka!</span>
                <span>🏆 Tim Robotik MAN 1 Selong meraih Juara 1 Nasional 2026</span>
                <span>Ujian Akhir Madrasah dilaksanakan 15 — 25 Maret 2026</span>
            </div>
        </div>
    </div>
</div>


{{-- ┌─────────────────────────────────────────────────────┐
     │  2 ·  PROFIL SINGKAT                                │
     └─────────────────────────────────────────────────────┘ --}}
<section id="profil" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="section-badge mb-4">Tentang Kami</span>
            <h2 class="section-heading">Mengenal <span class="text-primary">MAN 1 Selong</span></h2>
            <div class="w-14 h-1 bg-primary rounded-full mx-auto mt-5"></div>
        </div>

        <div class="grid lg:grid-cols-2 gap-14 items-center">
            {{-- Text --}}
            <div>
                <p class="text-neutral-light text-base leading-[1.9] mb-8">
                    <strong class="text-neutral">Madrasah Aliyah Negeri 1 Selong</strong> merupakan lembaga pendidikan menengah atas di bawah Kementerian Agama Kabupaten Lombok Timur, Nusa Tenggara Barat. Dengan komitmen kuat pada keunggulan akademik dan pembentukan karakter islami, kami siap mengantarkan siswa meraih cita‑cita tertinggi.
                </p>
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

            {{-- Image --}}
            <div class="relative">
                <div class="rounded-2xl overflow-hidden shadow-2xl">
                    <img src="{{ asset('images/hero-bg.png') }}" alt="Gedung MAN 1 Selong"
                         class="w-full h-[400px] object-cover">
                </div>
                {{-- Floating stat badge --}}
                <div class="absolute -bottom-6 -left-6 bg-primary text-white rounded-2xl p-5 shadow-xl hidden sm:block">
                    <div class="text-3xl font-extrabold leading-none">30+</div>
                    <div class="text-xs text-white/70 mt-1">Tahun Mengabdi</div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ┌─────────────────────────────────────────────────────┐
     │  3 ·  STATISTIK                                     │
     └─────────────────────────────────────────────────────┘ --}}
<section class="py-20 bg-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach([
                ['1200+', 'Siswa Aktif',      'M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z'],
                ['85+',   'Tenaga Pendidik',  'M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5'],
                ['A',     'Akreditasi',       'M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M18.75 4.236c.982.143 1.954.317 2.916.52A6.003 6.003 0 0016.27 9.728M18.75 4.236V4.5c0 2.108-.966 3.99-2.48 5.228m0 0a6.003 6.003 0 01-2.77.978m-2.77.978a6.004 6.004 0 01-2.77-.978M12 17.25h.008v.008H12v-.008z'],
                ['50+',   'Prestasi',         'M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z'],
            ] as [$num, $label, $path])
            <div class="bg-white rounded-2xl border border-border p-7 text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                <div class="w-14 h-14 bg-primary-light text-primary rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}"/>
                    </svg>
                </div>
                <div class="text-3xl font-extrabold text-primary mb-1">{{ $num }}</div>
                <div class="text-neutral-light text-xs font-semibold tracking-wide uppercase">{{ $label }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ┌─────────────────────────────────────────────────────┐
     │  4 ·  SAMBUTAN KEPALA MADRASAH                      │
     └─────────────────────────────────────────────────────┘ --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-5 gap-14 items-center">
            {{-- Photo column --}}
            <div class="lg:col-span-2 flex justify-center">
                <div class="relative">
                    <div class="w-64 h-80 rounded-2xl overflow-hidden shadow-xl border-4 border-white ring-1 ring-border">
                        <img src="{{ asset('images/kepala-sekolah.png') }}" alt="Kepala Madrasah"
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
                    <p class="text-neutral-light text-base leading-[1.9] italic">
                        "Pendidikan bukanlah semata-mata tentang ilmu pengetahuan, tetapi juga tentang pembentukan karakter dan kepribadian yang mulia. Di MAN 1 Selong, kami berkomitmen untuk mendidik generasi yang tidak hanya cerdas secara intelektual, tetapi juga kuat dalam iman dan taqwa."
                    </p>
                </blockquote>
                <p class="text-neutral-light text-sm leading-relaxed mb-6">
                    Dengan dukungan tenaga pengajar yang profesional, kurikulum yang relevan, serta lingkungan yang kondusif, kami yakin seluruh potensi peserta didik dapat berkembang secara optimal. Mari bersama-sama kita wujudkan generasi terbaik untuk masa depan bangsa.
                </p>
                <div>
                    <p class="font-bold text-neutral">Drs. H. Muhammad Amin, M.Pd.</p>
                    <p class="text-neutral-light text-sm">Kepala MAN 1 Selong</p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ┌─────────────────────────────────────────────────────┐
     │  5 ·  PROGRAM UNGGULAN                              │
     └─────────────────────────────────────────────────────┘ --}}
<section class="py-24 bg-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="section-badge mb-4">Keunggulan</span>
            <h2 class="section-heading">Program <span class="text-primary">Unggulan</span></h2>
            <p class="section-desc mt-4">Berbagai program yang dirancang untuk mengembangkan potensi siswa secara holistik.</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach([
                ['📖', 'Tahfidz Al-Qur\'an', 'Program menghafal Al-Qur\'an dengan metode modern dan bimbingan ustadz berpengalaman.'],
                ['🔬', 'Laboratorium Sains', 'Fasilitas lab IPA yang lengkap untuk mendukung pembelajaran sains yang interaktif.'],
                ['💻', 'Kelas Digital', 'Pembelajaran berbasis teknologi dengan smart classroom dan e-learning terpadu.'],
                ['⚽', 'Olahraga Berprestasi', 'Program pembinaan atlet muda di berbagai cabang olahraga kompetitif.'],
                ['🎭', 'Seni & Budaya', 'Wadah ekspresi kreativitas siswa melalui kesenian islami dan budaya lokal.'],
                ['🌏', 'English Club', 'Program peningkatan kemampuan bahasa Inggris aktif untuk menghadapi era global.'],
            ] as [$icon, $title, $desc])
            <div class="bg-white rounded-2xl p-7 border border-border hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                <span class="text-3xl block mb-4">{{ $icon }}</span>
                <h4 class="font-bold text-neutral mb-2 group-hover:text-primary transition-colors">{{ $title }}</h4>
                <p class="text-neutral-light text-sm leading-relaxed">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ┌─────────────────────────────────────────────────────┐
     │  6 ·  BERITA TERBARU                                │
     └─────────────────────────────────────────────────────┘ --}}
<section id="berita" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-14">
            <div>
                <span class="section-badge mb-4">Kabar Terbaru</span>
                <h2 class="section-heading !text-left">Berita & <span class="text-primary">Informasi</span></h2>
            </div>
            <a href="#" class="btn-outline !py-2.5 !px-5 !text-xs self-start sm:self-auto">
                Semua Berita
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-7">
            @foreach([
                ['Pendidikan', '06 Mar 2026', 'Digitalisasi Pembelajaran di Era Society 5.0', 'Langkah inovatif MAN 1 Selong mengintegrasikan teknologi terkini dalam proses belajar mengajar sehari-hari.', 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=800'],
                ['Prestasi', '04 Mar 2026', 'Juara Umum Kompetisi Sains Madrasah NTB', 'Siswa-siswi MAN 1 Selong kembali menorehkan prestasi membanggakan di ajang KSM tingkat provinsi.', 'https://images.unsplash.com/photo-1543269865-cbf427effbad?q=80&w=800'],
                ['Kegiatan', '01 Mar 2026', 'Latihan Dasar Kepemimpinan OSIS 2026', 'Membangun jiwa kepemimpinan yang berintegritas dan siap melayani menjadi fokus utama kegiatan LDK.', 'https://images.unsplash.com/photo-1491438590914-bc09fcaaf77a?q=80&w=800'],
            ] as [$cat, $date, $title, $desc, $img])
            <article class="bg-white rounded-2xl border border-border overflow-hidden group hover:shadow-xl transition-all duration-300">
                <div class="h-52 overflow-hidden relative">
                    <span class="absolute top-3 left-3 z-10 bg-primary text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-md">{{ $cat }}</span>
                    <img src="{{ $img }}" alt="{{ $title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-6">
                    <time class="text-xs text-neutral-light font-medium flex items-center gap-1.5 mb-3">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        {{ $date }}
                    </time>
                    <h3 class="font-bold text-neutral leading-snug mb-2 group-hover:text-primary transition-colors line-clamp-2">{{ $title }}</h3>
                    <p class="text-neutral-light text-sm leading-relaxed line-clamp-3 mb-4">{{ $desc }}</p>
                    <a href="#" class="inline-flex items-center gap-1 text-primary text-sm font-semibold hover:gap-2 transition-all">
                        Baca selengkapnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>


{{-- ┌─────────────────────────────────────────────────────┐
     │  7 ·  GALERI                                        │
     └─────────────────────────────────────────────────────┘ --}}
<section id="galeri" class="py-24 bg-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="section-badge mb-4">Dokumentasi</span>
            <h2 class="section-heading">Galeri <span class="text-primary">Kegiatan</span></h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach([
                'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=600',
                'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=600',
                'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?q=80&w=600',
                'https://images.unsplash.com/photo-1588072432836-e10032774350?q=80&w=600',
                'https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=600',
                'https://images.unsplash.com/photo-1546410531-bb4caa6b424d?q=80&w=600',
                'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?q=80&w=600',
                'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=600',
            ] as $img)
            <div class="rounded-xl overflow-hidden group cursor-pointer aspect-[4/3]">
                <img src="{{ $img }}" alt="Galeri MAN 1 Selong"
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
            </div>
            @endforeach
        </div>

        <div class="text-center mt-10">
            <a href="#" class="btn-outline !py-2.5 !px-6 !text-xs">Lihat Semua Galeri</a>
        </div>
    </div>
</section>


{{-- ┌─────────────────────────────────────────────────────┐
     │  8 ·  KONTAK & PETA                                 │
     └─────────────────────────────────────────────────────┘ --}}
<section id="kontak" class="py-24 bg-white">
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
                            ['M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'Email', 'info@man1selong.sch.id'],
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

                <a href="#" class="btn-primary w-full mt-8 justify-center">
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
<section id="ppdb" class="relative py-20 bg-primary overflow-hidden">
    <div class="absolute -top-24 -right-24 w-80 h-80 bg-white/5 rounded-full"></div>
    <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-secondary/10 rounded-full"></div>

    <div class="relative z-10 max-w-3xl mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4 leading-tight">
            Siap Bergabung Bersama Kami?
        </h2>
        <p class="text-white/70 text-base md:text-lg mb-10 max-w-xl mx-auto">
            Pendaftaran Peserta Didik Baru (PPDB) MAN 1 Selong tahun ajaran 2026/2027 telah dibuka. Daftarkan diri Anda sekarang!
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#" class="btn-gold !py-3.5 !px-10">Daftar Sekarang</a>
            <a href="#" class="bg-transparent border-2 border-white/30 text-white px-10 py-3.5 rounded-xl font-semibold text-sm hover:bg-white/10 transition cursor-pointer inline-flex items-center gap-2">
                Info PPDB
            </a>
        </div>
    </div>
</section>

@endsection
