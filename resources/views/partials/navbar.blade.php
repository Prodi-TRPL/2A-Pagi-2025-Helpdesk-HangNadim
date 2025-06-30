<!-- Navbar -->
<style>
    html, body {
      max-width: 100%;
      overflow-x: hidden;
    }
  </style>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-lg fixed-top" style="font-family: 'Segoe UI', sans-serif;">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <img src="{{ asset('hnd_logo.jpg') }}" alt="Icon" style="width: 90px;" class="me-4">

            <!-- TULISAN DI KIRI (Desktop only) -->
            <a class="navbar-brand fw-bold text-primary d-none d-lg-block" href="{{ route('home') }}">
                NadimDesk
            </a>
            
            <!-- TULISAN DI TENGAH (Mobile only) -->
            <a class="navbar-brand fw-bold text-primary d-block d-lg-none position-absolute start-50 translate-middle-x text-center" href="{{ route('home') }}">NadimDesk</a>
      </div>

        <div class="d-flex align-items-center">
            <li class="nav-item dropdown list-unstyled me-2">
                <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                     <img src="{{ asset(app()->getLocale() == 'id' ? 'img/id.svg' : 'img/gb.svg') }}" alt="Flag" width="20">
                      <p class="d-none d-md-inline">
                            {{ app()->getLocale() == 'id' ? 'Indonesia' : 'English' }}
                      </p>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                    <li>
                      <a href="{{ route('change.language', 'id') }}" class="dropdown-item">
                        <img src="{{ asset('img/id.svg') }}" alt="ID" width="20" class="me-2"> Indonesia
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('change.language', 'en') }}" class="dropdown-item">
                        <img src="{{ asset('img/gb.svg') }}" alt="ID" width="20" class="me-2"> English
                      </a>
                    </li>
                </ul>
            </li>

            <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse text-white" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Menu lainnya -->
                <li class="nav-item" style="margin-right: 20px;">
                    <a class="nav-link rounded-pill btn-hover fw-bold text-primary" href="{{ route('home') }}">{{ __('messages.home') }}</a>
                </li>

                <li class="nav-item" style="margin-right: 20px;">
                    <a class="nav-link rounded-pill btn-hover fw-bold text-primary" href="{{ route('lacak.komplain') }}">{{ __('messages.track_complaint') }}</a>
                </li>

                <li class="nav-item ms-2">
                    <a href="{{ route('login') }}" class="btn btn-outline-white rounded-pill btn-hover" style="color:white; background-color: rgb(255, 180, 31); width: 80px; display: inline-block; text-align: center;">Log in</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


