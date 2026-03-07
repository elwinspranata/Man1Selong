@extends('ppdb.layout')

@section('title', 'Login Siswa — PPDB ' . ($school_setting->school_name ?: 'MAN 1 Lombok Timur'))

@section('content')
<section class="min-h-[calc(100vh-4rem)] flex items-center justify-center py-16 bg-gradient-to-br from-slate-50 via-white to-primary-light/30 relative overflow-hidden">
    {{-- Decorative --}}
    <div class="absolute top-20 right-20 w-64 h-64 bg-primary/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 left-20 w-72 h-72 bg-secondary/5 rounded-full blur-3xl"></div>

    <div class="w-full max-w-md mx-auto px-4 animate-fade-in-up">
        <div class="ppdb-card p-8 md:p-10 shadow-xl">
            {{-- Logo & Title --}}
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
                <h1 class="text-2xl font-extrabold text-neutral mb-2">LOGIN SISWA</h1>
                <p class="text-sm text-neutral/50 font-medium">Masuk ke akun PPDB Anda</p>
            </div>

            {{-- Error messages --}}
            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl mb-6 text-sm font-medium">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            {{-- Login Form --}}
            <form action="{{ route('ppdb.login.submit') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="ppdb-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="ppdb-input" placeholder="contoh@email.com" required autofocus>
                </div>
                <div>
                    <label class="ppdb-label">Password</label>
                    <div class="relative" x-data="{ show: false }">
                        <input :type="show ? 'text' : 'password'" name="password" class="ppdb-input" style="padding-right:3rem" placeholder="••••••••" required>
                        <button type="button" @click="show = !show" class="absolute right-3 top-1/2 -translate-y-1/2 text-neutral/40 hover:text-neutral/70 transition cursor-pointer">
                            <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            <svg x-show="show" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                        </button>
                    </div>
                </div>

                <button type="submit" class="ppdb-btn" style="width:100%;padding:1rem;text-transform:uppercase;letter-spacing:0.1em;font-weight:800;font-size:0.875rem">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                    Masuk
                </button>
            </form>

            {{-- Divider --}}
            <div class="relative my-8">
                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-slate-200"></div></div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-white text-neutral/40 font-medium">Belum memiliki akun?</span>
                </div>
            </div>

            {{-- Register link --}}
            <a href="{{ route('ppdb.register') }}" class="w-full border-2 border-primary text-primary py-3.5 rounded-xl font-bold text-sm hover:bg-primary hover:text-white transition-all uppercase tracking-widest text-center block">
                Buat Akun
            </a>
        </div>
    </div>
</section>
@endsection
