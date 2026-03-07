<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description', 'Website Resmi Madrasah Aliyah Negeri 1 Lombok Timur – Madrasah unggul, religius, berprestasi, dan berbasis teknologi.')">
    <title>@yield('title', 'MAN 1 Lombok Timur')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ $school_setting->logo ? asset('storage/'.$school_setting->logo) : asset('images/logo.png') }}" type="image/png">

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
                    animation: {
                        scroll: 'scroll 30s linear infinite',
                    },
                    keyframes: {
                        scroll: {
                            '0%':   { transform: 'translateX(0)' },
                            '100%': { transform: 'translateX(-50%)' },
                        },
                    },
                },
            },
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }

        /* Component classes */
        .btn-primary {
            @apply bg-primary text-white px-6 py-3 rounded-xl font-semibold text-sm
                   transition-all duration-200 hover:bg-primary-dark hover:shadow-lg
                   active:scale-[0.97] cursor-pointer inline-flex items-center justify-center gap-2;
        }
        .btn-outline {
            @apply border-2 border-primary text-primary px-6 py-3 rounded-xl font-semibold text-sm
                   transition-all duration-200 hover:bg-primary hover:text-white
                   active:scale-[0.97] cursor-pointer inline-flex items-center justify-center gap-2;
        }
        .btn-white {
            @apply bg-white text-primary px-6 py-3 rounded-xl font-semibold text-sm
                   shadow-lg hover:shadow-xl transition-all duration-200
                   active:scale-[0.97] cursor-pointer inline-flex items-center justify-center gap-2;
        }
        .btn-gold {
            @apply bg-secondary text-neutral px-6 py-3 rounded-xl font-semibold text-sm
                   shadow-lg hover:shadow-xl transition-all duration-200
                   active:scale-[0.97] cursor-pointer inline-flex items-center justify-center gap-2;
        }
        .nav-link {
            @apply text-neutral/70 hover:text-primary font-medium text-[14px] tracking-wide
                   transition-colors px-4 py-2 rounded-lg hover:bg-primary-light/60;
        }
        .nav-active {
            @apply text-primary bg-primary-light font-semibold text-[14px] tracking-wide
                   px-4 py-2 rounded-lg;
        }
        .section-badge {
            @apply inline-flex items-center gap-2 bg-primary-light text-primary
                   px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest;
        }
        .section-heading {
            @apply text-3xl md:text-[2.5rem] font-extrabold text-neutral leading-tight;
        }
        .section-desc {
            @apply text-neutral-light text-base md:text-lg leading-relaxed max-w-2xl mx-auto;
        }

        /* Custom Prose for RichEditor content */
        .prose-content ul { @apply list-disc pl-5 mb-4 space-y-2; }
        .prose-content ol { @apply list-decimal pl-5 mb-4 space-y-2; }
        .prose-content p { @apply mb-4 leading-relaxed; }
        .prose-content strong { @apply font-bold text-neutral; }
        .prose-content h2 { @apply text-2xl font-bold mb-4 mt-8; }
        .prose-content h3 { @apply text-xl font-bold mb-3 mt-6; }
    </style>
</head>

<body class="bg-white text-neutral antialiased font-sans selection:bg-primary/20 selection:text-primary">

    {{-- Navbar --}}
    <x-navbar />

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <x-footer />

    {{-- Scroll-to-top --}}
    <button
        x-data="{ show: false }"
        x-init="window.addEventListener('scroll', () => show = window.scrollY > 400)"
        x-show="show"
        x-cloak
        x-transition.opacity
        @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
        class="fixed bottom-6 right-6 z-50 w-11 h-11 bg-primary text-white rounded-full shadow-xl
               flex items-center justify-center hover:bg-primary-dark transition cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
        </svg>
    </button>

</body>
</html>
