@extends('layouts.admin')

@section('title', 'Edit Data Statistik')
@section('page_title', 'Edit Statistik')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.student_statistics.index') }}" class="inline-flex items-center gap-2 text-slate-400 hover:text-emerald-600 font-bold text-sm transition-all group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Statistik Siswa
        </a>
    </div>

    <form Action="{{ route('admin.student_statistics.update', $student_statistic) }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')
        
        <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-slate-200">
            <h3 class="text-2xl font-black text-slate-800 tracking-tight mb-8">Ubah Data Siswa</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Tahun Ajaran</label>
                    <input type="text" name="academic_year" value="{{ old('academic_year', $student_statistic->academic_year) }}" required
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium @error('academic_year') border-red-500 @enderror"
                        placeholder="Contoh: 2024/2025">
                    @error('academic_year') <p class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-600 ml-1">Tingkat Kelas</label>
                    <input type="text" name="grade_level" value="{{ old('grade_level', $student_statistic->grade_level) }}" required
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-2xl outline-none transition-all font-medium @error('grade_level') border-red-500 @enderror"
                        placeholder="Contoh: Kelas X / Kelas XI / Kelas XII">
                    @error('grade_level') <p class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-4">
                    <label class="text-sm font-bold text-slate-600 ml-1 flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-blue-500 inline-block"></span>
                        Jumlah Siswa Laki-laki
                    </label>
                    <input type="number" min="0" name="male_count" value="{{ old('male_count', $student_statistic->male_count) }}" required
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/5 rounded-2xl outline-none transition-all font-black text-xl text-slate-800"
                        oninput="calculateTotal()">
                </div>

                <div class="space-y-4">
                    <label class="text-sm font-bold text-slate-600 ml-1 flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-pink-500 inline-block"></span>
                        Jumlah Siswa Perempuan
                    </label>
                    <input type="number" min="0" name="female_count" value="{{ old('female_count', $student_statistic->female_count) }}" required
                        class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-pink-500 focus:bg-white focus:ring-4 focus:ring-pink-500/5 rounded-2xl outline-none transition-all font-black text-xl text-slate-800"
                        oninput="calculateTotal()">
                </div>

                <div class="md:col-span-2 pt-6 border-t border-slate-100 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-bold text-slate-500 uppercase tracking-widest">Total Keseluruhan</p>
                        <p class="text-xs font-semibold text-slate-400">Kalkulasi otomatis jumlah L + P</p>
                    </div>
                    <div class="bg-emerald-50 px-8 py-4 rounded-2xl border border-emerald-100 shadow-sm shadow-emerald-500/10">
                        <span id="total_count" class="text-3xl font-black text-emerald-600">0</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" 
                class="px-12 py-5 bg-emerald-600 text-white font-black text-lg rounded-2xl shadow-[0_20px_40px_-10px_rgba(5,150,105,0.4)] hover:shadow-[0_25px_50px_-12px_rgba(5,150,105,0.5)] hover:-translate-y-1 active:translate-y-0 transition-all duration-300 flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
                Perbarui Data
            </button>
        </div>
    </form>
</div>

<script>
    function calculateTotal() {
        const male = parseInt(document.getElementsByName('male_count')[0].value) || 0;
        const female = parseInt(document.getElementsByName('female_count')[0].value) || 0;
        document.getElementById('total_count').innerText = male + female;
    }
    
    // Initial calculation
    calculateTotal();
</script>
@endsection
