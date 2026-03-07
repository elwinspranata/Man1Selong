@extends('ppdb.layout')

@section('title', 'Informasi PPDB — ' . ($school_setting->school_name ?: 'MAN 1 Lombok Timur'))

@section('content')
{{-- Hero --}}
<section class="relative pt-20 pb-16 bg-gradient-to-br from-primary via-primary-dark to-accent overflow-hidden">
    <div class="absolute inset-0 opacity-5 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
    <div class="relative z-10 max-w-4xl mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-3">Informasi Pendaftaran</h1>
        <p class="text-white/70 text-sm font-medium">Syarat, waktu, dan tata cara pendaftaran peserta didik baru</p>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4">

        {{-- Syarat Pendaftaran --}}
        <div class="mb-16">
            <h2 class="text-2xl font-extrabold text-neutral mb-8 flex items-center gap-3">
                <span class="w-10 h-10 bg-primary-light rounded-xl flex items-center justify-center text-primary text-xl">📋</span>
                Syarat Pendaftaran
            </h2>

            {{-- Jalur Prestasi --}}
            <div class="ppdb-card p-6 md:p-8 mb-6">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-secondary/10 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-neutral">Jalur Prestasi</h3>
                </div>
                <ol class="space-y-3 text-sm text-neutral/70 list-decimal list-inside leading-relaxed">
                    <li>Memiliki nilai rata-rata minimal <strong class="text-neutral">85</strong> untuk mata pelajaran Matematika, IPA, IPS, Bahasa Inggris pada semester 3 s.d 5</li>
                    <li>Meraih juara 1, 2, dan 3 pada lomba KSM, OSK, OSP, OSN, OPSI, LKIR, Seni dan Olahraga pada tingkat Kabupaten, Provinsi, dan Nasional</li>
                    <li>Mengisi formulir pendaftaran secara online melalui website PPDB</li>
                    <li>Melampirkan fotokopi sertifikat lomba minimal tingkat kabupaten yang dilegalisir oleh kepala sekolah/madrasah</li>
                    <li>Mencetak formulir dan bukti pendaftaran kemudian diserahkan kepada panitia untuk dilakukan verifikasi</li>
                    <li>Jika nilai rata-rata tidak memenuhi persyaratan, calon peserta dapat melampirkan sertifikat juara lomba minimal tingkat kabupaten</li>
                    <li>Melampirkan fotokopi raport semester III s.d V yang telah dilegalisir sekolah/madrasah</li>
                    <li>Jika Tahfiz agar melampirkan sertifikat atau surat keterangan menghafal minimal 5 Juz</li>
                    <li>Menyerahkan fotokopi akreditasi sekolah</li>
                    <li>Melampirkan Pas Photo 3x4 sebanyak 2 lembar</li>
                    <li>Seluruh persyaratan dimasukkan dalam <strong class="text-neutral">MAP warna Hijau (MTs)</strong> dan <strong class="text-neutral">Merah (SMP)</strong></li>
                    <li>Peserta dinyatakan gugur apabila tidak lulus dari satuan pendidikan</li>
                </ol>
            </div>

            {{-- Jalur Reguler --}}
            <div class="ppdb-card p-6 md:p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-neutral">Jalur Reguler</h3>
                </div>
                <ol class="space-y-3 text-sm text-neutral/70 list-decimal list-inside leading-relaxed">
                    <li>Mengisi formulir pendaftaran secara online melalui website PPDB</li>
                    <li>Usia maksimum <strong class="text-neutral">18 tahun</strong> pada bulan Juni 2026</li>
                    <li>Memiliki ijazah MTs/SMP</li>
                    <li>Melampirkan fotokopi ijazah dan tanda lulus/SHUN yang dilegalisir</li>
                    <li>Melampirkan Surat Keterangan telah mengikuti Ujian Akhir yang ditandatangani Kepala Sekolah</li>
                    <li>Melampirkan fotokopi Nilai Raport Semester I s.d V yang telah dilegalisir</li>
                    <li>Melampirkan pas foto 3x4 sebanyak 2 lembar</li>
                    <li>Melampirkan Sertifikat/Piagam penghargaan prestasi lomba (jika ada)</li>
                    <li>Mencetak bukti pendaftaran dan dikumpulkan ke panitia</li>
                    <li>Seluruh persyaratan dimasukkan dalam <strong class="text-neutral">MAP warna Hijau (MTs)</strong> dan <strong class="text-neutral">Merah (SMP)</strong></li>
                </ol>
            </div>
        </div>

        {{-- Waktu & Tempat --}}
        <div class="mb-16">
            <h2 class="text-2xl font-extrabold text-neutral mb-8 flex items-center gap-3">
                <span class="w-10 h-10 bg-primary-light rounded-xl flex items-center justify-center text-primary text-xl">📅</span>
                Waktu dan Tempat Pendaftaran
            </h2>

            <div class="grid md:grid-cols-2 gap-6">
                {{-- Jalur Prestasi --}}
                <div class="ppdb-card p-6 border-t-4 border-t-secondary">
                    <h3 class="text-lg font-bold text-neutral mb-4">Jalur Prestasi</h3>
                    <div class="space-y-4 text-sm">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-secondary/10 rounded-lg flex items-center justify-center text-xs font-bold text-secondary shrink-0">1</div>
                            <div>
                                <p class="font-bold text-neutral">Pendaftaran & Konfirmasi</p>
                                <p class="text-neutral/60">2 Maret 2026 s/d 12 Maret 2026</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-secondary/10 rounded-lg flex items-center justify-center text-xs font-bold text-secondary shrink-0">2</div>
                            <div>
                                <p class="font-bold text-neutral">Tes Ibadah & Baca Al-Qur'an</p>
                                <p class="text-neutral/60">4 Maret 2026 s/d 14 Maret 2026</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-secondary/10 rounded-lg flex items-center justify-center text-xs font-bold text-secondary shrink-0">3</div>
                            <div>
                                <p class="font-bold text-neutral">Pengumuman</p>
                                <p class="text-neutral/60">18 Maret 2026</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 p-3 bg-slate-50 rounded-lg text-xs text-neutral/50">
                        <p><strong>Waktu pelayanan:</strong></p>
                        <p>Senin - Kamis: 08.00 - 14.00 WITA</p>
                        <p>Jumat: 08.00 - 11.00 WITA</p>
                        <p>Sabtu: 08.00 - 14.00 WITA</p>
                    </div>
                </div>

                {{-- Jalur Reguler --}}
                <div class="ppdb-card p-6 border-t-4 border-t-primary">
                    <h3 class="text-lg font-bold text-neutral mb-4">Jalur Reguler</h3>
                    <div class="space-y-4 text-sm">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center text-xs font-bold text-primary shrink-0">1</div>
                            <div>
                                <p class="font-bold text-neutral">Pendaftaran Online</p>
                                <p class="text-neutral/60">4 Mei 2026 s/d 9 Mei 2026</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center text-xs font-bold text-primary shrink-0">2</div>
                            <div>
                                <p class="font-bold text-neutral">Tes Ibadah & Baca Al-Qur'an</p>
                                <p class="text-neutral/60">6 Mei 2026 s/d 12 Mei 2026</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center text-xs font-bold text-primary shrink-0">3</div>
                            <div>
                                <p class="font-bold text-neutral">Tes Potensi Akademik</p>
                                <p class="text-neutral/60">13 Mei 2026</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center text-xs font-bold text-primary shrink-0">4</div>
                            <div>
                                <p class="font-bold text-neutral">Pengumuman</p>
                                <p class="text-neutral/60">16 Mei 2026</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kontak Panitia --}}
        <div class="ppdb-card p-6 md:p-8 text-center">
            <h2 class="text-xl font-bold text-neutral mb-4">Kontak Panitia PPDB</h2>
            <p class="text-sm text-neutral/50 mb-6">Untuk informasi lebih lanjut, silakan hubungi panitia:</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                @if($school_setting->phone)
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $school_setting->phone) }}" target="_blank" class="ppdb-btn" style="background-color:#16a34a;font-size:0.875rem">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    WhatsApp Panitia
                </a>
                @endif
                <a href="{{ route('ppdb.daftar') }}" class="ppdb-btn text-sm">
                    Mulai Pendaftaran
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
