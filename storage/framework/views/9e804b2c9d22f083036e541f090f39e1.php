

<?php $__env->startSection('title', 'Berita & Artikel'); ?>
<?php $__env->startSection('page_title', 'Manajemen Berita'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-2xl font-black text-slate-800 tracking-tight">Daftar Berita</h3>
            <p class="text-slate-500 font-medium">Kelola artikel, berita, dan pengumuman sekolah.</p>
        </div>
        <a href="<?php echo e(route('admin.posts.create')); ?>" class="px-8 py-4 bg-emerald-600 text-white font-black rounded-2xl shadow-lg hover:shadow-emerald-500/20 hover:-translate-y-1 transition-all flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Tulis Berita Baru
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

    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-widest">Berita</th>
                        <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-widest">Kategori</th>
                        <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-widest">Tanggal</th>
                        <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-widest text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="group hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-12 rounded-xl bg-slate-100 border border-slate-200 overflow-hidden flex-shrink-0">
                                    <?php if($post->image): ?>
                                        <img src="<?php echo e(asset('storage/' . $post->image)); ?>" class="w-full h-full object-cover">
                                    <?php else: ?>
                                        <div class="w-full h-full flex items-center justify-center text-slate-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="max-w-xs xl:max-w-md">
                                    <p class="font-bold text-slate-900 leading-tight mb-1 truncate"><?php echo e($post->title); ?></p>
                                    <p class="text-xs font-medium text-slate-400 truncate"><?php echo e($post->excerpt); ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-600 rounded-lg text-xs font-bold"><?php echo e($post->category ?: 'Umum'); ?></span>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-sm font-semibold text-slate-600"><?php echo e($post->created_at->format('d M Y')); ?></span>
                        </td>
                        <td class="px-8 py-6">
                            <?php if($post->is_published): ?>
                                <span class="flex items-center gap-1.5 text-xs font-bold text-emerald-600">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
                                    Terbit
                                </span>
                            <?php else: ?>
                                <span class="flex items-center gap-1.5 text-xs font-bold text-orange-500">
                                    <span class="w-1.5 h-1.5 rounded-full bg-orange-500"></span>
                                    Draft
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="<?php echo e(route('admin.posts.edit', $post)); ?>" class="p-2 text-slate-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="<?php echo e(route('admin.posts.destroy', $post)); ?>" method="POST" class="inline-block" onsubmit="return confirm('Hapus berita ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="px-8 py-20 text-center">
                            <div class="flex flex-col items-center gap-4">
                                <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center text-slate-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <p class="font-bold text-slate-400">Belum ada berita yang ditulis.</p>
                                <a href="<?php echo e(route('admin.posts.create')); ?>" class="text-emerald-600 font-black text-sm hover:underline">Tulis Sekarang</a>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <?php if($posts->hasPages()): ?>
        <div class="px-8 py-6 bg-slate-50/50 border-t border-slate-100">
            <?php echo e($posts->links()); ?>

        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\man1selong\resources\views/admin/posts/index.blade.php ENDPATH**/ ?>