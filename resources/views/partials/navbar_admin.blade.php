<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - PDF -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-file-pdf text-danger fa-lg"></i>
            </a>
            <!-- Dropdown - download PDF -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header mb-2">
                    Download PDF
                </h6>

                <div class="px-3 pb-3">
                        <form action="{{ route('komplain.pdf') }}" method="POST">
                            @csrf
                            <div class="d-flex align-items-end gap-2" style="max-width: 400px;">
                                <div class="flex-grow-1">
                                    <label for="xlsx" class="form-label text-dark fw-semibold">Pilih bulan:</label>
                                    <input type="month" class="form-control fw-bold" id="pdf" name="pdf" required>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
        </li>

        <!-- Nav Item - Excel -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-file-excel text-success fa-lg"></i>
            </a>
            <!-- Dropdown - download excel -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="messagesDropdown">
            
            <h6 class="dropdown-header mb-2">
                Download Excel
            </h6>

        <div class="topbar-divider"></div>
            <div class="px-3 pb-3">
                <form method="POST" action="{{ route('komplain.xlsx') }}">
                    @csrf
                    <div class="d-flex align-items-end gap-2" style="max-width: 400px;">
                        <div class="flex-grow-1">
                            <label for="xlsx" class="form-label text-dark fw-semibold">Pilih bulan:</label>
                            <input type="month" class="form-control fw-bold" id="xlsx" name="xlsx" required>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
        </li>
     <div class="topbar-divider d-none d-sm-block"></div>
     
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-3 d-inline text-gray-600">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                        </button>
                </form>
            </div>
                <span class="mr-2 d-none d-lg-inline font-weight-bold text-gray-800 small">Ms. Vioni Az Zahra</span>
                <img class="img-profile rounded-circle ml-2"
                    src="img/undraw_profile.svg">
            </a>
            
           <!-- Dropdown - User Information -->
<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
aria-labelledby="userDropdown">

<!-- Bagian profil admin -->
<div class="px-3 py-2 d-flex align-items-center">
    <img src="img/undraw_profile.svg" class="rounded-circle" style="width: 35px; height: 35px; object-fit: cover;">
    <div class="ml-2">
        <div class="font-weight-bold text-dark" style="font-size: 0.8rem;">Admin Team Leader</div>
        <div class="text-muted" style="font-size: 0.75rem;">admin@nadimdesk.com</div>
    </div>
</div>

<div class="dropdown-divider"></div>

<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-800"></i>
    Logout
</a>
</div>

        </li>
    </ul>
</nav>
<!-- End of Topbar -->