@extends('layouts.admin')

@section('title', 'Edit Berita')
@section('page_title', 'Edit Berita')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center gap-2 text-slate-400 hover:text-emerald-600 font-bold text-sm transition-all group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Daftar Berita
        </a>
    </div>

    <form Action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')
        
        <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-slate-200">
            <h3 class="text-2xl font-black text-slate-800 tracking-tight mb-8">Ubah Detail Berita</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="md:col-span-2 space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Judul Berita</label>
                    <input type="text" name="title" value="{{ old('title', $post->title) }}" required
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium @error('title') border-red-500 @enderror"
                        placeholder="Masukkan judul berita yang menarik...">
                    @error('title') <p class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Kategori</label>
                    <select name="category" class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium">
                        <option value="Berita" {{ old('category', $post->category) == 'Berita' ? 'selected' : '' }}>Berita</option>
                        <option value="Pengumuman" {{ old('category', $post->category) == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                        <option value="Artikel" {{ old('category', $post->category) == 'Artikel' ? 'selected' : '' }}>Artikel</option>
                        <option value="Prestasi" {{ old('category', $post->category) == 'Prestasi' ? 'selected' : '' }}>Prestasi</option>
                        <option value="Agenda" {{ old('category', $post->category) == 'Agenda' ? 'selected' : '' }}>Agenda</option>
                    </select>
                </div>

                <div class="space-y-4">
                    <label class="text-sm font-bold text-slate-600 ml-1">Ubah Gambar</label>
                    <div class="flex items-center gap-4">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="w-16 h-12 rounded-xl object-cover border border-slate-200">
                        @endif
                        <input type="file" name="image" class="text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition-all">
                    </div>
                </div>

                <div class="md:col-span-2 space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Ringkasan Singkat (Excerpt)</label>
                    <textarea name="excerpt" rows="2"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium resize-none"
                        placeholder="Ringkasan pendek berita...">{{ old('excerpt', $post->excerpt) }}</textarea>
                </div>

                <div class="md:col-span-2 space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Konten Berita</label>
                    <textarea name="content" id="editor" rows="15"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-3xl outline-none transition-all font-medium">{{ old('content', $post->content) }}</textarea>
                </div>

                <div class="md:col-span-2 pt-4">
                    <label class="flex items-center group cursor-pointer">
                        <input type="hidden" name="is_published" value="0">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published', $post->is_published) ? 'checked' : '' }}
                            class="w-6 h-6 rounded-lg border-2 border-slate-300 text-emerald-600 focus:ring-emerald-500/20 cursor-pointer transition-all">
                        <span class="ml-3 text-sm font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Terbitkan Berita</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" 
                class="px-12 py-5 bg-emerald-600 text-white font-black text-lg rounded-2xl shadow-[0_20px_40px_-10px_rgba(5,150,105,0.4)] hover:shadow-[0_25px_50px_-12px_rgba(5,150,105,0.5)] hover:-translate-y-1 active:translate-y-0 transition-all duration-300 flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
                Perbarui Berita
            </button>
        </div>
    </form>
</div>
@endsection
