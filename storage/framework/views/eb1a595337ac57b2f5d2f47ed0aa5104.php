

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            Bukti Pendaftaran
        </div>
        <div class="card-body">
            <h4 class="card-title">Kegiatan: <?php echo e($kegiatan->nama); ?></h4>
            <p class="card-text">Waktu: <?php echo e($kegiatan->waktu); ?></p>
            <p class="card-text">Tempat: <?php echo e($kegiatan->tempat); ?></p>
            <hr>
            <h5 class="card-title">Data Peserta</h5>
            <p class="card-text">Nama: <?php echo e($peserta->nama); ?></p>
            <p class="card-text">NIK: <?php echo e($peserta->nik); ?></p>
            <p class="card-text">Tanggal Lahir: <?php echo e($peserta->tgl_lahir); ?></p>
            <p class="card-text">No Telp: <?php echo e($peserta->no_hp); ?></p>
            <p class="card-text">Alamat: <?php echo e($peserta->alamat); ?></p>
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI_Kegiatan_TJS\resources\views/user/buktidaftar.blade.php ENDPATH**/ ?>