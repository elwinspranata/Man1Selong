@extends('layouts.base')

@section('title', 'Hubungi Kami — MAN 1 Lombok Timur')

@section('content')
<section class="relative pt-32 pb-16 bg-primary-dark overflow-hidden text-center">
    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <h1 class="text-4xl font-extrabold text-white mb-2">Kontak Kami</h1>
        <p class="text-white/60">Kami terbuka untuk segala pertanyaan, saran, dan kerjasama.</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-16">
            {{-- Contact Info & Map --}}
            <div>
                <h2 class="text-3xl font-bold text-neutral mb-8">Informasi Lokasi</h2>
                <div class="space-y-6 mb-12">
                    <div class="flex gap-5">
                        <div class="w-12 h-12 bg-primary/10 text-primary rounded-xl flex items-center justify-center shrink-0">📍</div>
                        <div>
                            <p class="font-bold text-neutral">Alamat Madrasah</p>
                            <p class="text-neutral-light text-sm">{{ $school_setting->address ?: 'Jl. Pejanggik No. 123, Selong, Lombok Timur, NTB 83611' }}</p>
                        </div>
                    </div>
                    <div class="flex gap-5">
                        <div class="w-12 h-12 bg-primary/10 text-primary rounded-xl flex items-center justify-center shrink-0">📧</div>
                        <div>
                            <p class="font-bold text-neutral">Surel (Email)</p>
                            <p class="text-neutral-light text-sm">{{ $school_setting->email ?: 'info@man1lomboktimur.sch.id' }}</p>
                        </div>
                    </div>
                    <div class="flex gap-5">
                        <div class="w-12 h-12 bg-primary/10 text-primary rounded-xl flex items-center justify-center shrink-0">📞</div>
                        <div>
                            <p class="font-bold text-neutral">Telepon</p>
                            <p class="text-neutral-light text-sm">{{ $school_setting->phone ?: '(0376) 21234' }} — Aktif jam kerja</p>
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl overflow-hidden shadow-lg border border-border h-80">
                    <iframe src="{{ $school_setting->map_url ?: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15771.2!2d116.52!3d-8.65' }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="bg-light p-10 rounded-3xl border border-border shadow-sm">
                <h3 class="text-2xl font-bold text-neutral mb-6">Kirim Pesan</h3>
                <form class="space-y-5">
                    <div>
                        <label class="block text-xs font-bold text-neutral uppercase mb-2 tracking-widest">Nama Lengkap</label>
                        <input type="text" placeholder="Masukkan nama Anda..." class="w-full px-5 py-3.5 rounded-xl border border-border bg-white focus:ring-2 focus:ring-primary focus:outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-neutral uppercase mb-2 tracking-widest">Email</label>
                        <input type="email" placeholder="example@mail.com" class="w-full px-5 py-3.5 rounded-xl border border-border bg-white focus:ring-2 focus:ring-primary focus:outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-neutral uppercase mb-2 tracking-widest">Subjek</label>
                        <select class="w-full px-5 py-3.5 rounded-xl border border-border bg-white focus:ring-2 focus:ring-primary focus:outline-none transition-all">
                            <option>Informasi PPDB</option>
                            <option>Saran & Masukan</option>
                            <option>Kerjasama</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-neutral uppercase mb-2 tracking-widest">Pesan</label>
                        <textarea rows="5" placeholder="Tuliskan pesan Anda di sini..." class="w-full px-5 py-3.5 rounded-xl border border-border bg-white focus:ring-2 focus:ring-primary focus:outline-none transition-all"></textarea>
                    </div>
                    <button type="submit" class="btn-primary w-full py-4 text-base">Kirim Sekarang</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
