        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard-admin') }}">
                <div class="sidebar-brand-text mx-3">SIAKAD</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>


            <li class="nav-item active">
                <a class="nav-link" href="{{ route('opsi.siswa.kepala.sekolah') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Siswa</span></a>
            </li>


            <li class="nav-item active">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Guru</span></a>
            </li>


        </ul>
        <!-- End of Sidebar -->
