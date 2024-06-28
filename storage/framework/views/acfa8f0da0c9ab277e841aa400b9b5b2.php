

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Pendaftaran Peserta</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo e(old('nama')); ?>" required>
        </div>

        <div class="mb-3">
            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo e(old('tgl_lahir')); ?>" required>
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No Telp.</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo e(old('no_hp')); ?>" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo e(old('alamat')); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="dokumen" class="form-label">Upload Scan KTP</label>
            <input type="file" class="form-control" id="dokumen" name="dokumen" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="validasi" name="validasi" required>
            <label class="form-check-label" for="validasi">Saya menyatakan bahwa data yang diisi sudah benar dan dapat dipertanggungjawabkan.</label>
        </div>

        <button type="submit" class="btn btn-primary">Daftar</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI_Kegiatan_TJS\resources\views/User/pendaftaran.blade.php ENDPATH**/ ?>