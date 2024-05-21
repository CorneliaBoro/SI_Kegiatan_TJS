<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">MENU UTAMA</li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
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
                    <a href="/dashboard/datakegaiatan" class="nav-link">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>
                            Jadwal Kegiatan
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

                {{-- <li class="nav-header">DATA PELAKU</li>
                <li class="nav-item">
                    <a href="/dashboard/datauser" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Data Pengguna
                        </p>
                    </a>
                </li> --}}
        </nav>
    </ul>
</nav>
