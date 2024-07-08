

<?php $__env->startSection('header'); ?>
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h5>Edit Data Laporan</h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Edit Laporan</li>
            </ol>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('konten'); ?>
    <?php echo $__env->make('Admin.dashboard.pesan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="pb-3"><a href="<?php echo e(route('laporan.index')); ?>" class="btn btn-secondary">Kembali</a></div>
    <form action="<?php echo e(route('laporan.update', $laporan->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?> <!-- Gunakan method PUT untuk update -->
        
        <div class="form-group">
            <label for="id_kegiatan">Nama Kegiatan:</label>
            <select name="id_kegiatan" id="id_kegiatan" class="form-control">
                <option value="">Pilih Kegiatan</option>
                <?php $__currentLoopData = $kegiatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $nama_kegiatan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($id); ?>" <?php echo e($id == $laporan->id_kegiatan ? 'selected' : ''); ?>><?php echo e($nama_kegiatan); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    
        <div class="form-group">
            <label for="file_dokumentasi" class="form-label">Upload Dokumentasi</label>
            <input type="file" class="form-control" id="file_dokumentasi" name="file_dokumentasi[]" multiple required>
            <?php if($laporan->file_dokumentasi): ?>
                <p>File Dokumentasi Saat Ini: <a href="<?php echo e(asset('storage/dokumentas-laporan/' . $laporan->file_dokumentasi)); ?>" target="_blank"><?php echo e($laporan->file_dokumentasi); ?></a></p>
            <?php else: ?>
                <p>Belum ada file dokumentasi.</p>
            <?php endif; ?>
        </div>
    
        <button type="submit" class="btn btn-primary">Submit</button>
    </form> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.dashboard.layout.dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI_Kegiatan_TJS\resources\views/Admin/dashboard/Laporan/edit.blade.php ENDPATH**/ ?>