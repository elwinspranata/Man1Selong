@extends('layouts.base')

@section('title', 'Direktori Guru & Tendik — MAN 1 Lombok Timur')

@section('description', 'Daftar pendidik dan tenaga kependidikan MAN 1 Lombok Timur yang berdedikasi tinggi dalam mencetak generasi cerdas dan berakhlak.')

@section('content')
{{-- Page Header --}}
<section class="relative pt-32 pb-20 bg-primary-dark overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <img src="{{ asset('images/hero-bg.png') }}" class="w-full h-full object-cover">
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
        <span class="inline-block px-4 py-1.5 bg-white/10 backdrop-blur-md rounded-full text-white/80 text-xs font-bold uppercase tracking-widest mb-6 border border-white/20">
            Sumber Daya Manusia
        </span>
        <h1 class="text-4xl md:text-5xl font-black text-white mb-6 tracking-tight">Direktori <span class="text-secondary">Guru & Tendik</span></h1>
        <p class="text-white/70 max-w-2xl mx-auto text-lg leading-relaxed">
            Mengenal para pejuang pendidikan yang berdedikasi membimbing siswa-siswi MAN 1 Lombok Timur meraih masa depan gemilang.
        </p>
    </div>
</section>

{{-- Search & Stats --}}
<section class="py-10 bg-white border-b border-border sticky top-16 z-30 shadow-sm">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-8">
                <div class="text-center md:text-left">
                    <span class="block text-2xl font-black text-primary">{{ $teachers->count() }}</span>
                    <span class="text-xs font-bold text-neutral-light uppercase tracking-wider">Total Staf</span>
                </div>
                <div class="w-px h-10 bg-border hidden md:block"></div>
                <div class="text-center md:text-left">
                    <span class="block text-2xl font-black text-secondary">{{ $teachers->where('position', '!=', 'Guru')->count() }}</span>
                    <span class="text-xs font-bold text-neutral-light uppercase tracking-wider">Staf Struktural</span>
                </div>
            </div>
            
            <div class="w-full md:w-96 relative">
                <input type="text" id="teacherSearch" placeholder="Cari nama guru atau mata pelajaran..." 
                       class="w-full pl-12 pr-4 py-3.5 bg-light border-none rounded-2xl text-sm focus:ring-2 focus:ring-primary/20 transition-all font-medium">
                <svg class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-neutral-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>
    </div>
</section>

{{-- Teachers Grid --}}
<section class="py-20 bg-light/50">
    <div class="max-w-7xl mx-auto px-4">
        <div id="teacherGrid" class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @forelse($teachers as $teacher)
            <div class="teacher-card group bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-border/50 flex flex-col items-center p-10 text-center" 
                 data-name="{{ strtolower($teacher->name) }}" 
                 data-subject="{{ strtolower($teacher->subject) }}">
                
                {{-- Photo Frame - Larger & Sharper --}}
                <div class="relative mb-8">
                    <div class="absolute inset-0 bg-primary/5 rounded-3xl -rotate-6 scale-105 group-hover:rotate-0 transition-transform duration-700"></div>
                    <div class="relative w-48 h-56 rounded-2xl overflow-hidden border-4 border-white shadow-2xl">
                        <img src="{{ ($teacher->photo ? asset('storage/'.$teacher->photo) : asset('images/default-avatar.png')) . '?v=' . time() }}" 
                             alt="{{ $teacher->name }}" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 brightness-[1.05] contrast-[1.1] saturate-[1.1]"
                             style="image-rendering: -webkit-optimize-contrast; image-rendering: crisp-edges;">
                        
                        {{-- Subtle HD Texture overlay --}}
                        <div class="absolute inset-0 opacity-10 pointer-events-none bg-[url('https://www.transparenttextures.com/patterns/stardust.png')]"></div>
                    </div>
                </div>

                {{-- Info --}}
                <h3 class="text-lg font-bold text-neutral mb-1 leading-snug group-hover:text-primary transition-colors">{{ $teacher->name }}</h3>
                <p class="text-sm font-semibold text-secondary mb-3 uppercase tracking-wider">{{ $teacher->position }}</p>
                
                <div class="w-10 h-1 bg-border rounded-full mb-4 group-hover:w-20 group-hover:bg-primary transition-all duration-500"></div>
                
                @if($teacher->subject)
                <div class="flex items-center gap-2 px-4 py-1.5 bg-primary-light rounded-full text-primary text-xs font-bold mb-4">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    {{ $teacher->subject }}
                </div>
                @endif

                @if($teacher->nip)
                <div class="text-[10px] font-bold text-neutral-light uppercase tracking-widest mt-auto">
                    NIP: {{ $teacher->nip }}
                </div>
                @endif
            </div>
            @empty
            <div class="col-span-full py-20 text-center">
                <div class="text-6xl mb-4">👨‍🏫</div>
                <h3 class="text-xl font-bold text-neutral">Belum ada data guru</h3>
                <p class="text-neutral-light mt-2">Data sedang diperbarui oleh administrator.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<script>
    document.getElementById('teacherSearch')?.addEventListener('input', function(e) {
        const query = e.target.value.toLowerCase();
        const cards = document.querySelectorAll('.teacher-card');
        
        cards.forEach(card => {
            const name = card.getAttribute('data-name');
            const subject = card.getAttribute('data-subject') || '';
            
            if (name.includes(query) || subject.includes(query)) {
                card.style.display = 'flex';
                card.style.opacity = '0';
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 50);
            } else {
                card.style.display = 'none';
            }
        });
    });
</script>

<style>
    .teacher-card {
        animation: fade-in-up 0.6s ease-out forwards;
    }
    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection
