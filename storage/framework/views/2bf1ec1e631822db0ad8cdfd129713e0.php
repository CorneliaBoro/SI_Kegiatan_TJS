

<?php $__env->startSection('header'); ?>
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h1>Data Peserta</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Data Peserta</li>
            </ol>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('konten'); ?>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th class="col-3">Nama Kegiatan</th>
                    <th class="col-2">Daftar Peserta</th>
                    <th class="col-2">Kelola Peserta</th> <!-- Tambah kolom baru -->
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $kegiatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="col-1"><?php echo e($index + 1); ?></td>
                        <td class="col-3"><?php echo e($item->nama); ?></td>
                        <td class="col-2">
                            <a href="<?php echo e(route('daftarpeserta.index',['id' => $item->id])); ?>" class="btn btn-sm btn-warning">Cetak Daftar Peserta</a>
                        </td>
                        <td class="col-2">
                            <a href="<?php echo e(route('kelolapeserta',['id' => $item->id])); ?>" class="btn btn-sm btn-info">Kelola Peserta</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.dashboard.layout.dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI_Kegiatan_TJS\resources\views/Admin/dashboard/DataPeserta/index.blade.php ENDPATH**/ ?>