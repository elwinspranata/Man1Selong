

<?php $__env->startSection('title', 'Prestasi Sekolah'); ?>
<?php $__env->startSection('page_title', 'Manajemen Prestasi'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-2xl font-black text-slate-800 tracking-tight">Daftar Prestasi</h3>
            <p class="text-slate-500 font-medium">Dokumentasikan pencapaian gemilang siswa dan sekolah.</p>
        </div>
        <a href="<?php echo e(route('admin.achievements.create')); ?>" class="px-8 py-4 bg-emerald-600 text-white font-black rounded-2xl shadow-lg hover:shadow-emerald-500/20 hover:-translate-y-1 transition-all flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Tambah Prestasi Baru
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="p-4 bg-emerald-50 border-l-4 border-emerald-500 rounded-r-2xl text-emerald-800 font-bold flex items-center gap-3 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        <?php $__empty_1 = true; $__currentLoopData = $achievements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $achievement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-slate-200 group hover:border-emerald-500 hover:shadow-xl hover:shadow-emerald-500/5 transition-all duration-500 h-full flex flex-col">
            <div class="flex items-start justify-between mb-6">
                <div class="w-16 h-16 rounded-2xl bg-emerald-50 flex items-center justify-center text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-500">
                    <?php if($achievement->icon): ?>
                        <img src="<?php echo e(asset('storage/' . $achievement->icon)); ?>" class="w-10 h-10 object-contain">
                    <?php else: ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    <?php endif; ?>
                </div>
                <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <a href="<?php echo e(route('admin.achievements.edit', $achievement)); ?>" class="p-2 bg-slate-50 text-slate-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <form action="<?php echo e(route('admin.achievements.destroy', $achievement)); ?>" method="POST" onsubmit="return confirm('Hapus data prestasi ini?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="p-2 bg-slate-50 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-xl transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="mb-4">
                <p class="text-[0.65rem] font-black text-emerald-600 uppercase tracking-widest mb-1"><?php echo e($achievement->rank ?: 'Juara'); ?> - <?php echo e($achievement->year); ?></p>
                <h4 class="text-xl font-black text-slate-900 leading-tight"><?php echo e($achievement->title); ?></h4>
            </div>
            
            <p class="text-slate-500 font-medium text-sm leading-relaxed flex-grow">
                <?php echo e(\Illuminate\Support\Str::limit($achievement->description, 100)); ?>

            </p>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="md:col-span-2 xl:col-span-3 py-20 text-center bg-white rounded-[2.5rem] border border-dashed border-slate-200">
            <div class="flex flex-col items-center gap-4">
                <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                    </svg>
                </div>
                <p class="font-bold text-slate-400">Belum ada data prestasi diunggah.</p>
                <a href="<?php echo e(route('admin.achievements.create')); ?>" class="text-emerald-600 font-black text-sm hover:underline">Tambah Sekarang</a>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <?php if($achievements->hasPages()): ?>
    <div class="mt-8">
        <?php echo e($achievements->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\man1selong\resources\views/admin/achievements/index.blade.php ENDPATH**/ ?>