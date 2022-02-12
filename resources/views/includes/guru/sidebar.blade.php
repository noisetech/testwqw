        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard.guru') }}">
                <div class="sidebar-brand-text mx-3">SIAKAD</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard.guru') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('data-diri.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Data Diri</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('jadwal_mengajar') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Jadwal Mengajar</span></a>
            </li>

        </ul>
        <!-- End of Sidebar -->
