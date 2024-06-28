<!-- resources/views/daftar_peserta/index.blade.php -->


<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Daftar Peserta</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

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
            </tr>
        </thead>
        <tbody>
            
            <?php $i = 1; ?>
            <?php $__currentLoopData = $peserta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pesertas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($i); ?></td>
                <td><?php echo e($pesertas->nama); ?></td>
                <td><?php echo e($pesertas->nik); ?></td>
                <td><?php echo e($pesertas->tgl_lahir); ?></td>
                <td><?php echo e($pesertas->no_hp); ?></td>
                <td><?php echo e($pesertas->alamat); ?></td>
                <td>
                   <img src="<?php echo e(asset('storage/dokumen-ktp/' . $pesertas->dokumen)); ?>" alt="" width="130">
                </td>
                <td><?php echo e($pesertas->created_at->format('d-m-Y H:i:s')); ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI_Kegiatan_TJS\resources\views/Admin/dashboard/DataPeserta/daftarpeserta.blade.php ENDPATH**/ ?>