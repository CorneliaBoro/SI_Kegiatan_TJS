

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <!-- Alert section -->
    <?php if(session('error')): ?>
    <div class="alert alert-danger form-container">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('success')): ?>
    <div class="alert alert-success form-container">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <!-- Form container -->
    <div class="row justify-content-center">
        <div class="col-md-6 form-container"> <!-- Adjust the width as needed -->
            <h2 class="text-center mb-4">Pendaftaran Peserta untuk Kegiatan: <?php echo e($kegiatan->nama); ?></h2>
            
            <form action="<?php echo e(route('User.store', $kegiatan->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo e(old('nama')); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" required pattern="\d{16}" title="NIK harus berupa 16 digit angka">
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

                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="validasi" name="validasi" required>
                    <label class="form-check-label" for="validasi">Saya menyatakan bahwa data yang diisi sudah benar dan dapat dipertanggungjawabkan.</label>
                </div>

                <div class="d-flex justify-content-between pb-3">
                    <a href="<?php echo e(route('User.index')); ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary me-2">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI_Kegiatan_TJS\resources\views/user/pendaftaran.blade.php ENDPATH**/ ?>