

<?php $__env->startSection('title', $post->title . ' — MAN 1 Lombok Timur'); ?>
<?php $__env->startSection('description', $post->excerpt ?: Str::limit(strip_tags($post->content), 160)); ?>

<?php $__env->startSection('content'); ?>
<section class="relative pt-32 pb-16 bg-primary-dark overflow-hidden">
    
    <div class="absolute inset-0 opacity-10">
        <img src="<?php echo e($post->image ? asset('storage/'.$post->image) : asset('images/hero-bg.png')); ?>" class="w-full h-full object-cover blur-sm">
    </div>
    
    <div class="relative z-10 max-w-4xl mx-auto px-4 text-center">
        <span class="inline-block bg-secondary text-neutral text-[10px] font-bold uppercase px-4 py-1.5 rounded-full mb-6 shadow-lg">
            <?php echo e($post->category ?: 'Berita'); ?>

        </span>
        <h1 class="text-3xl md:text-5xl font-extrabold text-white leading-tight mb-6">
            <?php echo e($post->title); ?>

        </h1>
        <div class="flex items-center justify-center gap-6 text-white/60 text-sm">
            <span class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <?php echo e($post->created_at->translatedFormat('d F Y')); ?>

            </span>
            <span class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                Administrator
            </span>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4">
        
        <?php if($post->image): ?>
        <div class="rounded-3xl overflow-hidden shadow-2xl mb-12 -mt-24 relative z-20 border-8 border-white">
            <img src="<?php echo e(asset('storage/'.$post->image)); ?>" alt="<?php echo e($post->title); ?>" class="w-full h-auto max-h-[500px] object-cover">
        </div>
        <?php endif; ?>

        
        <article class="prose-content text-neutral-light text-lg">
            <?php echo $post->content; ?>

        </article>

        
        <div class="mt-16 pt-8 border-t border-border flex flex-col sm:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-3">
                <span class="text-sm font-bold text-neutral">Bagikan:</span>
                <div class="flex gap-2">
                    <?php $__currentLoopData = ['FB', 'WA', 'X']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button class="w-9 h-9 rounded-lg bg-light border border-border flex items-center justify-center text-neutral/50 hover:bg-primary hover:text-white transition-all">
                        <span class="text-[10px] font-black"><?php echo e($soc); ?></span>
                    </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <a href="<?php echo e(route('berita')); ?>" class="btn-outline !py-2.5 !px-6 !text-xs">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Berita
            </a>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\man1selong\resources\views/pages/berita-detail.blade.php ENDPATH**/ ?>