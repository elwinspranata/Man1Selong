@extends('layouts.admin')

@section('title', 'Pengaturan Hero Area')
@section('page_title', 'Hero Settings')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <div>
            <h3 class="text-2xl font-black text-slate-800 tracking-tight">Pengaturan Tampilan Utama (Hero)</h3>
            <p class="text-slate-500 font-medium">Ubah gambar latar belakang, judul, dan subjudul pada halaman utama website sekolah.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-8 p-4 bg-emerald-50 border-l-4 border-emerald-500 rounded-r-2xl text-emerald-800 font-bold flex items-center gap-3 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <form Action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')
        
        <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-slate-200">
            <div class="flex items-center gap-4 mb-8 pb-6 border-b border-slate-100">
                <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <h4 class="text-xl font-black text-slate-800">Konten Hero Area</h4>
                    <p class="text-sm font-bold text-slate-400">Gambar Banner, Teks Utama dan Deskripsi</p>
                </div>
            </div>

            <div class="space-y-8">
                <!-- Preview and Image Upload -->
                <div class="space-y-4">
                    <label class="text-sm font-bold text-slate-600 ml-1">Gambar Banner / Slider</label>
                    
                    <div class="relative w-full aspect-[21/9] rounded-3xl overflow-hidden bg-slate-100 border-2 border-dashed border-slate-300 group hover:border-emerald-500 transition-colors">
                        @if($setting->hero_image)
                            <img src="{{ asset('storage/' . $setting->hero_image) }}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <span class="px-6 py-3 bg-white/90 backdrop-blur-sm text-slate-800 font-bold rounded-xl text-sm shadow-xl flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                    </svg>
                                    Ubah Gambar Banner
                                </span>
                            </div>
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mb-3 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                </svg>
                                <span class="font-bold">Klik untuk mengunggah gambar banner</span>
                                <span class="text-xs mt-1">Format: JPG, PNG. Rekomendasi ukuran: 1920x800px</span>
                            </div>
                        @endif
                        
                        <!-- Overlay Input for Click anywhere -->
                        <input type="file" name="hero_image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" title="Pilih Gambar">
                    </div>
                    @error('hero_image') <p class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Judul Utama (Headline)</label>
                    <input type="text" name="hero_title" value="{{ old('hero_title', $setting->hero_title) }}"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-purple-500 focus:bg-white focus:ring-4 focus:ring-purple-500/5 rounded-2xl outline-none transition-all font-black text-xl text-slate-800 @error('hero_title') border-red-500 @enderror"
                        placeholder="Contoh: Selamat Datang di MAN 1 Selong">
                    @error('hero_title') <p class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Sub-judul / Teks Deskripsi (Opsional)</label>
                    <textarea name="hero_subtitle" rows="3"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-purple-500 focus:bg-white focus:ring-4 focus:ring-purple-500/5 rounded-2xl outline-none transition-all font-medium resize-none @error('hero_subtitle') border-red-500 @enderror"
                        placeholder="Deskripsi singkat, motto, atau pesan sambutan...">{{ old('hero_subtitle', $setting->hero_subtitle) }}</textarea>
                    @error('hero_subtitle') <p class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" 
                class="px-12 py-5 bg-purple-600 text-white font-black text-lg rounded-2xl shadow-[0_20px_40px_-10px_rgba(147,51,234,0.4)] hover:shadow-[0_25px_50px_-12px_rgba(147,51,234,0.5)] hover:-translate-y-1 active:translate-y-0 transition-all duration-300 flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
                Simpan Pengaturan
            </button>
        </div>
    </form>
</div>
@endsection
