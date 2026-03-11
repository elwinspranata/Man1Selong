

<?php $__env->startSection('title', 'Detail Pendaftar - ' . $registrant->full_name); ?>
<?php $__env->startSection('page_title', 'Detail Pendaftar'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-5xl mx-auto space-y-8">
    <div class="flex items-center justify-between">
        <a href="<?php echo e(route('admin.ppdb.registrants.index')); ?>" class="inline-flex items-center gap-2 text-slate-400 hover:text-emerald-600 font-bold text-sm transition-all group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Daftar
        </a>
        <button onclick="window.print()" class="px-6 py-2 bg-slate-100 text-slate-600 font-bold rounded-xl hover:bg-slate-200 transition-all flex items-center gap-2 print:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
            </svg>
            Cetak Detail
        </button>
    </div>

    <?php if(session('success')): ?>
        <div class="p-4 bg-emerald-50 border-l-4 border-emerald-500 rounded-r-2xl text-emerald-800 font-bold flex items-center gap-3 shadow-sm print:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-200 overflow-hidden divide-y divide-slate-100 print:shadow-none print:border-none">
        
        <!-- Header Info -->
        <div class="p-10 bg-slate-50/50">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="flex items-center gap-6">
                    <div class="w-24 h-24 rounded-[2rem] bg-emerald-600 flex items-center justify-center text-white shadow-lg shadow-emerald-500/20 overflow-hidden">
                        <?php if($registrant->photo): ?>
                            <img src="<?php echo e(asset('storage/' . $registrant->photo)); ?>" alt="Foto" class="w-full h-full object-cover">
                        <?php else: ?>
                            <span class="text-3xl font-black"><?php echo e(strtoupper(substr($registrant->full_name, 0, 1))); ?></span>
                        <?php endif; ?>
                    </div>
                    <div>
                        <div class="flex items-center gap-3 mb-1">
                            <span class="px-3 py-1 bg-slate-200 text-slate-700 rounded-lg text-xs font-black tracking-tight"><?php echo e($registrant->registration_number); ?></span>
                            <span class="px-3 py-1 bg-<?php echo e($registrant->status_color); ?>-100 text-<?php echo e($registrant->status_color); ?>-700 rounded-lg text-xs font-black tracking-tight uppercase"><?php echo e(collect($registrant->status_label)->first() ?? $registrant->status_label); ?></span>
                        </div>
                        <h3 class="text-3xl font-black text-slate-900 tracking-tight"><?php echo e($registrant->full_name); ?></h3>
                        <p class="font-bold text-slate-500 mt-1">Jalur: <span class="capitalize"><?php echo e($registrant->jalur); ?></span> • NISN: <?php echo e($registrant->nisn); ?></p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Waktu Mendaftar</p>
                    <p class="font-black text-slate-800"><?php echo e($registrant->created_at->format('d F Y, H:i')); ?></p>
                </div>
            </div>
        </div>

        <!-- Verification Form (Admin Only, Not in Print) -->
        <div class="p-10 bg-yellow-50/50 print:hidden">
            <h4 class="text-lg font-black text-slate-800 mb-6 flex items-center gap-3">
                <span class="w-1.5 h-6 bg-yellow-500 rounded-full"></span>
                Verifikasi Pendaftaran
            </h4>
            
            <form action="<?php echo e(route('admin.ppdb.registrants.verify', $registrant)); ?>" method="POST" class="bg-white p-6 rounded-2xl border border-yellow-200 shadow-sm">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-600 ml-1">Ubah Status</label>
                        <select name="status" class="w-full px-4 py-3 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-xl outline-none transition-all font-bold text-slate-700">
                            <option value="draft" <?php echo e($registrant->status == 'draft' ? 'selected' : ''); ?>>Draft (Belum Selesai)</option>
                            <option value="pending" <?php echo e($registrant->status == 'pending' ? 'selected' : ''); ?>>Menunggu Verifikasi</option>
                            <option value="verified" <?php echo e($registrant->status == 'verified' ? 'selected' : ''); ?>>Terverifikasi (Lulus Berkas)</option>
                            <option value="accepted" <?php echo e($registrant->status == 'accepted' ? 'selected' : ''); ?>>Diterima (Lulus Final)</option>
                            <option value="rejected" <?php echo e($registrant->status == 'rejected' ? 'selected' : ''); ?>>Ditolak / Tidak Lulus</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-600 ml-1">Catatan Verifikator (Opsional)</label>
                        <input type="text" name="notes" value="<?php echo e(old('notes', $registrant->notes)); ?>" placeholder="Contoh: Berkas KK Buram, harap upload ulang" class="w-full px-4 py-3 bg-slate-50 border-2 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/5 rounded-xl outline-none transition-all font-medium">
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button type="submit" class="px-8 py-3 bg-slate-800 text-white font-black rounded-xl hover:bg-slate-900 transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                        Simpan Verifikasi
                    </button>
                </div>
            </form>
        </div>

        <!-- Data Grid -->
        <div class="p-10">
            <h4 class="text-lg font-black text-slate-800 mb-8 flex items-center gap-3">
                <span class="w-1.5 h-6 bg-emerald-500 rounded-full"></span>
                Informasi Personal Calon Siswa
            </h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-10">
                <div class="space-y-1 pb-4 border-b border-slate-100">
                    <p class="text-xs font-black text-slate-400 uppercase tracking-widest">NIK</p>
                    <p class="font-bold text-slate-700"><?php echo e($registrant->nik ?? '-'); ?></p>
                </div>
                <div class="space-y-1 pb-4 border-b border-slate-100">
                    <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Jenis Kelamin</p>
                    <p class="font-bold text-slate-700 capitalize"><?php echo e($registrant->gender == 'L' ? 'Laki-laki' : 'Perempuan'); ?></p>
                </div>
                <div class="space-y-1 pb-4 border-b border-slate-100">
                    <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Agama</p>
                    <p class="font-bold text-slate-700"><?php echo e($registrant->religion ?? '-'); ?></p>
                </div>
                <div class="space-y-1 pb-4 border-b border-slate-100">
                    <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Tempat, Tanggal Lahir</p>
                    <p class="font-bold text-slate-700"><?php echo e($registrant->birth_place ?? '-'); ?>, <?php echo e($registrant->birth_date ? \Carbon\Carbon::parse($registrant->birth_date)->format('d-m-Y') : '-'); ?></p>
                </div>
                <div class="space-y-1 pb-4 border-b border-slate-100">
                    <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Asal Sekolah</p>
                    <p class="font-bold text-slate-700"><?php echo e($registrant->origin_school ?? '-'); ?> (NPSN: <?php echo e($registrant->origin_school_npsn ?? '-'); ?>)</p>
                </div>
                <div class="space-y-1 pb-4 border-b border-slate-100">
                    <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Email</p>
                    <p class="font-bold text-slate-700"><?php echo e($registrant->email); ?></p>
                </div>
                <div class="space-y-1 pb-4 border-b border-slate-100">
                    <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Nomor HP / WhatsApp</p>
                    <p class="font-bold text-slate-700"><?php echo e($registrant->phone ?? '-'); ?></p>
                </div>
                <div class="space-y-1 pb-4 border-b border-slate-100">
                    <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Alamat Lengkap (Prov, Kota, Kec, Desa)</p>
                    <p class="font-bold text-slate-700 leading-relaxed"><?php echo e($registrant->address ?? '-'); ?><br>
                    <span class="text-sm text-slate-500 font-medium">Kab/Kota: <?php echo e($registrant->city ?? '-'); ?>, Prov: <?php echo e($registrant->province ?? '-'); ?> - <?php echo e($registrant->postal_code ?? ''); ?></span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Parent Info -->
        <div class="p-10">
            <h4 class="text-lg font-black text-slate-800 mb-8 flex items-center gap-3">
                <span class="w-1.5 h-6 bg-blue-500 rounded-full"></span>
                Informasi Orang Tua / Wali
            </h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-10">
                <div class="space-y-1 pb-4 border-b border-slate-100">
                    <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Nama Ayah</p>
                    <p class="font-bold text-slate-700"><?php echo e($registrant->father_name ?? '-'); ?></p>
                    <p class="text-sm text-slate-500"><?php echo e($registrant->father_occupation ?? '-'); ?> (HP: <?php echo e($registrant->father_phone ?? '-'); ?>)</p>
                </div>
                <div class="space-y-1 pb-4 border-b border-slate-100">
                    <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Nama Ibu</p>
                    <p class="font-bold text-slate-700"><?php echo e($registrant->mother_name ?? '-'); ?></p>
                    <p class="text-sm text-slate-500"><?php echo e($registrant->mother_occupation ?? '-'); ?> (HP: <?php echo e($registrant->mother_phone ?? '-'); ?>)</p>
                </div>
                <div class="space-y-1 pb-4 border-b border-slate-100">
                    <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Nama Wali (Opsional)</p>
                    <p class="font-bold text-slate-700"><?php echo e($registrant->guardian_name ?? '-'); ?></p>
                    <p class="text-sm text-slate-500">HP: <?php echo e($registrant->guardian_phone ?? '-'); ?></p>
                </div>
            </div>
        </div>

        <!-- Semester Grades -->
        <div class="p-10 border-t border-slate-100">
            <h4 class="text-lg font-black text-slate-800 mb-6 flex items-center gap-3">
                <span class="w-1.5 h-6 bg-indigo-500 rounded-full"></span>
                Nilai Rapor Semester 3, 4, dan 5
            </h4>
            
            <?php
                $grades = [
                    $registrant->nilai_mtk_3, $registrant->nilai_mtk_4, $registrant->nilai_mtk_5,
                    $registrant->nilai_ipa_3, $registrant->nilai_ipa_4, $registrant->nilai_ipa_5,
                    $registrant->nilai_ips_3, $registrant->nilai_ips_4, $registrant->nilai_ips_5,
                    $registrant->nilai_eng_3, $registrant->nilai_eng_4, $registrant->nilai_eng_5,
                ];
                $validGradesCount = count(array_filter($grades, 'is_numeric'));
                $totalGrades = array_sum(array_filter($grades, 'is_numeric'));
                $averageGrade = $validGradesCount > 0 ? $totalGrades / $validGradesCount : 0;
            ?>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-sm">
                    <thead class="bg-slate-50 text-slate-700 font-black uppercase text-xs tracking-wider border-b border-slate-200">
                        <tr>
                            <th class="px-6 py-4">Mata Pelajaran</th>
                            <th class="px-6 py-4 text-center">Semester 3</th>
                            <th class="px-6 py-4 text-center">Semester 4</th>
                            <th class="px-6 py-4 text-center">Semester 5</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium">
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4 font-bold text-slate-800 pl-6">Matematika</td>
                            <td class="px-6 py-4 text-center"><?php echo e($registrant->nilai_mtk_3 ?? '-'); ?></td>
                            <td class="px-6 py-4 text-center"><?php echo e($registrant->nilai_mtk_4 ?? '-'); ?></td>
                            <td class="px-6 py-4 text-center"><?php echo e($registrant->nilai_mtk_5 ?? '-'); ?></td>
                        </tr>
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4 font-bold text-slate-800 pl-6">Ilmu Pengetahuan Alam (IPA)</td>
                            <td class="px-6 py-4 text-center"><?php echo e($registrant->nilai_ipa_3 ?? '-'); ?></td>
                            <td class="px-6 py-4 text-center"><?php echo e($registrant->nilai_ipa_4 ?? '-'); ?></td>
                            <td class="px-6 py-4 text-center"><?php echo e($registrant->nilai_ipa_5 ?? '-'); ?></td>
                        </tr>
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4 font-bold text-slate-800 pl-6">Ilmu Pengetahuan Sosial (IPS)</td>
                            <td class="px-6 py-4 text-center"><?php echo e($registrant->nilai_ips_3 ?? '-'); ?></td>
                            <td class="px-6 py-4 text-center"><?php echo e($registrant->nilai_ips_4 ?? '-'); ?></td>
                            <td class="px-6 py-4 text-center"><?php echo e($registrant->nilai_ips_5 ?? '-'); ?></td>
                        </tr>
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4 font-bold text-slate-800 pl-6">Bahasa Inggris</td>
                            <td class="px-6 py-4 text-center"><?php echo e($registrant->nilai_eng_3 ?? '-'); ?></td>
                            <td class="px-6 py-4 text-center"><?php echo e($registrant->nilai_eng_4 ?? '-'); ?></td>
                            <td class="px-6 py-4 text-center"><?php echo e($registrant->nilai_eng_5 ?? '-'); ?></td>
                        </tr>
                    </tbody>
                    <tfoot class="bg-indigo-50 border-t border-indigo-100">
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-right font-black text-indigo-900 uppercase text-xs tracking-wider">Rata-Rata Keseluruhan:</td>
                            <td class="px-6 py-4 text-center font-black text-indigo-700 text-lg"><?php echo e(number_format($averageGrade, 2)); ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <!-- Documents / Downloads -->
        <div class="p-10">
            <h4 class="text-lg font-black text-slate-800 mb-8 flex items-center gap-3">
                <span class="w-1.5 h-6 bg-purple-500 rounded-full"></span>
                Unduh Berkas Pendaftaran
            </h4>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 print:hidden">
                
                <?php
                    $files = [
                        'Kartu Keluarga (KK)' => $registrant->kk_file,
                        'Ijazah / SKL' => $registrant->ijazah_file,
                        'Akta Kelahiran' => $registrant->akta_file,
                        'Dokumen Raport' => $registrant->raport_file,
                        'Sertifikat Prestasi' => $registrant->prestasi_file,
                    ];
                ?>

                <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center justify-between p-4 bg-slate-50 border border-slate-200 rounded-2xl">
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                            <div>
                                <p class="font-bold text-slate-800"><?php echo e($label); ?></p>
                                <p class="text-xs font-medium text-slate-500">
                                    <?php echo e($path ? 'Berkas Diunggah' : 'Tidak Ada Berkas'); ?>

                                </p>
                            </div>
                        </div>
                        <?php if($path): ?>
                            <a href="<?php echo e(asset('storage/' . $path)); ?>" target="_blank" download class="p-2 bg-white text-emerald-600 border border-emerald-100 rounded-xl hover:bg-emerald-50 hover:border-emerald-200 transition-all font-bold text-sm shadow-sm flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            <!-- Print only layout for missing files -->
            <div class="hidden print:block text-slate-600 text-sm mt-4">
                <p>Status Kelengkapan Berkas:</p>
                <ul class="list-disc pl-5 mt-2">
                    <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($label); ?>: <strong><?php echo e($path ? 'Ada' : 'Kosong'); ?></strong></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\man1selong\resources\views/admin/ppdb/registrants/show.blade.php ENDPATH**/ ?>