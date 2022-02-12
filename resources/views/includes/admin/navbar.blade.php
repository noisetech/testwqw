    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                    <img class="img-profile rounded-circle" src="{{ asset('backend/img/undraw_profile.svg') }}">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <div class="dropdown-divider"></div>
                    <form id="logout" action="{{ route('logout') }}" method="POST" class="dropdown-item">
                        @csrf

                       <div class="d-flex justify-content-center m-0">
                        <button class="btn btn-sm text-center  text-white" type="submit" style="background-color: #FA4EAB;">
                            Logout  <i class="fas fa-sm fa-sign-out-alt"></i>
                        </button>
                       </div>
                    </form>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->


    @push('script')
        <script src="{{ asset('backend/js/sweetalert.min.js') }}"></script>
        <script>
            $('#logout').on('click', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Anda yakin?',
                    text: "Keluar Sistem!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: 'Cancel',
                    confirmButtonText: 'Logout!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#logout').submit();
                    }
                })
            });
        </script>
    @endpush
