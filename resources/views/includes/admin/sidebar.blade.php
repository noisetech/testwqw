        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard-admin') }}">
                <div class="sidebar-brand-text mx-3"> MI. NURUL IMAN AL-HARUNI</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard-admin') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('manage_user.index') }}">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Manage Users</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span>
                </a>
                <div id="collapse5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('halaman.opsi.siswa.admin') }}">Siswa</a>
                        <a class="collapse-item" href="{{ route('halaman.opsi.guru.admin') }}">Guru</a>
                        <a class="collapse-item" href="{{ route('kepalasekolah.index') }}">Kepala Sekolah</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Kalender</span>
                </a>
                <div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('semester.index') }}">Semester</a>
                        <a class="collapse-item" href="{{ route('tahun.index') }}">Tahun</a>
                        <a class="collapse-item" href="{{ route('hari.index') }}">Hari</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Akademik</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="{{ route('mata.pelajaran.index') }}">Mata Pelajaran</a>
                        <a class="collapse-item" href="{{ route('kelas.index') }}">Kelas</a>
                        <a class="collapse-item" href="{{ route('opsi.halaman.jadwal.siswa.admin') }}">Hasil Pembelajaran Siswa</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Administrasi</span>
                </a>
                <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('pembayaran_administrasi.index') }}">Pembayaran Administrasi</a>
                        <a class="collapse-item" href="{{ route('tagihan_administrasi.index') }}">Tagihan Administrasi</a>
                    </div>
                </div>
            </li>

        </ul>

        <hr class="sidebar-divider d-none d-md-block">
        <!-- End of Sidebar -->
