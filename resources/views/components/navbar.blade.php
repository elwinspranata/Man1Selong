{{-- ═══════════════════════════════════════════════════════
     NAVBAR – MAN 1 Selong
     Sticky, clean, professional. Desktop horizontal / Mobile slide-down.
     Uses Alpine.js for dropdown & mobile toggle.
═══════════════════════════════════════════════════════ --}}
<header
    x-data="{ mobileOpen: false }"
    class="fixed top-0 inset-x-0 z-50 bg-white/95 backdrop-blur-md border-b border-border shadow-sm">

    <div class="max-w-7xl mx-auto flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">

        {{-- ── Logo ── --}}
        <a href="/" class="flex items-center gap-2.5 flex-shrink-0">
            <img src="{{ asset('images/logo.png') }}" alt="Logo MAN 1 Selong" class="h-10 w-auto">
            <div class="hidden sm:block leading-tight">
                <span class="block text-primary font-extrabold text-sm tracking-tight">MAN 1 Selong</span>
                <span class="block text-neutral-light text-[10px] font-semibold tracking-widest uppercase">Lombok Timur</span>
            </div>
        </a>

        {{-- ── Desktop Navigation ── --}}
        <nav class="hidden lg:flex items-center gap-1">
            <a href="/" class="nav-active">Beranda</a>

            {{-- Profil dropdown --}}
            <div class="relative" x-data="{ open: false }"
                 @mouseenter="open = true" @mouseleave="open = false">
                <button class="nav-link flex items-center gap-1 cursor-pointer"
                        @click="open = !open">
                    Profil
                    <svg class="w-3.5 h-3.5 transition-transform" :class="open && 'rotate-180'"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" x-cloak
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                     class="absolute top-full left-0 mt-1 w-52 bg-white rounded-xl shadow-xl border border-border py-1.5 z-50">
                    <a href="#" class="block px-4 py-2 text-sm text-neutral/70 hover:text-primary hover:bg-primary-light/50 transition font-medium">Tentang Sekolah</a>
                    <a href="#" class="block px-4 py-2 text-sm text-neutral/70 hover:text-primary hover:bg-primary-light/50 transition font-medium">Visi & Misi</a>
                    <a href="#" class="block px-4 py-2 text-sm text-neutral/70 hover:text-primary hover:bg-primary-light/50 transition font-medium">Sejarah</a>
                    <a href="#" class="block px-4 py-2 text-sm text-neutral/70 hover:text-primary hover:bg-primary-light/50 transition font-medium">Struktur Organisasi</a>
                    <a href="#" class="block px-4 py-2 text-sm text-neutral/70 hover:text-primary hover:bg-primary-light/50 transition font-medium">Guru & Tenaga Pendidik</a>
                </div>
            </div>

            <a href="#berita" class="nav-link">Berita</a>

            {{-- Kegiatan dropdown --}}
            <div class="relative" x-data="{ open: false }"
                 @mouseenter="open = true" @mouseleave="open = false">
                <button class="nav-link flex items-center gap-1 cursor-pointer"
                        @click="open = !open">
                    Kegiatan
                    <svg class="w-3.5 h-3.5 transition-transform" :class="open && 'rotate-180'"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" x-cloak
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                     class="absolute top-full left-0 mt-1 w-52 bg-white rounded-xl shadow-xl border border-border py-1.5 z-50">
                    <a href="#" class="block px-4 py-2 text-sm text-neutral/70 hover:text-primary hover:bg-primary-light/50 transition font-medium">Ekstrakurikuler</a>
                    <a href="#" class="block px-4 py-2 text-sm text-neutral/70 hover:text-primary hover:bg-primary-light/50 transition font-medium">Prestasi</a>
                    <a href="#" class="block px-4 py-2 text-sm text-neutral/70 hover:text-primary hover:bg-primary-light/50 transition font-medium">Agenda Sekolah</a>
                </div>
            </div>

            <a href="#galeri" class="nav-link">Galeri</a>
            <a href="#kontak" class="nav-link">Kontak</a>
        </nav>

        {{-- ── Right side actions ── --}}
        <div class="flex items-center gap-2">
            <a href="#ppdb" class="hidden lg:inline-flex btn-primary !py-2 !px-5 !text-xs !font-bold !tracking-wider !uppercase">
                PPDB 2026
            </a>

            {{-- Mobile hamburger --}}
            <button @click="mobileOpen = !mobileOpen"
                    class="lg:hidden w-10 h-10 rounded-lg flex items-center justify-center text-neutral hover:bg-light transition cursor-pointer">
                <svg x-show="!mobileOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="mobileOpen" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- ── Mobile menu ── --}}
    <div x-show="mobileOpen" x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 -translate-y-2"
         class="lg:hidden border-t border-border bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-4 space-y-1">
            <a href="/" class="block px-3 py-2.5 rounded-lg text-primary bg-primary-light font-semibold text-sm">Beranda</a>

            {{-- Profil accordion --}}
            <div x-data="{ sub: false }">
                <button @click="sub = !sub"
                        class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg text-neutral/70 hover:bg-light font-medium text-sm cursor-pointer">
                    Profil
                    <svg class="w-4 h-4 transition-transform" :class="sub && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="sub" x-cloak x-transition class="pl-5 space-y-0.5 mt-0.5">
                    <a href="#" class="block px-3 py-2 text-sm text-neutral-light hover:text-primary transition">Tentang Sekolah</a>
                    <a href="#" class="block px-3 py-2 text-sm text-neutral-light hover:text-primary transition">Visi & Misi</a>
                    <a href="#" class="block px-3 py-2 text-sm text-neutral-light hover:text-primary transition">Sejarah</a>
                    <a href="#" class="block px-3 py-2 text-sm text-neutral-light hover:text-primary transition">Guru & Tenaga Pendidik</a>
                </div>
            </div>

            <a href="#berita" class="block px-3 py-2.5 rounded-lg text-neutral/70 hover:bg-light font-medium text-sm">Berita</a>
            <a href="#" class="block px-3 py-2.5 rounded-lg text-neutral/70 hover:bg-light font-medium text-sm">Kegiatan</a>
            <a href="#galeri" class="block px-3 py-2.5 rounded-lg text-neutral/70 hover:bg-light font-medium text-sm">Galeri</a>
            <a href="#kontak" class="block px-3 py-2.5 rounded-lg text-neutral/70 hover:bg-light font-medium text-sm">Kontak</a>

            <div class="pt-3">
                <a href="#ppdb" class="btn-primary w-full justify-center !text-xs !font-bold !uppercase !tracking-wider">PPDB 2026</a>
            </div>
        </div>
    </div>
</header>
