<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle me-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ms-auto">

    @if(auth()->user()->role != 'Officer')
        <!-- Dropdown - PDF -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-file-pdf text-danger fa-lg"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header mb-2">Download PDF</h6>
                <div class="px-3 pb-3">
                    <form action="{{ route('komplain.pdf') }}" method="POST">
                        @csrf
                        <div class="d-flex align-items-end gap-2" style="max-width: 400px;">
                            <div class="flex-grow-1">
                                <label for="pdf" class="form-label text-dark fw-semibold">Pilih bulan:</label>
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
            </div>
        </li>

        <!-- Dropdown - Excel -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-file-excel text-success fa-lg"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header mb-2">Download Excel</h6>
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
            </div>
        </li>
        @endif
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Dropdown - User Info -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <span class="me-3 d-inline text-gray-600">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
            </a>
            <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <!-- Bagian profil admin -->
                <div class="px-3 py-2 d-flex align-items-center">
                    <img src="{{ asset('img/undraw_profile.svg') }}" class="rounded-circle"
                         style="width: 35px; height: 35px; object-fit: cover;">
                    <div class="ms-2">
                        <div class="fw-bold text-dark" style="font-size: 0.8rem;">{{ Auth::user()->role }}</div>
                        <div class="text-muted" style="font-size: 0.75rem;">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}" class="prevent-multiple-submit">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
                        Logout
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>
