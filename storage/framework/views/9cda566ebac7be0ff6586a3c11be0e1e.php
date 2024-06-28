<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">MENU UTAMA</li>
                <li class="nav-item">
                    <a href="<?php echo e(route('dashboard')); ?>"
                        class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>

                <li class="nav-header">Daftar Kegiatan</li>
                <li class="nav-item">
                    <a href="/dashboard/datakegiatan" class="nav-link">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>
                            Data Kegiatan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/datapeserta" class="nav-link">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>
                            Data Peserta
                        </p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="/dashboard/datapegawai" class="nav-link">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>
                            Data Pegawai
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/laporan" class="nav-link">
                        <i class="nav-icon far fa-file"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href=<?php echo e(route('logout')); ?> class="nav-link">
                        <i class="nav-icon far fa-logout"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>


                
        </nav>
    </ul>
</nav>
<?php /**PATH C:\xampp\htdocs\SI_Kegiatan_TJS\resources\views/Admin/dashboard/layout/menu.blade.php ENDPATH**/ ?>