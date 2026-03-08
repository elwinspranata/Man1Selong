<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Portal Administrasi MAN 1</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .emerald-gradient {
            background: linear-gradient(165deg, #064e3b 0%, #065f46 45%, #047857 100%);
        }
        @keyframes slow-glow {
            0% { transform: translateY(-10%) rotate(0deg); opacity: 0.5; }
            100% { transform: translateY(10%) rotate(5deg); opacity: 0.8; }
        }
        .animate-glow {
            animation: slow-glow 15s infinite alternate ease-in-out;
        }
    </style>
</head>
<body class="bg-white text-slate-900 overflow-hidden">
    <div class="flex min-h-screen">
        <!-- Left Side: Decorative -->
        <div class="hidden lg:flex lg:w-7/12 emerald-gradient relative items-center justify-center p-12 overflow-hidden shadow-[inset_-30px_0_60px_rgba(0,0,0,0.15)]">
            <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 40px 40px;"></div>
            <div class="absolute inset-0 animate-glow pointer-events-none bg-[radial-gradient(circle_at_center,rgba(52,211,153,0.1)_0%,transparent_70%)]"></div>
            
            <div class="relative z-10 text-center">
                <div class="mb-10 inline-block p-8 bg-white/10 backdrop-blur-2xl rounded-[3rem] border border-white/30 shadow-[0_30px_60px_rgba(0,0,0,0.3)] transform transition-all duration-700 hover:scale-105">
                    @php $school_setting = \App\Models\SchoolSetting::first(); @endphp
                    @if($school_setting && $school_setting->logo)
                        <img src="{{ asset('storage/' . $school_setting->logo) }}" alt="Logo" class="h-40 w-auto drop-shadow-2xl">
                    @else
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-40 w-auto drop-shadow-2xl">
                    @endif
                </div>
                <div class="space-y-2">
                    <h1 class="text-6xl font-black text-white tracking-tighter drop-shadow-lg leading-tight">
                        MAN 1
                    </h1>
                    <h2 class="text-4xl font-bold text-emerald-300 tracking-tight drop-shadow-md">
                        LOMBOK TIMUR
                    </h2>
                    <div class="flex items-center justify-center gap-6 py-6">
                        <div class="h-px w-16 bg-white/30"></div>
                        <span class="text-sm font-bold text-white/90 tracking-[0.8em] uppercase">Portal Administrasi</span>
                        <div class="h-px w-16 bg-white/30"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="w-full lg:w-5/12 flex items-center justify-center p-8 lg:p-16 bg-white">
            <div class="w-full max-w-md">
                <div class="mb-12 text-center lg:text-left">
                    <!-- Mobile Header (Logo & Title) -->
                    <div class="lg:hidden flex flex-col items-center justify-center mb-10">
                        <div class="mb-5 inline-block p-4 bg-emerald-50 rounded-3xl border border-emerald-100 shadow-sm">
                            @php $school_setting = \App\Models\SchoolSetting::first(); @endphp
                            @if($school_setting && $school_setting->logo)
                                <img src="{{ asset('storage/' . $school_setting->logo) }}" alt="Logo" class="h-20 w-auto">
                            @else
                                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-20 w-auto">
                            @endif
                        </div>
                        <h1 class="text-4xl font-black text-slate-900 tracking-tighter leading-tight">
                            MAN 1
                        </h1>
                        <h2 class="text-2xl font-bold text-emerald-600 tracking-tight drop-shadow-sm">
                            LOMBOK TIMUR
                        </h2>
                        <div class="flex items-center justify-center gap-4 mt-3">
                            <div class="h-px w-8 bg-emerald-200"></div>
                            <span class="text-[10px] font-black text-emerald-800/60 tracking-[0.4em] uppercase">Portal Administrasi</span>
                            <div class="h-px w-8 bg-emerald-200"></div>
                        </div>
                    </div>
                    <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight mb-3">Selamat Datang</h2>
                    <p class="text-slate-500 font-medium">Silakan masuk untuk mengelola portal sekolah.</p>
                </div>

                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-xl">
                        @foreach ($errors->all() as $error)
                            <p class="text-red-700 text-sm font-semibold">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-bold text-slate-700 ml-1">Alamat Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                            class="w-full px-5 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10 rounded-2xl outline-none transition-all duration-300 font-medium"
                            placeholder="admin@sekolah.sch.id">
                    </div>

                    <div class="space-y-2 text-right">
                        <label for="password" class="block text-sm font-bold text-slate-700 text-left ml-1">Kata Sandi</label>
                        <input type="password" id="password" name="password" required
                            class="w-full px-5 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10 rounded-2xl outline-none transition-all duration-300 font-medium"
                            placeholder="••••••••">
                    </div>

                    <div class="flex items-center justify-between ml-1">
                        <label class="flex items-center group cursor-pointer">
                            <input type="checkbox" name="remember" class="w-5 h-5 rounded-lg border-2 border-slate-300 text-emerald-600 focus:ring-emerald-500/20 cursor-pointer transition-all">
                            <span class="ml-3 text-sm font-semibold text-slate-600 group-hover:text-slate-900 transition-colors">Ingat Saya</span>
                        </label>
                    </div>

                    <button type="submit" 
                        class="w-full py-4 bg-gradient-to-r from-emerald-800 to-emerald-600 text-white font-black text-lg rounded-2xl shadow-[0_15px_30px_-5px_rgba(5,150,105,0.4)] hover:shadow-[0_20px_40px_-8px_rgba(5,150,105,0.5)] hover:-translate-y-1 active:translate-y-0 transition-all duration-300 uppercase tracking-widest">
                        Masuk Sekarang
                    </button>
                </form>

                <div class="mt-12 text-center">
                    <a href="/" class="inline-flex items-center gap-2 text-slate-400 hover:text-emerald-600 font-bold text-sm transition-all duration-300 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali ke Halaman Utama
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
