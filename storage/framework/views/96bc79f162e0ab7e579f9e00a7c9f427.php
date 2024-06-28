


<?php $__env->startSection('header'); ?>
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h1>Data Kegiatan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Daftar Kegiatan</li>
            </ol>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pesan'); ?>
<?php $__env->startSection('tombol'); ?>
    <div class="card mx-3">
        <div class="card-body">
            <div>
                <a href="<?php echo e(route('datakegiatan.create')); ?>" class="btn btn-primary">+ Tambah Data</a>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('konten'); ?>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th class="col-1">Nama Kegiatan</th>
                    <th class="col-1">Waktu</th>
                    <th class="col-1">Tempat</th>
                    <th class="col-1">Deskripsi</th>
                    <th class="col-1">PJ</th>
                    <th class="col-1">Kuota</th>
                    <th class="col-1">Status</th>
                    <th class="col-1">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="col-1"><?php echo e($i); ?></td>
                        <td class="col-2" ><?php echo e($item->nama); ?></td>
                        <td class="col-2"><?php echo e($item->waktu); ?></td>
                        <td class="col-1" ><?php echo e($item->tempat); ?></td>
                        <td class="col-2" ><?php echo e($item->deskripsi); ?></td>
                        <td class="col-2"><?php echo e($item->pegawai->nama); ?></td>
                        <td class="col-1"><?php echo e($item->kuota); ?></td>
                        <td class="col-3"><?php echo e($item->status); ?></td>
                        <td class="col-2">
                            <a href="<?php echo e(route('datakegiatan.edit', $item->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                            <form onsubmit="return confirm('Yakin Ingin menghapus data ini?')" action="<?php echo e(route('datakegiatan.destroy', $item->id)); ?>" class="d-inline" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-danger" type="submit" name="submit">Del</button>
                            </form>                            
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.dashboard.layout.dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI_Kegiatan_TJS\resources\views/Admin/dashboard/DataKegiatan/index.blade.php ENDPATH**/ ?>