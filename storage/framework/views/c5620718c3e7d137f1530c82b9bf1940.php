<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $__env->yieldContent('description', 'PPDB Online MAN 1 Lombok Timur – Pendaftaran Peserta Didik Baru'); ?>">
    <title><?php echo $__env->yieldContent('title', 'PPDB Online — MAN 1 Lombok Timur'); ?></title>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo e($school_setting->logo ? asset('storage/'.$school_setting->logo) : asset('images/logo.png')); ?>" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'Inter', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        primary:       { DEFAULT: '#166534', dark: '#14532d', light: '#dcfce7' },
                        secondary:     { DEFAULT: '#d4a017', light: '#fef9c3' },
                        accent:        '#0f4c25',
                        neutral:       { DEFAULT: '#1e293b', light: '#64748b' },
                        light:         '#f8fafc',
                        surface:       '#ffffff',
                        border:        '#e2e8f0',
                    },
                },
            },
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }

        /* ── Form inputs ── */
        .ppdb-input {
            width: 100%;
            background-color: #fff;
            border: 1.5px solid #cbd5e1;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            outline: none;
            transition: all 0.2s ease;
            font-size: 0.875rem;
            font-weight: 500;
            color: #1e293b;
            display: block;
        }
        .ppdb-input::placeholder { color: #94a3b8; }
        .ppdb-input:focus {
            border-color: #166534;
            box-shadow: 0 0 0 3px rgba(22,101,52,0.15);
        }
        select.ppdb-input { appearance: auto; }
        textarea.ppdb-input { resize: vertical; }

        /* ── Labels ── */
        .ppdb-label {
            display: block;
            font-size: 0.75rem;
            font-weight: 700;
            color: rgba(30,41,59,0.8);
            text-transform: uppercase;
            margin-bottom: 0.5rem;
            letter-spacing: 0.05em;
        }

        /* ── Button ── */
        .ppdb-btn {
            background-color: #166534;
            color: #fff;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 700;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            border: none;
            text-decoration: none;
        }
        .ppdb-btn:hover {
            background-color: #14532d;
            box-shadow: 0 10px 25px -5px rgba(22,101,52,0.35);
        }
        .ppdb-btn:active { transform: scale(0.97); }

        /* ── Card ── */
        .ppdb-card {
            background-color: #fff;
            border-radius: 1rem;
            border: 1px solid #f1f5f9;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06);
        }

        /* ── Animations ── */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        .animate-fade-in-up-delay {
            animation: fadeInUp 0.6s ease-out 0.2s forwards;
            opacity: 0;
        }

        /* ── Print ── */
        @media print {
            .no-print { display: none !important; }
            body { background: white !important; }
        }
    </style>
</head>

<body class="bg-slate-50 text-neutral antialiased font-sans min-h-screen selection:bg-primary/20 selection:text-primary">

    
    <header class="fixed top-0 inset-x-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200 shadow-sm no-print"
            x-data="{ mobileOpen: false }">
        <div class="max-w-7xl mx-auto flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
            
            <a href="<?php echo e(route('ppdb.home')); ?>" class="flex items-center gap-3 flex-shrink-0">
                <img src="<?php echo e($school_setting->logo ? asset('storage/'.$school_setting->logo) : asset('images/logo.png')); ?>" alt="Logo" class="h-10 w-auto">
                <div class="block leading-tight">
                    <span class="block text-primary font-extrabold text-sm sm:text-base tracking-tight"><?php echo e($school_setting->school_name ?: 'MAN 1 Lombok Timur'); ?></span>
                    <span class="block text-neutral-light text-[9px] sm:text-[10px] font-semibold tracking-widest uppercase">PPDB Online <?php echo e($school_setting->ppdb_year ?: '2026/2027'); ?></span>
                </div>
            </a>

            
            <nav class="hidden lg:flex items-center gap-1">
                <a href="<?php echo e(route('ppdb.home')); ?>" class="<?php echo e(request()->routeIs('ppdb.home') ? 'text-primary bg-primary-light font-semibold' : 'text-neutral/70 hover:text-primary hover:bg-slate-50 font-medium'); ?> px-4 py-2 rounded-lg text-sm transition-colors">Home</a>
                <a href="<?php echo e(route('ppdb.informasi')); ?>" class="<?php echo e(request()->routeIs('ppdb.informasi') ? 'text-primary bg-primary-light font-semibold' : 'text-neutral/70 hover:text-primary hover:bg-slate-50 font-medium'); ?> px-4 py-2 rounded-lg text-sm transition-colors">Informasi</a>
                <a href="<?php echo e(route('ppdb.pengumuman')); ?>" class="<?php echo e(request()->routeIs('ppdb.pengumuman') ? 'text-primary bg-primary-light font-semibold' : 'text-neutral/70 hover:text-primary hover:bg-slate-50 font-medium'); ?> px-4 py-2 rounded-lg text-sm transition-colors">Pengumuman</a>
                <a href="<?php echo e(route('ppdb.daftar')); ?>" class="<?php echo e(request()->routeIs('ppdb.daftar') || request()->routeIs('ppdb.formulir') ? 'text-primary bg-primary-light font-semibold' : 'text-neutral/70 hover:text-primary hover:bg-slate-50 font-medium'); ?> px-4 py-2 rounded-lg text-sm transition-colors">Formulir</a>
                
                
                <?php if(Auth::guard('ppdb')->check()): ?>
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="text-neutral/70 hover:text-primary hover:bg-slate-50 font-medium px-4 py-2 rounded-lg text-sm transition-colors flex items-center gap-1 cursor-pointer" @click="open = !open">
                        Print
                        <svg class="w-3.5 h-3.5 transition-transform" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="open" x-cloak x-transition class="absolute top-full right-0 mt-1 w-48 bg-white rounded-xl shadow-xl border border-slate-100 py-1.5 z-50">
                        <a href="<?php echo e(route('ppdb.print.bukti')); ?>" class="block px-4 py-2 text-sm text-neutral/70 hover:text-primary hover:bg-primary-light/50 transition font-medium">Bukti Pendaftaran</a>
                        <a href="<?php echo e(route('ppdb.print.kartu')); ?>" class="block px-4 py-2 text-sm text-neutral/70 hover:text-primary hover:bg-primary-light/50 transition font-medium">Kartu Peserta</a>
                    </div>
                </div>
                <?php endif; ?>
            </nav>

            
            <div class="flex items-center gap-2">
                <?php if(Auth::guard('ppdb')->check()): ?>
                    <div class="hidden lg:flex items-center gap-3">
                        <span class="text-xs font-semibold text-neutral/60"><?php echo e(Auth::guard('ppdb')->user()->full_name); ?></span>
                        <form action="<?php echo e(route('ppdb.logout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="bg-red-50 text-red-600 px-4 py-2 rounded-lg text-xs font-bold hover:bg-red-100 transition cursor-pointer">Logout</button>
                        </form>
                    </div>
                <?php else: ?>
                    <a href="<?php echo e(route('ppdb.daftar')); ?>" class="hidden lg:inline-flex ppdb-btn" style="padding:0.5rem 1.25rem;font-size:0.75rem;letter-spacing:0.05em;text-transform:uppercase">LOGIN</a>
                <?php endif; ?>

                
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

        
        <div x-show="mobileOpen" x-cloak x-transition class="lg:hidden border-t border-slate-200 bg-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4 py-4 space-y-1">
                <a href="<?php echo e(route('ppdb.home')); ?>" class="block px-3 py-2.5 rounded-lg text-sm font-medium <?php echo e(request()->routeIs('ppdb.home') ? 'text-primary bg-primary-light font-semibold' : 'text-neutral/70 hover:bg-light'); ?>">Home</a>
                <a href="<?php echo e(route('ppdb.informasi')); ?>" class="block px-3 py-2.5 rounded-lg text-sm font-medium <?php echo e(request()->routeIs('ppdb.informasi') ? 'text-primary bg-primary-light font-semibold' : 'text-neutral/70 hover:bg-light'); ?>">Informasi</a>
                <a href="<?php echo e(route('ppdb.pengumuman')); ?>" class="block px-3 py-2.5 rounded-lg text-sm font-medium <?php echo e(request()->routeIs('ppdb.pengumuman') ? 'text-primary bg-primary-light font-semibold' : 'text-neutral/70 hover:bg-light'); ?>">Pengumuman</a>
                <a href="<?php echo e(route('ppdb.daftar')); ?>" class="block px-3 py-2.5 rounded-lg text-sm font-medium <?php echo e(request()->routeIs('ppdb.daftar') ? 'text-primary bg-primary-light font-semibold' : 'text-neutral/70 hover:bg-light'); ?>">Formulir</a>
                
                <?php if(Auth::guard('ppdb')->check()): ?>
                    <a href="<?php echo e(route('ppdb.print.bukti')); ?>" class="block px-3 py-2.5 rounded-lg text-sm font-medium text-neutral/70 hover:bg-light">Bukti Pendaftaran</a>
                    <a href="<?php echo e(route('ppdb.print.kartu')); ?>" class="block px-3 py-2.5 rounded-lg text-sm font-medium text-neutral/70 hover:bg-light">Kartu Peserta</a>
                    <div class="pt-3 border-t border-slate-100 mt-2">
                        <form action="<?php echo e(route('ppdb.logout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="w-full bg-red-50 text-red-600 py-2.5 rounded-lg text-sm font-bold hover:bg-red-100 transition cursor-pointer">Logout (<?php echo e(Auth::guard('ppdb')->user()->full_name); ?>)</button>
                        </form>
                    </div>
                <?php else: ?>
                    <div class="pt-3">
                        <a href="<?php echo e(route('ppdb.daftar')); ?>" class="ppdb-btn" style="width:100%;font-size:0.75rem;text-transform:uppercase;letter-spacing:0.05em">Login / Daftar</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </header>

    
    <main class="pt-16">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    
    <footer class="bg-neutral text-white py-10 no-print">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <div class="flex items-center justify-center gap-3 mb-4">
                <img src="<?php echo e($school_setting->logo ? asset('storage/'.$school_setting->logo) : asset('images/logo.png')); ?>" alt="Logo" class="h-8 w-auto opacity-80">
                <span class="font-bold text-sm"><?php echo e($school_setting->school_name ?: 'MAN 1 Lombok Timur'); ?></span>
            </div>
            <p class="text-sm text-white/60 mb-2">PPDB Online <?php echo e($school_setting->ppdb_year ?: '2026/2027'); ?></p>
            <p class="text-xs text-white/40">© <?php echo e(date('Y')); ?> — Panitia PPDB <?php echo e($school_setting->school_name ?: 'MAN 1 Lombok Timur'); ?></p>
            <a href="<?php echo e(route('home')); ?>" class="inline-flex items-center gap-1 text-xs text-secondary mt-4 hover:underline">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Website Utama
            </a>
        </div>
    </footer>

</body>
</html>
<?php /**PATH D:\laragon\www\man1selong\resources\views/ppdb/layout.blade.php ENDPATH**/ ?>