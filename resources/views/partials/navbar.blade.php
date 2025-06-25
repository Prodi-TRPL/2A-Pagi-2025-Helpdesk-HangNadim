<!-- Navbar -->
<style>
    html, body {
      max-width: 100%;
      overflow-x: hidden;
    }
  </style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-lg fixed-top" style="font-family: 'Segoe UI', sans-serif;">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
        <img src="{{ asset('hnd_logo.jpg') }}" alt="Icon" style="width: 90px;" class="me-4">
        
        <!-- TULISAN DI KIRI (Desktop only) -->
        <a class="navbar-brand fw-bold text-primary d-none d-lg-block mb-0" href="{{ route('home') }}">
          NadimDesk
        </a>
      </div>
  
      <!-- TULISAN DI TENGAH (Mobile only) -->
      <a class="navbar-brand fw-bold text-primary d-block d-lg-none position-absolute start-50 translate-middle-x text-center"
      style="top: 0.5rem; z-index: 1031;">NadimDesk</a>
   
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
  
        <div class="collapse navbar-collapse text-white" id="navbarNav">
            <ul class="navbar-nav ms-auto">

               <!-- Dropdown Bahasa -->
               <li class="nav-item dropdown mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-globe2 "></i></a>
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

