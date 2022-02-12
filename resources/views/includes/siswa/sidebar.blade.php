        <!-- Sidebar -->
        <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #01937C" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard.siswa') }}">
                <div class="sidebar-brand-text mx-3">SIAKAD</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard.siswa') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('datadiri.index') }}">
                    <i class="fas fa-fw fa-arrow-right"></i>
                    <span>Data Diri</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('listpelajaran.siswa') }}">
                    <i class="fas fa-fw fa-arrow-right"></i>
                    <span>List Pelajaran</span></a>
            </li>


            <li class="nav-item active">
                <a class="nav-link" href="{{ route('opsi.jadwal') }}">
                    <i class="fas fa-fw fa-arrow-right"></i>
                    <span>Jadwal Pelajaran</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('opsi.hasil.pembelajaran') }}">
                    <i class="fas fa-fw fa-arrow-right"></i>
                    <span>Hasil Pembelajaran</span></a>
            </li>


            <li class="nav-item active">
                <a class="nav-link" href="{{ route('data_tagihan_administrasi') }}">
                    <i class="fas fa-fw fa-arrow-right"></i>
                    <span>Tagihan Administrasi</span></a>
            </li>










        </ul>
        <!-- End of Sidebar -->
