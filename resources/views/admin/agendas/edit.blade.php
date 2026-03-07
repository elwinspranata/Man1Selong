@extends('layouts.admin')

@section('title', 'Edit Agenda')
@section('page_title', 'Edit Agenda')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.agendas.index') }}" class="inline-flex items-center gap-2 text-slate-400 hover:text-emerald-600 font-bold text-sm transition-all group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Daftar Agenda
        </a>
    </div>

    <form Action="{{ route('admin.agendas.update', $agenda) }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')
        
        <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-slate-200">
            <h3 class="text-2xl font-black text-slate-800 tracking-tight mb-8">Ubah Detail Kegiatan</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="md:col-span-2 space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Judul Kegiatan</label>
                    <input type="text" name="title" value="{{ old('title', $agenda->title) }}" required
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium @error('title') border-red-500 @enderror"
                        placeholder="Contoh: Rapat Koordinasi Tahunan">
                    @error('title') <p class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Tanggal Kegiatan</label>
                    <input type="date" name="event_date" value="{{ old('event_date', $agenda->event_date) }}" required
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Waktu (Opsional)</label>
                    <input type="text" name="time" value="{{ old('time', $agenda->time) }}"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium"
                        placeholder="Contoh: 08:00 - Selesai">
                </div>

                <div class="md:col-span-2 space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Lokasi (Opsional)</label>
                    <input type="text" name="location" value="{{ old('location', $agenda->location) }}"
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium"
                        placeholder="Contoh: Aula Madrasah">
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" 
                class="px-12 py-5 bg-emerald-600 text-white font-black text-lg rounded-2xl shadow-[0_20px_40px_-10px_rgba(5,150,105,0.4)] hover:shadow-[0_25px_50px_-12px_rgba(5,150,105,0.5)] hover:-translate-y-1 active:translate-y-0 transition-all duration-300 flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
                Perbarui Agenda
            </button>
        </div>
    </form>
</div>
@endsection
