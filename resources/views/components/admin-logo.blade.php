@php
    $school_setting = \App\Models\SchoolSetting::first();
    $is_login_page = request()->routeIs('filament.admin.auth.login') || request()->is('admin/login*');
@endphp

@if($is_login_page)
    {{-- Login Page Brand (Fixed to the Left Decorative Panel) --}}
    <div class="fixed top-0 left-0 w-[55%] h-full flex flex-col items-center justify-center pointer-events-none z-[100] login-brand-container">
        <div class="login-logo-wrapper mb-8 scale-110 lg:scale-125">
            <div class="login-logo-inner p-6 bg-white/10 backdrop-blur-xl rounded-[2.5rem] border border-white/30 shadow-[0_20px_50px_rgba(0,0,0,0.3)]">
                @if($school_setting && $school_setting->logo)
                    <img src="{{ asset('storage/' . $school_setting->logo) }}" alt="Logo MAN 1" class="h-32 w-auto object-contain drop-shadow-2xl">
                @else
                    <img src="{{ asset('images/logo.png') }}" alt="Logo MAN 1" class="h-32 w-auto object-contain drop-shadow-2xl">
                @endif
            </div>
        </div>
        <div class="text-center space-y-4">
            <div class="space-y-1">
                <h1 class="text-4xl lg:text-5xl font-black tracking-tighter text-white leading-none drop-shadow-lg">
                    MAN 1
                </h1>
                <h2 class="text-3xl lg:text-4xl font-bold tracking-tight text-emerald-300 leading-none drop-shadow-md">
                    LOMBOK TIMUR
                </h2>
            </div>
            <div class="flex items-center justify-center gap-4 py-2">
                <div class="h-[1px] w-12 bg-white/30"></div>
                <p class="text-[0.75rem] font-bold tracking-[0.8em] text-white/90 uppercase whitespace-nowrap">
                    Portal Administrasi
                </p>
                <div class="h-[1px] w-12 bg-white/30"></div>
            </div>
        </div>
    </div>
@else
    {{-- Sidebar Logo (Horizontal) --}}
    <div class="flex items-center gap-3 py-1 sidebar-brand">
        <div class="logo-icon-box flex flex-shrink-0 items-center justify-center">
            @if($school_setting && $school_setting->logo)
                <img src="{{ asset('storage/' . $school_setting->logo) }}" alt="Logo MAN 1" class="h-full w-auto object-contain">
            @else
                <img src="{{ asset('images/logo.png') }}" alt="Logo MAN 1" class="h-full w-auto object-contain">
            @endif
        </div>
        <div class="flex flex-col justify-center overflow-hidden sidebar-brand-text text-left">
            <span class="brand-name-main text-lg font-black tracking-tight text-white leading-tight truncate">
                MAN 1
            </span>
            <span class="brand-name-sub text-[0.6rem] font-bold tracking-[0.3em] text-emerald-400 uppercase leading-none mt-1">
                LOMBOK TIMUR
            </span>
        </div>
    </div>
@endif
