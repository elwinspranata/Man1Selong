

<?php $__env->startSection('title', 'Sambutan Kepala Madrasah — MAN 1 Lombok Timur'); ?>

<?php $__env->startSection('content'); ?>
<section class="relative pt-32 pb-20 bg-primary-dark overflow-hidden text-center">
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-white">
        <h1 class="text-4xl font-extrabold mb-2">Sambutan Kepala Madrasah</h1>
        <p class="text-white/60">Pesan dan arahan dari pimpinan MAN 1 Lombok Timur.</p>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-5 gap-16 items-start">
            
            <div class="lg:col-span-2">
                <div class="relative group">
                    <div class="absolute -inset-4 bg-primary/10 rounded-3xl blur-2xl group-hover:bg-primary/20 transition duration-500"></div>
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl border-x-8 border-t-8 border-light">
                        <img src="<?php echo e($school_setting->principal_photo ? asset('storage/'.$school_setting->principal_photo) : asset('images/kepala-sekolah.png')); ?>" class="w-full h-[500px] object-cover object-top">
                    </div>
                    <div class="mt-8 p-6 bg-light rounded-2xl border border-border text-center">
                        <p class="font-extrabold text-neutral text-xl"><?php echo e($school_setting->principal_name ?: 'Drs. H. Muhammad Amin, M.Pd.'); ?></p>
                        <p class="text-primary font-bold text-sm uppercase tracking-widest mt-1">Kepala <?php echo e($school_setting->school_name ?: 'MAN 1 Lombok Timur'); ?></p>
                    </div>
                </div>
            </div>

            
            <div class="lg:col-span-3">
                <h2 class="text-3xl font-extrabold text-neutral mb-8 leading-tight">
                    "Membangun <span class="text-primary">Generasi Emas</span> Berlandaskan Iman dan Teknologi"
                </h2>
                <div class="space-y-6 text-neutral-light leading-relaxed text-lg italic prose-xl max-w-none">
                    <?php echo $school_setting->welcome_message ?: '<p>Assalamu’alaikum Warahmatullahi Wabarakatuh,</p><p>Puji syukur kita panjatkan ke hadirat Allah SWT... selamat datang di portal resmi MAN 1 Lombok Timur.</p>'; ?>

                </div>
                <div class="mt-12 flex items-center gap-6">
                    <div class="w-16 h-1 bg-primary rounded-full"></div>
                    <p class="text-neutral font-bold tracking-widest uppercase">Selong, <?php echo e(now()->translatedFormat('F Y')); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\man1selong\resources\views/pages/profil/sambutan.blade.php ENDPATH**/ ?>