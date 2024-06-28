
<?php
use Carbon\Carbon;
Carbon::setLocale('id');
?>

<?php $__env->startSection('content'); ?>
<div class="container center-screen">
    <header class="header">
        <h1>Pendaftaran Kegiatan Kelurahan Tunjungsekar</h1>
    </header>
    <?php if($kegiatan->isEmpty()): ?>
        <p>Tidak ada kegiatan yang tersedia.</p>
    <?php else: ?>
        <div class="row">
            <?php $__currentLoopData = $kegiatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $hari = Carbon::parse($item->waktu)->translatedFormat('l, j F Y');
                    $jam = Carbon::parse($item->waktu)->format('H:i');
                ?>
                <div class="col-md-5 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($item->nama); ?></h5>
                            <hr>
                            <p class="card-text">Hari: <?php echo e($hari); ?></p>
                            <p class="card-text">Jam: <?php echo e($jam); ?></p>
                            <p class="card-text">Tempat: <?php echo e($item->tempat); ?></p>
                            <p class="card-text">Deskripsi: <?php echo e($item->deskripsi); ?></p>
                            <p class="card-text">Kuota: <?php echo e($item->current_participants); ?> / <?php echo e($item->kuota); ?></p>
                        </div>
                        <div class="card-footer">
                            <?php if($item->current_participants < $item->kuota): ?>
                                <a href="<?php echo e(route('User.create', $item->id)); ?>" class="btn btn-primary btn-daftar">Daftar</a>
                            <?php else: ?>
                                <button type="button" class="btn btn-secondary btn-daftar" disabled>Kuota Penuh</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI_Kegiatan_TJS\resources\views/User/index.blade.php ENDPATH**/ ?>