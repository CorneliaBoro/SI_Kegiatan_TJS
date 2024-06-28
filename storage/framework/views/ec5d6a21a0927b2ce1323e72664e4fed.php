


<?php $__env->startSection('header'); ?>
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h5>Data Pegawai</h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Data Pegawai</li>
            </ol>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('konten'); ?>
    <?php echo $__env->make('Admin.dashboard.pesan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="pb-3"><a href="<?php echo e(route('datapegawai.index')); ?>" class="btn btn-secondary">Kembali</a>
    </div>
    <form action="<?php echo e(route('datapegawai.update', $data->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('put'); ?>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control form-control-sm" name="nama" id="nama" value="<?php echo e($data->nama); ?>">
        </div>
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control form-control-sm" name="nip" id="nip" value="<?php echo e($data->nip); ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control form-control-sm" name="email" id="email" value="<?php echo e($data->email); ?>">
        </div>        
        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" class="form-control form-control-sm" name="no_hp" id="no_hp" value="<?php echo e($data->no_hp); ?>">
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.dashboard.layout.dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI_Kegiatan_TJS\resources\views/Admin/dashboard/DataPegawai/edit.blade.php ENDPATH**/ ?>