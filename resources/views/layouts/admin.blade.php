<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - MAN 1 LOMBOK TIMUR</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .sidebar-gradient {
            background: linear-gradient(180deg, #064e3b 0%, #065f46 100%);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-72 sidebar-gradient text-white flex-shrink-0 flex flex-col shadow-2xl z-50">
            <div class="p-6 flex items-center gap-4 border-b border-white/10">
                <div class="p-2 bg-white/10 rounded-xl border border-white/20">
                    @php $school_setting = \App\Models\SchoolSetting::first(); @endphp
                    @if($school_setting && $school_setting->logo)
                        <img src="{{ asset('storage/' . $school_setting->logo) }}" alt="Logo" class="h-10 w-auto">
                    @else
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-auto">
                    @endif
                </div>
                <div>
                    <h1 class="font-black tracking-tighter text-lg leading-tight">MAN 1</h1>
                    <p class="text-[0.6rem] font-bold tracking-[0.3em] text-emerald-400 uppercase">Lombok Timur</p>
                </div>
            </div>

            <nav class="flex-1 overflow-y-auto p-4 space-y-2 py-8">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 border-white/20' : 'text-white/70 hover:text-white hover:bg-white/10' }} rounded-xl font-bold transition-all border border-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>

                <div class="pt-6 pb-2 px-4">
                    <p class="text-[0.65rem] font-black text-emerald-400/60 uppercase tracking-widest">Manajemen Konten</p>
                </div>

                <a href="{{ route('admin.posts.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.posts.*') ? 'bg-white/10 border-white/20 text-white' : 'text-white/70 hover:text-white hover:bg-white/10' }} rounded-xl font-bold transition-all border border-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" />
                    </svg>
                    Berita & Artikel
                </a>

                <a href="{{ route('admin.agendas.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.agendas.*') ? 'bg-white/10 border-white/20 text-white' : 'text-white/70 hover:text-white hover:bg-white/10' }} rounded-xl font-bold transition-all border border-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Agenda Sekolah
                </a>

                <a href="{{ route('admin.achievements.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.achievements.*') ? 'bg-white/10 border-white/20 text-white' : 'text-white/70 hover:text-white hover:bg-white/10' }} rounded-xl font-bold transition-all border border-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Prestasi
                </a>

                <div class="pt-6 pb-2 px-4">
                    <p class="text-[0.65rem] font-black text-emerald-400/60 uppercase tracking-widest">Kesiswaan & Akademik</p>
                </div>

                <a href="{{ route('admin.ppdb.registrants.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.ppdb.registrants.*') ? 'bg-white/10 border-white/20 text-white' : 'text-white/70 hover:text-white hover:bg-white/10' }} rounded-xl font-bold transition-all border border-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Data Pendaftar PPDB
                </a>

                <a href="{{ route('admin.ppdb.settings') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.ppdb.settings*') ? 'bg-white/10 border-white/20 text-white' : 'text-white/70 hover:text-white hover:bg-white/10' }} rounded-xl font-bold transition-all border border-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    Pengaturan PPDB
                </a>

                <a href="{{ route('admin.student_statistics.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.student_statistics.*') ? 'bg-white/10 border-white/20 text-white' : 'text-white/70 hover:text-white hover:bg-white/10' }} rounded-xl font-bold transition-all border border-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    Statistik Siswa
                </a>

                <a href="{{ route('admin.programs.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.programs.*') ? 'bg-white/10 border-white/20 text-white' : 'text-white/70 hover:text-white hover:bg-white/10' }} rounded-xl font-bold transition-all border border-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    </svg>
                    Program Sekolah
                </a>

                <a href="{{ route('admin.extracurriculars.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.extracurriculars.*') ? 'bg-white/10 border-white/20 text-white' : 'text-white/70 hover:text-white hover:bg-white/10' }} rounded-xl font-bold transition-all border border-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Ekstrakurikuler
                </a>

                <div class="pt-6 pb-2 px-4">
                    <p class="text-[0.65rem] font-black text-emerald-400/60 uppercase tracking-widest">Data Master & Media</p>
                </div>

                <a href="{{ route('admin.teachers.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.teachers.*') ? 'bg-white/10 border-white/20 text-white' : 'text-white/70 hover:text-white hover:bg-white/10' }} rounded-xl font-bold transition-all border border-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    Data Guru & Staff
                </a>

                <a href="{{ route('admin.galleries.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.galleries.*') ? 'bg-white/10 border-white/20 text-white' : 'text-white/70 hover:text-white hover:bg-white/10' }} rounded-xl font-bold transition-all border border-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Galeri Foto/Video
                </a>

                <div class="pt-6 pb-2 px-4">
                    <p class="text-[0.65rem] font-black text-emerald-400/60 uppercase tracking-widest">Pengaturan Website</p>
                </div>

                <a href="{{ route('admin.profile.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.profile.*') ? 'bg-white/10 border-white/20 text-white' : 'text-white/70 hover:text-white hover:bg-white/10' }} rounded-xl font-bold transition-all border border-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    Profil Sekolah (Pusat)
                </a>

                <a href="{{ route('admin.contact.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.contact.*') ? 'bg-white/10 border-white/20 text-white' : 'text-white/70 hover:text-white hover:bg-white/10' }} rounded-xl font-bold transition-all border border-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    Info Kontak
                </a>

                <a href="{{ route('admin.hero.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.hero.*') ? 'bg-white/10 border-white/20 text-white' : 'text-white/70 hover:text-white hover:bg-white/10' }} rounded-xl font-bold transition-all border border-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                    </svg>
                    Pengaturan Hero
                </a>
                <!-- More links will be added during Phase 2 -->
            </nav>

            <div class="p-4 border-t border-white/10">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-red-500/10 text-red-400 hover:bg-red-500 hover:text-white rounded-xl font-bold transition-all border border-red-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col h-full overflow-hidden">
            <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-8 flex-shrink-0">
                <div class="flex items-center gap-4">
                    <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">@yield('page_title', 'Dashboard')</h2>
                </div>
                <div class="flex items-center gap-6">
                    <div class="text-right">
                        <p class="text-sm font-black text-slate-900 leading-none">{{ Auth::user()->name ?? 'Administrator' }}</p>
                        <p class="text-[0.6rem] font-bold text-emerald-600 uppercase tracking-widest mt-1">Super Admin</p>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-slate-100 border-2 border-slate-200 flex items-center justify-center font-black text-slate-500 shadow-sm">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                    </div>
                </div>
            </header>

            <div class="flex-1 overflow-y-auto p-8">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
