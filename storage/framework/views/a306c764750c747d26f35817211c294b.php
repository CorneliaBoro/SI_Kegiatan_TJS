


<?php $__env->startSection('header'); ?>
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h1>Data Pegawai</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Daftar Pegawai</li>
            </ol>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('tombol'); ?>
    <div class="card mx-3">
        <div class="card-body">
            <div>
                <a href="<?php echo e(route('datapegawai.create')); ?>" class="btn btn-primary">+ Tambah Data</a>
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
                    <th class="col-3">Nama</th>
                    <th class="col-2">NIP</th>
                    <th class="col-2">Email</th>
                    <th class="col-2">No HP</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="col-1"><?php echo e($i); ?></td>
                        <td class="col-2"><?php echo e($item->nama); ?></td>
                        <td class="col-2"><?php echo e($item->nip); ?></td>
                        <td class="col-2"><?php echo e($item->email); ?></td>
                        <td class="col-2"><?php echo e($item->no_hp); ?></td>
                        <td class="col-2">
                            <a href="<?php echo e(route('datapegawai.edit', $item->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                            <form onsubmit="return confirm('Yakin Ingin menghapus data ini?')" action="<?php echo e(route('datapegawai.destroy', $item->id)); ?>" class="d-inline" method="post">
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
<?php echo $__env->make('Admin.dashboard.layout.dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI_Kegiatan_TJS\resources\views/Admin/dashboard/DataPegawai/index.blade.php ENDPATH**/ ?>