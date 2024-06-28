

<?php $__env->startSection('content'); ?>
<div class="container center-screen">
    <div class="alert-custom">
        <i class="fa-solid fa-circle-check"></i>
        <h1>Terima kasih telah mendaftar kegiatan!</h1>
        <div class="btn-group">
            <a href="<?php echo e(route('User.index')); ?>" class="btn btn-secondary">Kembali ke Halaman Utama</a>
            <?php
            $peserta = session('peserta');
            ?>
           <a href="<?php echo e(route('bukti-daftar.show', $peserta->id)); ?>" class="btn btn-primary">Cetak Bukti Daftar</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI_Kegiatan_TJS\resources\views/User/sukses.blade.php ENDPATH**/ ?>