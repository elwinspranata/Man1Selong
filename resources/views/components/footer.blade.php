{{-- ═══════════════════════════════════════════════════════
     FOOTER – MAN 1 Selong
═══════════════════════════════════════════════════════ --}}
<footer class="bg-primary-dark text-white">

    {{-- Main Content --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12">

            {{-- ── Column 1: About ── --}}
            <div>
                <div class="flex items-center gap-3 mb-5">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-auto">
                    <div class="leading-tight">
                        <span class="block font-bold text-base">MAN 1 Selong</span>
                        <span class="block text-white/40 text-[10px] font-semibold tracking-widest uppercase">Kemenag Lotim</span>
                    </div>
                </div>
                <p class="text-white/50 text-sm leading-relaxed mb-6">
                    Madrasah Aliyah Negeri 1 Selong — lembaga pendidikan Islam yang berkomitmen mencetak generasi cerdas, religius, dan berprestasi.
                </p>
                {{-- Social --}}
                <div class="flex gap-2.5">
                    @foreach([
                        ['Facebook', 'M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z'],
                        ['Instagram', 'M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0 5.838a6.163 6.163 0 100 12.326 6.163 6.163 0 000-12.326zm0 10.163a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 11-2.88 0 1.44 1.44 0 012.88 0z'],
                        ['YouTube', 'M19.615 3.184c-3.604-.246-11.631-.245-15.23 0C.488 3.45.029 5.804 0 12c.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0C23.512 20.55 23.971 18.196 24 12c-.029-6.185-.484-8.549-4.385-8.816zM9 16V8l8 4-8 4z'],
                    ] as [$name, $d])
                    <a href="#" aria-label="{{ $name }}"
                       class="w-9 h-9 bg-white/10 rounded-lg flex items-center justify-center hover:bg-secondary hover:text-neutral transition-all duration-200 text-white/60 hover:scale-105">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="{{ $d }}"/></svg>
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- ── Column 2: Links ── --}}
            <div>
                <h4 class="font-bold text-sm mb-5 flex items-center gap-2">
                    <span class="w-1 h-4 bg-secondary rounded-full"></span> Tautan Cepat
                </h4>
                <ul class="space-y-2.5 text-sm">
                    @foreach(['Visi & Misi', 'Sejarah', 'Struktur Organisasi', 'PPDB Online', 'Prestasi', 'Download'] as $link)
                    <li>
                        <a href="#" class="text-white/50 hover:text-secondary transition-colors flex items-center gap-2 group">
                            <svg class="w-3 h-3 text-white/30 group-hover:text-secondary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            {{ $link }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- ── Column 3: Layanan ── --}}
            <div>
                <h4 class="font-bold text-sm mb-5 flex items-center gap-2">
                    <span class="w-1 h-4 bg-secondary rounded-full"></span> Layanan
                </h4>
                <ul class="space-y-2.5 text-sm">
                    @foreach(['E-Learning', 'Perpustakaan Digital', 'Info Alumni', 'Bimbingan Konseling', 'Pengaduan'] as $link)
                    <li>
                        <a href="#" class="text-white/50 hover:text-secondary transition-colors flex items-center gap-2 group">
                            <svg class="w-3 h-3 text-white/30 group-hover:text-secondary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            {{ $link }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- ── Column 4: Contact ── --}}
            <div>
                <h4 class="font-bold text-sm mb-5 flex items-center gap-2">
                    <span class="w-1 h-4 bg-secondary rounded-full"></span> Kontak
                </h4>
                <ul class="space-y-4 text-sm">
                    <li class="flex items-start gap-3 text-white/50">
                        <svg class="w-5 h-5 text-secondary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                        Jl. Pejanggik No. 123, Selong, Lombok Timur, NTB
                    </li>
                    <li class="flex items-center gap-3 text-white/50">
                        <svg class="w-5 h-5 text-secondary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        (0376) 21234
                    </li>
                    <li class="flex items-center gap-3 text-white/50">
                        <svg class="w-5 h-5 text-secondary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        info@man1selong.sch.id
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Divider + Copyright --}}
    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 flex flex-col sm:flex-row justify-between items-center gap-3 text-xs text-white/30">
            <p>&copy; {{ date('Y') }} MAN 1 Selong. Seluruh hak cipta dilindungi.</p>
            <p>Dikelola oleh <span class="text-secondary/80 font-semibold">Tim IT MAN 1 Selong</span></p>
        </div>
    </div>
</footer>
