

<?php $__env->startSection('header'); ?>
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h1>Laporan Kegiatan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Laporan Kegiatan</li>
            </ol>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('tombol'); ?>
    <div class="card mx-3">
        <div class="card-body">
            <div>
                <a href="<?php echo e(route('laporan.create')); ?>" class="btn btn-primary">+ Tambah Data</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('konten'); ?>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Dokumentasi Kegiatan</th>
                    <th>Daftar Peserta</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $laporan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $laporans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($laporans->kegiatan->nama); ?></td>
                        <td><?php echo e($laporans->kegiatan->waktu); ?></td>
                        <td>
                            <?php if($laporans->file_dokumentasi): ?>
                                <?php $__currentLoopData = json_decode($laporans->file_dokumentasi); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <img src="<?php echo e(Storage::url('dokumentas-laporan/' . $file)); ?>" alt="<?php echo e($file); ?>" style="max-width: 100px; max-height: 100px; margin: 5px;">

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            
                            <a href="<?php echo e(route('daftarpeserta.index', ['id' => $laporans->id_kegiatan])); ?>" class="btn btn-sm btn-info">Daftar Peserta</a>
                        </td>
                        <td>
                            <a href="<?php echo e(route('laporan.edit', $laporans->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                            
                            <form onsubmit="return confirm('Yakin Ingin menghapus data ini?')" action="<?php echo e(route('laporan.destroy', $laporans->id)); ?>" class="d-inline" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-danger" type="submit" name="submit">Del</button>
                            </form>
                            
                            <a href="<?php echo e(route('laporan.print', ['id' => $laporans->id_kegiatan])); ?>" rel="noopener" target="_blank" class="btn btn-secondary"><i class="fas fa-print"></i></a>
                            <a href="<?php echo e(route('print.excel', ['id' => $laporans->id_kegiatan])); ?>" rel="noopener" target="_blank" class="btn btn-success"><i class="fas fa-file-excel"></i></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.dashboard.layout.dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI_Kegiatan_TJS\resources\views/Admin/dashboard/Laporan/index.blade.php ENDPATH**/ ?>