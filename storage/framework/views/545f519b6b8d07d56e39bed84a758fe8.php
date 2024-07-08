<!-- resources/views/daftar_peserta/index.blade.php -->


<?php $__env->startSection('header'); ?>
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h1>Data Peserta <?php echo e($kegiatan->nama); ?></h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Data Peserta</li>
            </ol>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('konten'); ?>
<div class="container">

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="mb-3">
        <a href="" class="btn btn-primary">Tambah Data Peserta</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Tanggal Lahir</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Dokumen</th>
                <th>Tanggal Pendaftaran</th>
                <th>Aksi</th> <!-- Kolom untuk aksi -->
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $peserta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $pesertas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($index + 1); ?></td>
                <td><?php echo e($pesertas->nama); ?></td>
                <td><?php echo e($pesertas->nik); ?></td>
                <td><?php echo e($pesertas->tgl_lahir); ?></td>
                <td><?php echo e($pesertas->no_hp); ?></td>
                <td><?php echo e($pesertas->alamat); ?></td>
                <td>
                   <img src="<?php echo e(asset('storage/dokumen-ktp/' . $pesertas->dokumen)); ?>" alt="" width="130">
                </td>
                <td><?php echo e($pesertas->created_at->format('d-m-Y H:i:s')); ?></td>
                <td>
                    <a href="" class="btn btn-sm btn-primary">Edit</a>
                    <form action="" method="POST" style="display: inline-block;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                    <a href="" class="btn btn-sm btn-primary">Cetak</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.dashboard.layout.dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI_Kegiatan_TJS\resources\views/Admin/dashboard/DataPeserta/daftarpeserta.blade.php ENDPATH**/ ?>