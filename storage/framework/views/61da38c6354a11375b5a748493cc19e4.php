


<?php $__env->startSection('header'); ?>
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h5>Tambah Data Kegiatan</h5>
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
    <form action="<?php echo e(route('datakegiatan.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control form-control-sm" name="nama" id="nama" placeholder=""
                value="<?php echo e(Session::get('nama')); ?>">
        </div>

        <div class="mb-3">
            <label for="waktu" class="form-label">Waktu Pelaksanaan</label>
            <input type="datetime-local" class="form-control form-control-sm" name="waktu" id="waktu" placeholder=""
                value="<?php echo e(Session::get('waktu')); ?>">
        </div>

        <div class="mb-3">
            <label for="tempat" class="form-label">Tempat</label>
            <input type="tempat" class="form-control form-control-sm" name="tempat" id="tempat" placeholder=""
                value="<?php echo e(Session::get('tempat')); ?>">
        </div>

        <div class="col-mb-3">
            <select name="id_pegawai" class="form-control">
                <option class="disable" value="">---Pilih Pegawai---</option>
                <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control form-control-sm" name="deskripsi" id="deskripsi" rows="4" placeholder="">
                <?php echo e(Session::get('deskripsi')); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="kuota" class="form-label">Kuota</label>
            <input type="kuota" class="form-control form-control-sm" name="kuota" id="kuota" placeholder="" value="<?php echo e(Session::get('kuota')); ?>">
        </div>

        <div class="form-group">
            <label>Status</label>
            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;"
                name="status">
              <option selected="selected">Belum Terlaksana</option>
              <option>Sudah Terlaksana</option>
            </select>
        </div>

        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.dashboard.layout.dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI_Kegiatan_TJS\resources\views/Admin/dashboard/DataKegiatan/create.blade.php ENDPATH**/ ?>