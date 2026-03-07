{{-- ═══════════════════════════════════════════════════════
     FOOTER – MAN 1 Lombok Timur
═══════════════════════════════════════════════════════ --}}
<footer class="bg-primary-dark text-white">

    {{-- Main Content --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12">

            {{-- ── Column 1: About ── --}}
            <div>
                <div class="flex items-center gap-3 mb-5">
                    <img src="{{ $school_setting->logo ? asset('storage/'.$school_setting->logo) : asset('images/logo.png') }}" alt="Logo" class="h-12 w-auto">
                    <div class="leading-tight">
                        <span class="block font-bold text-base">{{ $school_setting->school_name ?: 'MAN 1 Lombok Timur' }}</span>
                        <span class="block text-white/40 text-[10px] font-semibold tracking-widest uppercase">{{ $school_setting->school_alias ?: 'Kemenag Lotim' }}</span>
                    </div>
                </div>
                <p class="text-white/50 text-sm leading-relaxed mb-6">
                    Madrasah Aliyah Negeri 1 Lombok Timur — lembaga pendidikan Islam yang berkomitmen mencetak generasi cerdas, religius, dan berprestasi.
                </p>
                {{-- Social --}}
                <div class="flex gap-2.5">
                    @php
                        $socials = [
                            ['name' => 'Facebook', 'url' => $school_setting->facebook_url, 'icon' => 'M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z'],
                            ['name' => 'Instagram', 'url' => $school_setting->instagram_url, 'icon' => 'M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0 5.838a6.163 6.163 0 100 12.326 6.163 6.163 0 000-12.326zm0 10.163a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 11-2.88 0 1.44 1.44 0 012.88 0z'],
                            ['name' => 'YouTube', 'url' => $school_setting->youtube_url, 'icon' => 'M19.615 3.184c-3.604-.246-11.631-.245-15.23 0C.488 3.45.029 5.804 0 12c.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0C23.512 20.55 23.971 18.196 24 12c-.029-6.185-.484-8.549-4.385-8.816zM9 16V8l8 4-8 4z'],
                            ['name' => 'TikTok', 'url' => $school_setting->tiktok_url, 'icon' => 'M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.27 1.76-.23.84-.13 1.78.32 2.53.53.84 1.45 1.39 2.43 1.44 1.39.11 2.8-.83 3.25-2.14.17-.37.24-.77.24-1.18.02-5.15.01-10.3.02-15.45z'],
                        ];
                    @endphp
                    
                    @foreach($socials as $social)
                        @if($social['url'])
                        <a href="{{ $social['url'] }}" target="_blank" aria-label="{{ $social['name'] }}"
                           class="w-9 h-9 bg-white/10 rounded-lg flex items-center justify-center hover:bg-secondary hover:text-neutral transition-all duration-200 text-white/60 hover:scale-105">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="{{ $social['icon'] }}"/></svg>
                        </a>
                        @endif
                    @endforeach
                </div>
            </div>

            {{-- ── Column 2: Links ── --}}
            <div>
                <h4 class="font-bold text-sm mb-5 flex items-center gap-2">
                    <span class="w-1 h-4 bg-secondary rounded-full"></span> Tautan Cepat
                </h4>
                <ul class="space-y-2.5 text-sm">
                    @foreach([
                        ['Visi & Misi', route('profil.visi-misi')],
                        ['Sambutan Kepala', route('profil.sambutan')],
                        ['Program Unggulan', route('kegiatan')],
                        ['PPDB Online', route('ppdb')],
                        ['Berita Terbaru', route('berita')],
                        ['Galeri Foto', route('galeri')],
                    ] as [$link, $href])
                    <li>
                        <a href="{{ $href }}" class="text-white/50 hover:text-secondary transition-colors flex items-center gap-2 group">
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
                    @foreach([
                        ['Tentang Sekolah', route('profil')],
                        ['Data Statistik', route('profil.statistik')],
                        ['Kontak Kami', route('kontak')],
                        ['Peta Lokasi', route('kontak')],
                        ['Info Pendaftaran', route('ppdb')],
                    ] as [$link, $href])
                    <li>
                        <a href="{{ $href }}" class="text-white/50 hover:text-secondary transition-colors flex items-center gap-2 group">
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
                        {{ $school_setting->address ?: 'Jl. Pejanggik No. 123, Selong, Lombok Timur, NTB' }}
                    </li>
                    <li class="flex items-center gap-3 text-white/50">
                        <svg class="w-5 h-5 text-secondary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        {{ $school_setting->phone ?: '(0376) 21234' }}
                    </li>
                    <li class="flex items-center gap-3 text-white/50">
                        <svg class="w-5 h-5 text-secondary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        {{ $school_setting->email ?: 'info@man1lomboktimur.sch.id' }}
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Divider + Copyright --}}
    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 flex flex-col sm:flex-row justify-between items-center gap-3 text-xs text-white/30">
            <p>&copy; {{ date('Y') }} {{ $school_setting->school_name ?: 'MAN 1 Lombok Timur' }}. Seluruh hak cipta dilindungi.</p>
            <p>Dikelola oleh <span class="text-secondary/80 font-semibold">Tim IT {{ $school_setting->school_alias ?: 'MAN 1 Lombok Timur' }}</span></p>
        </div>
    </div>
</footer>
