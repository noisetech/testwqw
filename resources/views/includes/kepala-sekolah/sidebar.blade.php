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
                <a class="nav-link" href="{{ route('dashboard_kepala_sekolah') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Siswa</span>
                </a>
                <div id="collapse5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('opsi.siswa.kepala.sekolah') }}">Data Pertahun</a>
                        <a class="collapse-item" href="{{ route('semua.data.sisw.kepala.sekolah') }}">Semua Data</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Guru</span>
                </a>
                <div id="collapse6" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="">Data Pertahun</a>
                        <a class="collapse-item" href="">Semua Data</a>
                    </div>
                </div>
            </li>


        </ul>
        <!-- End of Sidebar -->
