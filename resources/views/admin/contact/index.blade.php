@extends('layouts.admin')

@section('title', 'Info Kontak')
@section('page_title', 'Pengaturan Info Kontak')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <div>
            <h3 class="text-2xl font-black text-slate-800 tracking-tight">Informasi Kontak & Sosial Media</h3>
            <p class="text-slate-500 font-medium">Kelola alamat, kontak, map dan tautan sosial media sekolah.</p>
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

    <form Action="{{ route('admin.contact.update') }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')
        
        <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-slate-200">
            <div class="flex items-center gap-4 mb-8 pb-6 border-b border-slate-100">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <h4 class="text-xl font-black text-slate-800">Kontak Utama</h4>
                    <p class="text-sm font-bold text-slate-400">Email, Telepon, dan Alamat Lengkap</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email', $setting->email) }}"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/5 rounded-2xl outline-none transition-all font-medium @error('email') border-red-500 @enderror"
                        placeholder="Contoh: info@man1selong.sch.id">
                    @error('email') <p class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Nomor Telepon / WhatsApp</label>
                    <input type="text" name="phone" value="{{ old('phone', $setting->phone) }}"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/5 rounded-2xl outline-none transition-all font-medium @error('phone') border-red-500 @enderror"
                        placeholder="Contoh: +62 812-3456-7890">
                    @error('phone') <p class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="md:col-span-2 space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Alamat Lengkap</label>
                    <textarea name="address" rows="3"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/5 rounded-2xl outline-none transition-all font-medium resize-none @error('address') border-red-500 @enderror"
                        placeholder="Alamat sekolah lengkap...">{{ old('address', $setting->address) }}</textarea>
                    @error('address') <p class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="md:col-span-2 space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Link Google Maps (Iframe/URL)</label>
                    <textarea name="map_url" rows="3"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/5 rounded-2xl outline-none transition-all font-medium resize-none font-mono text-xs @error('map_url') border-red-500 @enderror"
                        placeholder="Masukkan kode Iframe atau URL dari Google Maps...">{{ old('map_url', $setting->map_url) }}</textarea>
                    <p class="text-xs font-bold text-slate-400 mt-1 ml-1">Copy "Embed a map" HTML (iframe) dari Google Maps atau paste langsung link lokasinya.</p>
                    @error('map_url') <p class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-slate-200">
            <div class="flex items-center gap-4 mb-8 pb-6 border-b border-slate-100">
                <div class="w-12 h-12 bg-pink-50 text-pink-600 rounded-2xl flex items-center justify-center shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                    </svg>
                </div>
                <div>
                    <h4 class="text-xl font-black text-slate-800">Sosial Media</h4>
                    <p class="text-sm font-bold text-slate-400">Tautan resmi sosial media sekolah</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Facebook URL</label>
                    <input type="url" name="facebook_url" value="{{ old('facebook_url', $setting->facebook_url) }}"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-blue-600 focus:bg-white focus:ring-4 focus:ring-blue-600/5 rounded-2xl outline-none transition-all font-medium @error('facebook_url') border-red-500 @enderror"
                        placeholder="https://facebook.com/...">
                    @error('facebook_url') <p class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Instagram URL</label>
                    <input type="url" name="instagram_url" value="{{ old('instagram_url', $setting->instagram_url) }}"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-pink-500 focus:bg-white focus:ring-4 focus:ring-pink-500/5 rounded-2xl outline-none transition-all font-medium @error('instagram_url') border-red-500 @enderror"
                        placeholder="https://instagram.com/...">
                    @error('instagram_url') <p class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Youtube URL</label>
                    <input type="url" name="youtube_url" value="{{ old('youtube_url', $setting->youtube_url) }}"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-red-500 focus:bg-white focus:ring-4 focus:ring-red-500/5 rounded-2xl outline-none transition-all font-medium @error('youtube_url') border-red-500 @enderror"
                        placeholder="https://youtube.com/...">
                    @error('youtube_url') <p class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Tiktok URL</label>
                    <input type="url" name="tiktok_url" value="{{ old('tiktok_url', $setting->tiktok_url) }}"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-slate-800 focus:bg-white focus:ring-4 focus:ring-slate-800/5 rounded-2xl outline-none transition-all font-medium @error('tiktok_url') border-red-500 @enderror"
                        placeholder="https://tiktok.com/@...">
                    @error('tiktok_url') <p class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" 
                class="px-12 py-5 bg-blue-600 text-white font-black text-lg rounded-2xl shadow-[0_20px_40px_-10px_rgba(37,99,235,0.4)] hover:shadow-[0_25px_50px_-12px_rgba(37,99,235,0.5)] hover:-translate-y-1 active:translate-y-0 transition-all duration-300 flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
