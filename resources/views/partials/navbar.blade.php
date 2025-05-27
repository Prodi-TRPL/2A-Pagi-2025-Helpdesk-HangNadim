<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-lg fixed-top" style="font-family:Segoe UI', sans-serif">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="{{ route('home') }}">NadimDesk</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-white" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link rounded-pill btn-hover fw-bold text-primary" href="#home">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-pill btn-hover fw-bold text-primary" href="#features">Lacak Komplain</a>
                </li>
                <div class="ms-2">
                  <a href="{{ route('login') }}" class="btn btn-outline-white rounded-pill btn-hover" style="color:white; background-color: rgb(255, 180, 31)">Log in</a>
                </div>
              </ul>
        </div>
    </div>
</nav>
