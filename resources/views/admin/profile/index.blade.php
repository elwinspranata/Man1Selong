@extends('layouts.admin')

@section('title', 'Profil Sekolah')
@section('page_title', 'Manajemen Profil Sekolah')

@section('content')
<div class="max-w-5xl mx-auto">
    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 rounded-r-2xl text-emerald-800 font-bold flex items-center gap-3 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        
        <!-- Identitas Utama -->
        <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-slate-200 relative overflow-hidden">
            <div class="absolute top-0 right-0 p-8 opacity-5">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-32 h-32" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
            
            <h3 class="text-2xl font-black text-slate-800 tracking-tight mb-8 flex items-center gap-3">
                <span class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center">1</span>
                Identitas Sekolah
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Nama Sekolah</label>
                    <input type="text" name="school_name" value="{{ old('school_name', $setting->school_name) }}" required
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Alias/Singkatan</label>
                    <input type="text" name="school_alias" value="{{ old('school_alias', $setting->school_alias) }}"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium">
                </div>

                <div class="space-y-4">
                    <label class="text-sm font-bold text-slate-600 ml-1">Logo Sekolah</label>
                    <div class="flex items-center gap-6">
                        <div class="w-24 h-24 rounded-3xl bg-slate-100 border-2 border-dashed border-slate-300 flex items-center justify-center overflow-hidden">
                            @if($setting->logo)
                                <img src="{{ asset('storage/' . $setting->logo) }}" class="w-full h-full object-cover">
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            @endif
                        </div>
                        <input type="file" name="logo" class="text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition-all">
                    </div>
                </div>
            </div>
        </div>

        <!-- Pimpinan & Sambutan -->
        <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-slate-200">
            <h3 class="text-2xl font-black text-slate-800 tracking-tight mb-8 flex items-center gap-3">
                <span class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center">2</span>
                Kepala Sekolah & Sambutan
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="md:col-span-1 space-y-4">
                    <label class="text-sm font-bold text-slate-600 ml-1">Foto Kepala Sekolah</label>
                    <div class="flex flex-col items-center gap-4">
                        <div class="w-full aspect-[3/4] rounded-3xl bg-slate-100 border-2 border-dashed border-slate-300 flex items-center justify-center overflow-hidden">
                            @if($setting->principal_photo)
                                <img src="{{ asset('storage/' . $setting->principal_photo) }}" class="w-full h-full object-cover">
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            @endif
                        </div>
                        <input type="file" name="principal_photo" class="text-xs text-slate-500 file:mr-2 file:py-2 file:px-3 file:rounded-lg file:border-0 file:font-bold file:bg-emerald-50 file:text-emerald-700">
                    </div>
                </div>
                
                <div class="md:col-span-2 space-y-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-600 ml-1">Nama Kepala Sekolah</label>
                        <input type="text" name="principal_name" value="{{ old('principal_name', $setting->principal_name) }}"
                            class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium">
                    </div>
                    
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-600 ml-1">Sambutan Singkat</label>
                        <textarea name="welcome_message" rows="6"
                            class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium resize-none">{{ old('welcome_message', $setting->welcome_message) }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visi, Misi & Sejarah -->
        <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-slate-200">
            <h3 class="text-2xl font-black text-slate-800 tracking-tight mb-8 flex items-center gap-3">
                <span class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center">3</span>
                Visi, Misi & Sejarah
            </h3>

            <div class="space-y-8">
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Visi Sekolah</label>
                    <textarea name="vision" rows="3"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium resize-none">{{ old('vision', $setting->vision) }}</textarea>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Misi Sekolah (Gunakan baris baru untuk setiap poin)</label>
                    <textarea name="mission" rows="6"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium">{{ old('mission', $setting->mission) }}</textarea>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Sejarah Singkat</label>
                    <textarea name="history" rows="8"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium">{{ old('history', $setting->history) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Kontak & Lokasi -->
        <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-slate-200">
            <h3 class="text-2xl font-black text-slate-800 tracking-tight mb-8 flex items-center gap-3">
                <span class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center">4</span>
                Kontak & Lokasi
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Nomor Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone', $setting->phone) }}"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Email Sekolah</label>
                    <input type="email" name="email" value="{{ old('email', $setting->email) }}"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium">
                </div>

                <div class="md:col-span-2 space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Alamat Lengkap</label>
                    <input type="text" name="address" value="{{ old('address', $setting->address) }}"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium">
                </div>
                
                <div class="md:col-span-2 space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">URL Google Maps (Embed/Link)</label>
                    <input type="text" name="map_url" value="{{ old('map_url', $setting->map_url) }}"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium">
                </div>
            </div>
        </div>

        <div class="sticky bottom-8 z-20 flex justify-end">
            <button type="submit" 
                class="px-12 py-5 bg-emerald-600 text-white font-black text-lg rounded-2xl shadow-[0_20px_40px_-10px_rgba(5,150,105,0.4)] hover:shadow-[0_25px_50px_-12px_rgba(5,150,105,0.5)] hover:-translate-y-1 active:translate-y-0 transition-all duration-300 flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
