@extends('layouts.admin')

@section('title', 'Tambah Media Galeri')
@section('page_title', 'Tambah Media')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.galleries.index') }}" class="inline-flex items-center gap-2 text-slate-400 hover:text-emerald-600 font-bold text-sm transition-all group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Galeri
        </a>
    </div>

    <form Action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        
        <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-slate-200">
            <h3 class="text-2xl font-black text-slate-800 tracking-tight mb-8">Detail Media</h3>

            <div class="grid grid-cols-1 gap-8">
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Jenis Media</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <label class="relative flex px-6 py-5 border-2 rounded-2xl cursor-pointer transition-all peer-checked:border-emerald-500 peer-checked:bg-emerald-50/50 border-slate-100 bg-slate-50 hover:border-slate-200 focus-within:border-emerald-500" onclick="toggleMediaType('image')">
                            <input type="radio" name="type" value="image" class="peer sr-only" {{ old('type', 'image') == 'image' ? 'checked' : '' }}>
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-black text-slate-800">Unggah Foto</p>
                                    <p class="text-[0.65rem] font-bold text-slate-400 mt-0.5 uppercase tracking-widest">Format: JPG, PNG, GIF</p>
                                </div>
                            </div>
                            <div class="absolute inset-x-0 inset-y-0 border-2 border-emerald-500 rounded-2xl opacity-0 peer-checked:opacity-100 transition-opacity pointer-events-none"></div>
                        </label>

                        <label class="relative flex px-6 py-5 border-2 rounded-2xl cursor-pointer transition-all peer-checked:border-emerald-500 peer-checked:bg-emerald-50/50 border-slate-100 bg-slate-50 hover:border-slate-200 focus-within:border-emerald-500" onclick="toggleMediaType('video_url')">
                            <input type="radio" name="type" value="video_url" class="peer sr-only" {{ old('type') == 'video_url' ? 'checked' : '' }}>
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-black text-slate-800">Video Link</p>
                                    <p class="text-[0.65rem] font-bold text-slate-400 mt-0.5 uppercase tracking-widest">Tautan Youtube / Dll.</p>
                                </div>
                            </div>
                            <div class="absolute inset-x-0 inset-y-0 border-2 border-emerald-500 rounded-2xl opacity-0 peer-checked:opacity-100 transition-opacity pointer-events-none"></div>
                        </label>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Judul / Caption Media</label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium @error('title') border-red-500 @enderror"
                        placeholder="Contoh: Kegiatan Upacara Bendera HUT RI">
                    @error('title') <p class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div id="image_input_container" class="space-y-4 {{ old('type', 'image') === 'image' ? 'block' : 'hidden' }}">
                    <label class="text-sm font-bold text-slate-600 ml-1">File Foto</label>
                    <input type="file" name="image" id="image_file" class="text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition-all">
                    @error('image') <p class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div id="video_input_container" class="space-y-2 {{ old('type') === 'video_url' ? 'block' : 'hidden' }}">
                    <label class="text-sm font-bold text-slate-600 ml-1">Tautan URL Video (Youtube/Lainnya)</label>
                    <input type="url" name="image" id="video_url" value="{{ old('type') === 'video_url' ? old('image') : '' }}"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/5 rounded-2xl outline-none transition-all font-medium"
                        placeholder="https://youtube.com/watch?v=...">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Deskripsi Tambahan (Opsional)</label>
                    <textarea name="description" rows="3"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium resize-none tracking-tight"
                        placeholder="Deskripsi untuk media ini...">{{ old('description') }}</textarea>
                </div>

                <div class="pt-4">
                    <label class="flex items-center group cursor-pointer w-max">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}
                            class="w-6 h-6 rounded-lg border-2 border-slate-300 text-emerald-600 focus:ring-emerald-500/20 cursor-pointer transition-all">
                        <span class="ml-3 text-sm font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Tampilkan di Galeri Publik</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" 
                class="px-12 py-5 bg-emerald-600 text-white font-black text-lg rounded-2xl shadow-[0_20px_40px_-10px_rgba(5,150,105,0.4)] hover:shadow-[0_25px_50px_-12px_rgba(5,150,105,0.5)] hover:-translate-y-1 active:translate-y-0 transition-all duration-300 flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                Unggah Media
            </button>
        </div>
    </form>
</div>

<script>
    function toggleMediaType(type) {
        const imageContainer = document.getElementById('image_input_container');
        const videoContainer = document.getElementById('video_input_container');
        const imageInput = document.getElementById('image_file');
        const videoInput = document.getElementById('video_url');

        if (type === 'image') {
            imageContainer.classList.remove('hidden');
            videoContainer.classList.add('hidden');
            // Disable video input so it doesn't get submitted
            videoInput.disabled = true;
            imageInput.disabled = false;
        } else {
            imageContainer.classList.add('hidden');
            videoContainer.classList.remove('hidden');
            // Disable image input so it doesn't get submitted
            imageInput.disabled = true;
            videoInput.disabled = false;
        }
    }
    
    // Initialize state
    toggleMediaType('{{ old("type", "image") }}');
</script>
@endsection
