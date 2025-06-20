<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-lg fixed-top" style="font-family:Segoe UI', sans-serif">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="{{ route('home') }}">NadimDesk</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-white" id="navbarNav">
            <ul class="navbar-nav ms-auto">

               <!-- Dropdown Bahasa -->
                <li class="nav-item dropdown mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        🌐
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item" href="#">Indonesia</a></li>
                        <li><a class="dropdown-item" href="#">English</a></li>
                    </ul>
                </li>

                <!-- Menu Lain -->
                <li class="nav-item" style="margin-right: 20px;">
                    <a class="nav-link rounded-pill btn-hover fw-bold text-primary" href="/">Beranda</a>
                </li>

                <li class="nav-item" style="margin-right: 20px;">
                    <a class="nav-link rounded-pill btn-hover fw-bold text-primary" href="{{ route('lacak.komplain') }}">Lacak Komplain</a>
                </li>

                <li class="nav-item ms-2">
                    <a href="{{ route('login') }}" class="btn btn-outline-white rounded-pill btn-hover" style="color:white; background-color: rgb(255, 180, 31); width: 80px; display: inline-block; text-align: center;">Log in</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

