@extends('layouts.admin')

@section('title', 'Tambah Guru Baru')
@section('page_title', 'Tambah Guru Baru')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.teachers.index') }}" class="inline-flex items-center gap-2 text-slate-400 hover:text-emerald-600 font-bold text-sm transition-all group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Daftar Guru
        </a>
    </div>

    <form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        
        <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-slate-200">
            <h3 class="text-2xl font-black text-slate-800 tracking-tight mb-8">Informasi Guru</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="md:col-span-2 space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Nama Lengkap & Gelar</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium @error('name') border-red-500 @enderror"
                        placeholder="Contoh: Drs. H. Muhammad Nasir, M.Pd">
                    @error('name') <p class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">NIP (Opsional)</label>
                    <input type="text" name="nip" value="{{ old('nip') }}"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium"
                        placeholder="1980xxxx xxxxxxxx">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Jabatan</label>
                    <input type="text" name="position" value="{{ old('position') }}" required
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium"
                        placeholder="Contoh: Guru Madya / Kepala Madrasah">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Mata Pelajaran (Opsional)</label>
                    <input type="text" name="subject" value="{{ old('subject') }}"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium"
                        placeholder="Contoh: Biologi / Matematika">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Urutan Tampilan</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', 1) }}" required
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium">
                </div>

                <div class="md:col-span-2 space-y-4 pt-4">
                    <label class="text-sm font-bold text-slate-600 ml-1">Foto Guru</label>
                    <div class="flex items-center gap-6">
                        <div class="w-24 h-32 rounded-3xl bg-slate-100 border-2 border-dashed border-slate-300 flex items-center justify-center overflow-hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <input type="file" name="photo" class="text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition-all">
                            <p class="text-xs text-slate-400 mt-2 font-medium">Format: JPG, PNG. Ukuran maks: 2MB.</p>
                        </div>
                    </div>
                </div>

                <div class="md:col-span-2 pt-4">
                    <label class="flex items-center group cursor-pointer">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}
                            class="w-6 h-6 rounded-lg border-2 border-slate-300 text-emerald-600 focus:ring-emerald-500/20 cursor-pointer transition-all">
                        <span class="ml-3 text-sm font-bold text-slate-600 group-hover:text-slate-900 transition-colors">Tampilkan di Website</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" 
                class="px-12 py-5 bg-emerald-600 text-white font-black text-lg rounded-2xl shadow-[0_20px_40px_-10px_rgba(5,150,105,0.4)] hover:shadow-[0_25px_50px_-12px_rgba(5,150,105,0.5)] hover:-translate-y-1 active:translate-y-0 transition-all duration-300 flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
                </svg>
                Simpan Data Guru
            </button>
        </div>
    </form>
</div>
@endsection
