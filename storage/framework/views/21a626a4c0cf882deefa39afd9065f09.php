


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

<?php $__env->startSection('tombol'); ?>
    <div class="card mx-3">
        <div class="card-body">
            <div>
                <a href="<?php echo e(route('datakegiatan.create')); ?>" class="btn btn-primary">+ Tambah Data</a>
                <a href="" rel="noopener" target="_blank" class="btn btn-secondary"><i class="fas fa-print"></i>
                    Print</a>
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
                    <th class="col-3">Nama Kegiatan</th>
                    <th class="col-1">Waktu</th>
                    <th class="col-1">Tempat</th>
                    <th class="col-1">PJ</th>
                    <th class="col-2">Deskripsi</th>
                    <th class="col-1">Status</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td class="col-1">No</td>
                        <td class="col-3">Sosialisasi</td>
                        <td class="col-1">Waktu</td>
                        <td class="col-1">Tempat</td>
                        <td class="col-1">PJ</td>
                        <td class="col-2">Deskripsi</td>
                        <td class="col-1">Status</td>
                        <td class="col-2">
                            <a href="" class="btn btn-sm btn-warning">Edit</a>
                            <form onsubmit="return confirm('Yakin Ingin menghapus data ini?')" action="" class="d-inline" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-danger" type="submit" name="submit">Del</button>
                            </form>                            
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.dashboard.layout.dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI_Kegiatan_TJS\resources\views/Admin/Dashboard/DataKegiatan/index.blade.php ENDPATH**/ ?>