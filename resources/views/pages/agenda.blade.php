@extends('layouts.base')

@section('title', 'Agenda Sekolah — MAN 1 Lombok Timur')

@section('content')
<section class="relative pt-32 pb-16 bg-primary-dark overflow-hidden text-center">
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-white">
        <h1 class="text-4xl font-extrabold mb-2">Agenda Madrasah</h1>
        <p class="text-white/60 max-w-2xl mx-auto">Kalender kegiatan akademik, hari libur, dan acara penting lainnya yang akan datang.</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="space-y-6">
                @forelse($agendas as $agenda)
                <div class="flex flex-col sm:flex-row gap-6 p-6 rounded-3xl border border-border hover:shadow-lg transition-all items-center sm:items-start group">
                    <div class="w-20 h-20 bg-primary rounded-2xl flex flex-col items-center justify-center text-white shrink-0 group-hover:scale-105 transition-transform">
                        <span class="text-2xl font-bold leading-none">{{ \Carbon\Carbon::parse($agenda->event_date)->format('d') }}</span>
                        <span class="text-[10px] font-bold uppercase tracking-widest">{{ \Carbon\Carbon::parse($agenda->event_date)->format('M') }}</span>
                    </div>
                    <div class="text-center sm:text-left">
                        <h3 class="text-xl font-bold text-neutral mb-2 group-hover:text-primary transition-colors">{{ $agenda->title }}</h3>
                        <div class="flex flex-wrap justify-center sm:justify-start gap-4 text-xs text-neutral-light font-medium">
                            <span class="flex items-center gap-1.5"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> {{ $agenda->time ?: '07:30 WITA' }}</span>
                            <span class="flex items-center gap-1.5"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg> {{ $agenda->location ?: 'MAN 1 Lombok Timur' }}</span>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center text-neutral-light italic">Belum ada agenda madrasah terbaru.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection
