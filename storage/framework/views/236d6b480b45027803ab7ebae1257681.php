

<?php $__env->startSection('header'); ?>
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h5>Edit Data Kegiatan</h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Data Kegiatan</li>
            </ol>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('konten'); ?>
    <?php echo $__env->make('Admin.dashboard.pesan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="pb-3"><a href="<?php echo e(route('datakegiatan.index')); ?>" class="btn btn-secondary">Kembali</a>
    </div>
    <form action="<?php echo e(route('datakegiatan.update', $data->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control form-control-sm" name="nama" id="nama" placeholder=""
                value="<?php echo e($data->nama); ?>">
        </div>

        <div class="mb-3">
            <label for="waktu" class="form-label">Waktu Pelaksanaan</label>
            <input type="datetime-local" class="form-control form-control-sm" name="waktu" id="waktu" placeholder=""
                value="<?php echo e(date('Y-m-d\TH:i', strtotime($data->waktu))); ?>">
        </div>

        <div class="mb-3">
            <label for="tempat" class="form-label">Tempat</label>
            <input type="text" class="form-control form-control-sm" name="tempat" id="tempat" placeholder=""
                value="<?php echo e($data->tempat); ?>">
        </div>

        <div class="mb-3">
            <label for="id_pegawai" class="form-label">Pegawai</label>
            <select name="id_pegawai" class="form-control">
                <option class="disable" value="">---Pilih Pegawai---</option>
                <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $data->id_pegawai ? 'selected' : ''); ?>>
                        <?php echo e($item->nama); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control form-control-sm" name="deskripsi" id="deskripsi" rows="4" placeholder=""><?php echo e($data->deskripsi); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="kuota" class="form-label">Kuota</label>
            <input type="text" class="form-control form-control-sm" name="kuota" id="kuota" placeholder=""
                value="<?php echo e($data->kuota); ?>">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status">
                <option value="Belum Terlaksana" <?php echo e($data->status == 'Belum Terlaksana' ? 'selected' : ''); ?>>Belum Terlaksana</option>
                <option value="Sudah Terlaksana" <?php echo e($data->status == 'Sudah Terlaksana' ? 'selected' : ''); ?>>Sudah Terlaksana</option>
            </select>
        </div>

        <button class="btn btn-primary" type="submit">Simpan</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.dashboard.layout.dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI_Kegiatan_TJS\resources\views/Admin/dashboard/DataKegiatan/edit.blade.php ENDPATH**/ ?>