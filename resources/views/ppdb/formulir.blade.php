@extends('ppdb.layout')

@section('title', 'Formulir Pendaftaran — PPDB ' . ($school_setting->school_name ?: 'MAN 1 Lombok Timur'))

@section('content')
<section class="py-10 bg-slate-50 min-h-[calc(100vh-4rem)]">
    <div class="max-w-5xl mx-auto px-4" x-data="{ activeTab: 'biodata' }">
        
        {{-- Header --}}
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
                <div>
                    <h1 class="text-2xl font-extrabold text-neutral mb-1">Formulir Pendaftaran</h1>
                    <p class="text-sm text-neutral/50 font-medium">No. Pendaftaran: <strong class="text-primary">{{ $registrant->registration_number }}</strong></p>
                </div>
                <div class="flex items-center gap-3">
                    @php
                        $statusColors = [
                            'draft' => 'bg-slate-100 text-slate-600',
                            'pending' => 'bg-yellow-100 text-yellow-700',
                            'verified' => 'bg-blue-100 text-blue-700',
                            'accepted' => 'bg-green-100 text-green-700',
                            'rejected' => 'bg-red-100 text-red-700',
                        ];
                    @endphp
                    <span class="px-4 py-2 rounded-full text-xs font-bold uppercase tracking-wider {{ $statusColors[$registrant->status] ?? 'bg-slate-100 text-slate-600' }}">
                        {{ $registrant->status_label }}
                    </span>
                </div>
            </div>

            {{-- Alert messages --}}
            @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 p-4 rounded-xl mb-6 text-sm font-medium flex items-center gap-3">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl mb-6 text-sm font-medium flex items-center gap-3">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ session('error') }}
            </div>
            @endif
            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl mb-6 text-sm font-medium">
                <p class="font-bold mb-2">Terdapat kesalahan:</p>
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- Tab navigation --}}
            <div class="flex gap-1 bg-white p-1 rounded-xl border border-slate-200 overflow-x-auto">
                <button @click="activeTab = 'biodata'" :class="activeTab === 'biodata' ? 'bg-primary text-white shadow-md' : 'text-neutral/60 hover:bg-slate-50'" class="px-4 py-2.5 rounded-lg text-xs font-bold uppercase tracking-wider transition-all whitespace-nowrap cursor-pointer">
                    Data Diri
                </button>
                <button @click="activeTab = 'alamat'" :class="activeTab === 'alamat' ? 'bg-primary text-white shadow-md' : 'text-neutral/60 hover:bg-slate-50'" class="px-4 py-2.5 rounded-lg text-xs font-bold uppercase tracking-wider transition-all whitespace-nowrap cursor-pointer">
                    Alamat
                </button>
                <button @click="activeTab = 'ortu'" :class="activeTab === 'ortu' ? 'bg-primary text-white shadow-md' : 'text-neutral/60 hover:bg-slate-50'" class="px-4 py-2.5 rounded-lg text-xs font-bold uppercase tracking-wider transition-all whitespace-nowrap cursor-pointer">
                    Orang Tua
                </button>
                <button @click="activeTab = 'jalur'" :class="activeTab === 'jalur' ? 'bg-primary text-white shadow-md' : 'text-neutral/60 hover:bg-slate-50'" class="px-4 py-2.5 rounded-lg text-xs font-bold uppercase tracking-wider transition-all whitespace-nowrap cursor-pointer">
                    Jalur & Nilai
                </button>
                <button @click="activeTab = 'berkas'" :class="activeTab === 'berkas' ? 'bg-primary text-white shadow-md' : 'text-neutral/60 hover:bg-slate-50'" class="px-4 py-2.5 rounded-lg text-xs font-bold uppercase tracking-wider transition-all whitespace-nowrap cursor-pointer">
                    Upload Berkas
                </button>
            </div>
        </div>

        {{-- Form --}}
        <form action="{{ route('ppdb.formulir.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            {{-- Tab: Biodata --}}
            <div x-show="activeTab === 'biodata'" x-transition class="ppdb-card p-6 md:p-8 mb-6">
                <h2 class="text-lg font-bold text-neutral mb-6 flex items-center gap-2">
                    <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Data Diri Calon Peserta Didik
                </h2>
                <div class="grid md:grid-cols-2 gap-5">
                    <div class="md:col-span-2">
                        <label class="ppdb-label">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="full_name" value="{{ old('full_name', $registrant->full_name) }}" class="ppdb-input" placeholder="Nama lengkap sesuai ijazah" required {{ $registrant->is_submitted ? 'disabled' : '' }}>
                    </div>
                    <div>
                        <label class="ppdb-label">NISN</label>
                        <input type="text" name="nisn" value="{{ old('nisn', $registrant->nisn) }}" class="ppdb-input" placeholder="10 digit NISN" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                    </div>
                    <div>
                        <label class="ppdb-label">NIK</label>
                        <input type="text" name="nik" value="{{ old('nik', $registrant->nik) }}" class="ppdb-input" placeholder="16 digit NIK" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                    </div>
                    <div>
                        <label class="ppdb-label">Jenis Kelamin <span class="text-red-500">*</span></label>
                        <select name="gender" class="ppdb-input" required {{ $registrant->is_submitted ? 'disabled' : '' }}>
                            <option value="L" {{ old('gender', $registrant->gender) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('gender', $registrant->gender) == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div>
                        <label class="ppdb-label">Agama</label>
                        <select name="religion" class="ppdb-input" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                            <option value="">Pilih Agama</option>
                            @foreach(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'] as $agama)
                            <option value="{{ $agama }}" {{ old('religion', $registrant->religion) == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="ppdb-label">Nomor KIP <span class="text-xs text-neutral/50 font-normal">(Kartu Indonesia Pintar)</span></label>
                        <input type="text" name="nomor_kip" value="{{ old('nomor_kip', $registrant->nomor_kip) }}" class="ppdb-input" placeholder="Isi jika memiliki" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                    </div>
                    <div>
                        <label class="ppdb-label">Tempat Lahir <span class="text-red-500">*</span></label>
                        <input type="text" name="birth_place" value="{{ old('birth_place', $registrant->birth_place) }}" class="ppdb-input" placeholder="Contoh: Selong" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                    </div>
                    <div>
                        <label class="ppdb-label">Tanggal Lahir <span class="text-red-500">*</span></label>
                        <input type="date" name="birth_date" value="{{ old('birth_date', $registrant->birth_date?->format('Y-m-d')) }}" class="ppdb-input" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                    </div>
                    <div>
                        <label class="ppdb-label">Asal Sekolah (MTs/SMP) <span class="text-red-500">*</span></label>
                        <input type="text" name="origin_school" value="{{ old('origin_school', $registrant->origin_school) }}" class="ppdb-input" placeholder="Nama sekolah asal" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                    </div>
                    <div>
                        <label class="ppdb-label">NPSN Sekolah Asal</label>
                        <input type="text" name="origin_school_npsn" value="{{ old('origin_school_npsn', $registrant->origin_school_npsn) }}" class="ppdb-input" placeholder="8 digit NPSN" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                    </div>
                    <div>
                        <label class="ppdb-label">No. HP / WhatsApp <span class="text-red-500">*</span></label>
                        <input type="tel" name="phone" value="{{ old('phone', $registrant->phone) }}" class="ppdb-input" placeholder="08xxxxxxxxxx" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                    </div>
                </div>
            </div>

            {{-- Tab: Alamat --}}
            <div x-show="activeTab === 'alamat'" x-transition class="ppdb-card p-6 md:p-8 mb-6">
                <h2 class="text-lg font-bold text-neutral mb-6 flex items-center gap-2">
                    <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Alamat Tempat Tinggal
                </h2>
                <div class="grid md:grid-cols-2 gap-5">
                    <div class="md:col-span-2">
                        <label class="ppdb-label">Alamat Lengkap <span class="text-red-500">*</span></label>
                        <textarea name="address" rows="3" class="ppdb-input" placeholder="Jalan, RT/RW, Dusun" {{ $registrant->is_submitted ? 'disabled' : '' }}>{{ old('address', $registrant->address) }}</textarea>
                    </div>
                    <div>
                        <label class="ppdb-label">Desa/Kelurahan</label>
                        <input type="text" name="village" value="{{ old('village', $registrant->village) }}" class="ppdb-input" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                    </div>
                    <div>
                        <label class="ppdb-label">Kecamatan</label>
                        <input type="text" name="district" value="{{ old('district', $registrant->district) }}" class="ppdb-input" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                    </div>
                    <div>
                        <label class="ppdb-label">Kabupaten/Kota</label>
                        <input type="text" name="city" value="{{ old('city', $registrant->city) }}" class="ppdb-input" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                    </div>
                    <div>
                        <label class="ppdb-label">Provinsi</label>
                        <input type="text" name="province" value="{{ old('province', $registrant->province) }}" class="ppdb-input" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                    </div>
                    <div>
                        <label class="ppdb-label">Kode Pos</label>
                        <input type="text" name="postal_code" value="{{ old('postal_code', $registrant->postal_code) }}" class="ppdb-input" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                    </div>
                </div>
            </div>

            {{-- Tab: Orang Tua --}}
            <div x-show="activeTab === 'ortu'" x-transition class="ppdb-card p-6 md:p-8 mb-6">
                <h2 class="text-lg font-bold text-neutral mb-6 flex items-center gap-2">
                    <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    Data Orang Tua / Wali
                </h2>
                
                {{-- Ayah --}}
                <div class="mb-8">
                    <h3 class="text-sm font-bold text-neutral/70 uppercase tracking-wider mb-4 pb-2 border-b border-slate-100">Data Ayah</h3>
                    <div class="grid md:grid-cols-2 gap-5 mb-5">
                        <div>
                            <label class="ppdb-label">Nama Ayah</label>
                            <input type="text" name="father_name" value="{{ old('father_name', $registrant->father_name) }}" class="ppdb-input" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                        </div>
                        <div>
                            <label class="ppdb-label">NIK Ayah</label>
                            <input type="text" name="father_nik" value="{{ old('father_nik', $registrant->father_nik) }}" class="ppdb-input" placeholder="16 digit NIK" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-5 mb-5">
                        <div>
                            <label class="ppdb-label">Pendidikan Ayah</label>
                            <select name="pendidikan_ayah" class="ppdb-input" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                                <option value="">Pilih Pendidikan</option>
                                @foreach(['Tidak Sekolah', 'SD/MI', 'SMP/MTs', 'SMK/SMA/MA', 'D1/D2/D3', 'S1', 'S2', 'S3'] as $edu)
                                <option value="{{ $edu }}" {{ old('pendidikan_ayah', $registrant->pendidikan_ayah) == $edu ? 'selected' : '' }}>{{ $edu }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="ppdb-label">Pekerjaan Ayah</label>
                            <input type="text" name="father_occupation" value="{{ old('father_occupation', $registrant->father_occupation) }}" class="ppdb-input" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-5">
                        <div>
                            <label class="ppdb-label">Penghasilan Ayah</label>
                            <select name="penghasilan_ayah" class="ppdb-input" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                                <option value="">Pilih Penghasilan</option>
                                @foreach(['-500rb', '500-1jt', '1jt-3jt', '3jt-5jt', '5jt-10jt', '10jt+'] as $inc)
                                <option value="{{ $inc }}" {{ old('penghasilan_ayah', $registrant->penghasilan_ayah) == $inc ? 'selected' : '' }}>{{ $inc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="ppdb-label">No. HP Ayah</label>
                            <input type="tel" name="father_phone" value="{{ old('father_phone', $registrant->father_phone) }}" class="ppdb-input" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                        </div>
                    </div>
                </div>

                {{-- Ibu --}}
                <div class="mb-8">
                    <h3 class="text-sm font-bold text-neutral/70 uppercase tracking-wider mb-4 pb-2 border-b border-slate-100">Data Ibu</h3>
                    <div class="grid md:grid-cols-2 gap-5 mb-5">
                        <div>
                            <label class="ppdb-label">Nama Ibu</label>
                            <input type="text" name="mother_name" value="{{ old('mother_name', $registrant->mother_name) }}" class="ppdb-input" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                        </div>
                        <div>
                            <label class="ppdb-label">NIK Ibu</label>
                            <input type="text" name="mother_nik" value="{{ old('mother_nik', $registrant->mother_nik) }}" class="ppdb-input" placeholder="16 digit NIK" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-5 mb-5">
                        <div>
                            <label class="ppdb-label">Pendidikan Ibu</label>
                            <select name="pendidikan_ibu" class="ppdb-input" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                                <option value="">Pilih Pendidikan</option>
                                @foreach(['Tidak Sekolah', 'SD/MI', 'SMP/MTs', 'SMK/SMA/MA', 'D1/D2/D3', 'S1', 'S2', 'S3'] as $edu)
                                <option value="{{ $edu }}" {{ old('pendidikan_ibu', $registrant->pendidikan_ibu) == $edu ? 'selected' : '' }}>{{ $edu }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="ppdb-label">Pekerjaan Ibu</label>
                            <input type="text" name="mother_occupation" value="{{ old('mother_occupation', $registrant->mother_occupation) }}" class="ppdb-input" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-5">
                        <div>
                            <label class="ppdb-label">Penghasilan Ibu</label>
                            <select name="penghasilan_ibu" class="ppdb-input" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                                <option value="">Pilih Penghasilan</option>
                                @foreach(['-500rb', '500-1jt', '1jt-3jt', '3jt-5jt', '5jt-10jt', '10jt+'] as $inc)
                                <option value="{{ $inc }}" {{ old('penghasilan_ibu', $registrant->penghasilan_ibu) == $inc ? 'selected' : '' }}>{{ $inc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="ppdb-label">No. HP Ibu</label>
                            <input type="tel" name="mother_phone" value="{{ old('mother_phone', $registrant->mother_phone) }}" class="ppdb-input" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                        </div>
                    </div>
                </div>

                {{-- Wali --}}
                <div>
                    <h3 class="text-sm font-bold text-neutral/70 uppercase tracking-wider mb-4 pb-2 border-b border-slate-100">Data Wali (Opsional)</h3>
                    <div class="grid md:grid-cols-3 gap-5">
                        <div>
                            <label class="ppdb-label">Nama Wali</label>
                            <input type="text" name="guardian_name" value="{{ old('guardian_name', $registrant->guardian_name) }}" class="ppdb-input" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                        </div>
                        <div>
                            <label class="ppdb-label">NIK Wali</label>
                            <input type="text" name="guardian_nik" value="{{ old('guardian_nik', $registrant->guardian_nik) }}" class="ppdb-input" placeholder="16 digit NIK" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                        </div>
                        <div>
                            <label class="ppdb-label">No. HP Wali</label>
                            <input type="tel" name="guardian_phone" value="{{ old('guardian_phone', $registrant->guardian_phone) }}" class="ppdb-input" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tab: Jalur & Nilai --}}
            <div x-show="activeTab === 'jalur'" x-transition class="ppdb-card p-6 md:p-8 mb-6" x-data="{ jalur: '{{ old('jalur', $registrant->jalur ?: 'reguler') }}' }">
                <h2 class="text-lg font-bold text-neutral mb-6 flex items-center gap-2">
                    <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                    Jalur Pendaftaran & Nilai
                </h2>

                <div class="mb-6">
                    <label class="ppdb-label">Jalur Pendaftaran <span class="text-red-500">*</span></label>
                    <div class="grid md:grid-cols-2 gap-4">
                        <label class="flex items-center gap-3 p-4 rounded-xl border-2 cursor-pointer transition-all" :class="jalur === 'prestasi' ? 'border-primary bg-primary-light' : 'border-slate-200 hover:border-slate-300'">
                            <input type="radio" name="jalur" value="prestasi" x-model="jalur" class="text-primary focus:ring-primary" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                            <div>
                                <span class="font-bold text-sm text-neutral block">Jalur Prestasi</span>
                                <span class="text-xs text-neutral/50">Nilai rata-rata minimal 85</span>
                            </div>
                        </label>
                        <label class="flex items-center gap-3 p-4 rounded-xl border-2 cursor-pointer transition-all" :class="jalur === 'reguler' ? 'border-primary bg-primary-light' : 'border-slate-200 hover:border-slate-300'">
                            <input type="radio" name="jalur" value="reguler" x-model="jalur" class="text-primary focus:ring-primary" {{ $registrant->is_submitted ? 'disabled' : '' }}>
                            <div>
                                <span class="font-bold text-sm text-neutral block">Jalur Reguler</span>
                                <span class="text-xs text-neutral/50">Pendaftaran umum</span>
                            </div>
                        </label>
                    </div>
                </div>

                {{-- Nilai Raport (shown for Jalur Prestasi) --}}
                <div x-show="jalur === 'prestasi'" x-transition>
                    <div class="bg-secondary/5 border border-secondary/20 p-4 rounded-xl mb-6 text-sm text-neutral/70">
                        <p class="font-bold text-neutral mb-1">📝 Petunjuk Pengisian Nilai</p>
                        <p>Masukkan nilai rata-rata raport semester 3 s/d 5 untuk mata pelajaran berikut. Nilai rata-rata minimal <strong>85</strong>.</p>
                    </div>

                    @php
                        $subjects = [
                            ['key' => 'mtk', 'label' => 'Matematika'],
                            ['key' => 'ipa', 'label' => 'IPA'],
                            ['key' => 'ips', 'label' => 'IPS'],
                            ['key' => 'eng', 'label' => 'B. Inggris'],
                            ['key' => 'pai', 'label' => 'PAI'],
                        ];
                    @endphp

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="bg-slate-50">
                                    <th class="text-left p-3 rounded-tl-xl font-bold text-xs uppercase tracking-wider text-neutral/60">Mata Pelajaran</th>
                                    <th class="text-center p-3 font-bold text-xs uppercase tracking-wider text-neutral/60">Semester 3</th>
                                    <th class="text-center p-3 font-bold text-xs uppercase tracking-wider text-neutral/60">Semester 4</th>
                                    <th class="text-center p-3 rounded-tr-xl font-bold text-xs uppercase tracking-wider text-neutral/60">Semester 5</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subjects as $subject)
                                <tr class="border-b border-slate-100">
                                    <td class="p-3 font-semibold text-neutral">{{ $subject['label'] }}</td>
                                    @for($sem = 3; $sem <= 5; $sem++)
                                    <td class="p-2">
                                        <input type="number" step="0.01" min="0" max="100" 
                                               name="nilai_{{ $subject['key'] }}_{{ $sem }}" 
                                               value="{{ old('nilai_'.$subject['key'].'_'.$sem, $registrant->{'nilai_'.$subject['key'].'_'.$sem}) }}"
                                               class="ppdb-input" style="text-align:center;padding-top:0.5rem;padding-bottom:0.5rem" placeholder="0"
                                               {{ $registrant->is_submitted ? 'disabled' : '' }}>
                                    </td>
                                    @endfor
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Tab: Upload Berkas --}}
            <div x-show="activeTab === 'berkas'" x-transition class="ppdb-card p-6 md:p-8 mb-6">
                <h2 class="text-lg font-bold text-neutral mb-6 flex items-center gap-2">
                    <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                    Upload Berkas Persyaratan
                </h2>

                <div class="bg-blue-50 border border-blue-200 p-4 rounded-xl mb-6 text-sm text-blue-700">
                    <p><strong>Format file:</strong> JPG, PNG, atau PDF. Maksimal <strong>2MB</strong> untuk foto, <strong>5MB</strong> untuk dokumen lainnya.</p>
                </div>

                @php
                    $fileFields = [
                        ['name' => 'photo', 'label' => 'Pas Foto (3x4)', 'desc' => 'Latar biru/merah, format JPG/PNG', 'current' => $registrant->photo],
                        ['name' => 'ijazah_file', 'label' => 'Fotokopi Ijazah / SKL', 'desc' => 'Yang telah dilegalisir', 'current' => $registrant->ijazah_file],
                        ['name' => 'kk_file', 'label' => 'Fotokopi Kartu Keluarga', 'desc' => 'Scan atau foto KK', 'current' => $registrant->kk_file],
                        ['name' => 'akta_file', 'label' => 'Fotokopi Akta Kelahiran', 'desc' => 'Scan atau foto akta', 'current' => $registrant->akta_file],
                        ['name' => 'raport_file', 'label' => 'Fotokopi Raport Sem. 3-5', 'desc' => 'Yang telah dilegalisir', 'current' => $registrant->raport_file],
                        ['name' => 'prestasi_file', 'label' => 'Sertifikat Prestasi', 'desc' => 'Opsional, min. tingkat kabupaten', 'current' => $registrant->prestasi_file],
                    ];
                @endphp

                <div class="grid md:grid-cols-2 gap-5">
                    @foreach($fileFields as $field)
                    <div class="border border-slate-200 rounded-xl p-4 hover:border-primary/30 transition-colors">
                        <label class="ppdb-label">{{ $field['label'] }}</label>
                        <p class="text-xs text-neutral/40 mb-3">{{ $field['desc'] }}</p>
                        @if($field['current'])
                        <div class="flex items-center gap-2 bg-green-50 text-green-700 p-2 rounded-lg mb-3 text-xs font-medium">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            File sudah diupload
                            <a href="{{ asset('storage/' . $field['current']) }}" target="_blank" class="underline ml-auto">Lihat</a>
                        </div>
                        @endif
                        @if(!$registrant->is_submitted)
                        <input type="file" name="{{ $field['name'] }}" class="w-full text-xs text-neutral/60 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 file:cursor-pointer cursor-pointer" accept=".jpg,.jpeg,.png,.pdf">
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Action buttons --}}
            @if(!$registrant->is_submitted)
            <div class="flex flex-col sm:flex-row items-center gap-4 mt-8">
                <button type="submit" class="ppdb-btn w-full sm:w-auto px-10 py-4 text-sm uppercase tracking-widest shadow-lg shadow-primary/20">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/></svg>
                    Simpan Data
                </button>
            </div>
            @endif
        </form>

        {{-- Submit final --}}
        @if(!$registrant->is_submitted)
        <div class="mt-6 ppdb-card p-6 md:p-8 border-2 border-primary/20">
            <div class="flex flex-col md:flex-row items-center gap-6">
                <div class="flex-1">
                    <h3 class="text-lg font-bold text-neutral mb-2">Kirim Formulir Pendaftaran</h3>
                    <p class="text-sm text-neutral/50">Pastikan semua data sudah benar dan lengkap. Setelah dikirim, data <strong>tidak dapat diubah lagi</strong>.</p>
                </div>
                <form action="{{ route('ppdb.formulir.submit') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mengirim formulir? Data tidak bisa diubah setelah dikirim.')">
                    @csrf
                    <button type="submit" class="bg-secondary text-neutral px-8 py-4 rounded-xl font-bold text-sm shadow-lg hover:shadow-xl transition-all uppercase tracking-wider whitespace-nowrap cursor-pointer">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        Kirim Formulir
                    </button>
                </form>
            </div>
        </div>
        @else
        <div class="mt-6 ppdb-card p-6 md:p-8 border-2 border-green-200 bg-green-50">
            <div class="text-center">
                <div class="text-4xl mb-4">✅</div>
                <h3 class="text-lg font-bold text-green-700 mb-2">Formulir Telah Dikirim</h3>
                <p class="text-sm text-green-600 mb-4">Data Anda sedang diverifikasi oleh panitia. Silakan cetak bukti pendaftaran dan kartu peserta.</p>
                <div class="flex items-center justify-center gap-4">
                    <a href="{{ route('ppdb.print.bukti') }}" class="ppdb-btn" style="background-color:#16a34a;font-size:0.875rem">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                        Cetak Bukti
                    </a>
                    <a href="{{ route('ppdb.print.kartu') }}" class="ppdb-btn text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/></svg>
                        Cetak Kartu
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
