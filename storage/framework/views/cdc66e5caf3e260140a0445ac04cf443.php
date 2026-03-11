

<?php $__env->startSection('title', 'Berita & Artikel — MAN 1 Lombok Timur'); ?>

<?php $__env->startSection('content'); ?>
<section class="relative pt-32 pb-16 bg-primary-dark overflow-hidden text-center">
    <div class="relative z-10 max-w-7xl mx-auto px-4">
        <h1 class="text-4xl font-extrabold text-white mb-2">Pusat Informasi</h1>
        <p class="text-white/60">Update terbaru seputar kegiatan, prestasi, dan pengumuman madrasah.</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <article class="bg-white rounded-2xl border border-border overflow-hidden group hover:shadow-2xl transition-all duration-500">
                <div class="h-56 overflow-hidden relative">
                    <span class="absolute top-4 left-4 z-10 bg-secondary text-neutral text-[10px] font-bold uppercase px-3 py-1 rounded-full shadow-lg"><?php echo e($post->category ?: 'Berita'); ?></span>
                    <img src="<?php echo e($post->image ? asset('storage/'.$post->image) : 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=800'); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                <div class="p-8">
                    <div class="flex items-center gap-2 text-neutral-light text-xs mb-4">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <?php echo e($post->created_at->format('d M Y')); ?>

                    </div>
                    <a href="<?php echo e(route('berita.detail', $post->slug)); ?>">
                        <h3 class="text-xl font-bold text-neutral leading-snug mb-3 group-hover:text-primary transition-colors cursor-pointer"><?php echo e($post->title); ?></h3>
                    </a>
                    <p class="text-neutral-light text-sm line-clamp-3 mb-6"><?php echo e($post->excerpt ?: Str::limit(strip_tags($post->content), 120)); ?></p>
                    <a href="<?php echo e(route('berita.detail', $post->slug)); ?>" class="text-primary font-bold text-sm flex items-center gap-2 hover:gap-3 transition-all">
                        Baca Selengkapnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-center text-neutral-light italic col-span-3">Belum ada berita yang diterbitkan.</p>
            <?php endif; ?>
        </div>

        <div class="mt-16">
            <?php echo e($posts->links()); ?>

        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\man1selong\resources\views/pages/berita.blade.php ENDPATH**/ ?>