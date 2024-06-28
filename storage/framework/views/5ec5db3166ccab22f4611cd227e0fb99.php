<!-- resources/views/sukses.blade.php -->


<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="alert alert-success" role="alert">
        Terima kasih telah mendaftar kegiatan!
    </div>
    <div class="d-flex justify-content-between">
        <a href="<?php echo e(route('User.index')); ?>" class="btn btn-secondary">Kembali ke Halaman Utama</a>
        <a href="<?php echo e(route('bukti-daftar.show', $peserta->id)); ?>" class="btn btn-primary">Cetak Bukti Daftar</a>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI_Kegiatan_TJS\resources\views/user/sukses.blade.php ENDPATH**/ ?>