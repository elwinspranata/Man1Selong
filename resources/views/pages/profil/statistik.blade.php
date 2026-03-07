@extends('layouts.base')

@section('title', 'Statistik Sekolah — MAN 1 Lombok Timur')

@section('content')
<section class="relative pt-32 pb-20 bg-primary-dark overflow-hidden text-center">
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-white">
        <h1 class="text-4xl font-extrabold mb-2">Statistik Sekolah</h1>
        <p class="text-white/60">Data dan fakta mengenai kekuatan sumber daya MAN 1 Lombok Timur.</p>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        {{-- Data Utama --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 mb-20">
            @forelse($stats as $stat)
            <div class="p-8 rounded-3xl bg-light border border-border text-center group hover:bg-white hover:shadow-2xl transition-all duration-500">
                <div class="w-16 h-16 bg-primary-light text-primary rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $stat->icon }}"/>
                    </svg>
                </div>
                <div class="text-4xl font-black text-primary mb-2">{{ $stat->value }}</div>
                <div class="text-neutral font-bold text-sm tracking-wide mb-2">{{ $stat->label }}</div>
            </div>
            @empty
            <p class="text-center text-neutral-light italic col-span-4">Data statistik belum tersedia.</p>
            @endforelse
        </div>

        {{-- Detail Data Guru --}}
        <div class="grid lg:grid-cols-2 gap-12">
            <div class="p-10 rounded-3xl border border-border bg-white shadow-sm">
                <h3 class="text-2xl font-bold text-neutral mb-8">Kualifikasi Tenaga Pengajar</h3>
                <div class="space-y-6">
                    @foreach([
                        ['Doktor (S3)', '5%', 'w-[5%] bg-primary'],
                        ['Magister (S2)', '45%', 'w-[45%] bg-primary'],
                        ['Sarjana (S1)', '50%', 'w-[50%] bg-primary'],
                    ] as [$degree, $perc, $class])
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-bold text-neutral">{{ $degree }}</span>
                            <span class="text-sm font-black text-primary">{{ $perc }}</span>
                        </div>
                        <div class="w-full h-3 bg-light rounded-full overflow-hidden">
                            <div class="h-full {{ $class }} rounded-full shadow-inner"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="p-10 rounded-3xl border border-border bg-white shadow-sm">
                <h3 class="text-2xl font-bold text-neutral mb-8">Fasilitas Penunjang</h3>
                <div class="grid grid-cols-2 gap-4">
                    @foreach([
                        'Laboratorium Komputer', 'Laboratorium Bahasa', 'Laboratorium IPA', 'Perpustakaan Digital',
                        'Musholla Al-Ikhlas', 'Lapangan Olahraga', 'Studio Multimedia', 'Kantin Sehat'
                    ] as $item)
                    <div class="flex items-center gap-3 p-4 bg-light rounded-xl border border-border hover:border-primary transition-colors cursor-default">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-xs font-bold text-neutral-light uppercase">{{ $item }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
