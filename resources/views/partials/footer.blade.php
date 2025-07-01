<!-- Footer -->
<footer class="text-white py-5 bg-primary" id="contact" style="font-family:Segoe UI', sans-serif">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <h5 class="fw-bold mb-4">NadimDesk</h5>
                <p class="text-muted/white">{{ __('messages.footer') }}</p>
                <div class="d-flex gap-3 mt-4">
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3">
                <h6 class="fw-bold mb-4">Navigasi</h6>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#home" class="nav-link text-white p-0">{{ __('messages.home_footer') }}</a></li>
                    <li class="nav-item mb-2"><a href="#features" class="nav-link text-white p-0">{{ __('messages.track_footer') }}</a></li>
                    <li class="nav-item mb-2"><a href="#options" class="nav-link text-white p-0">{{ __('messages.rating') }}</a></li>
                    <li class="nav-item mb-2"><a href="#contact" class="nav-link text-white p-0">{{ __('messages.contact') }}</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h6 class="fw-bold mb-4">{{ __('messages.us') }}</h6>
                <ul class="list-unstyled">
                    <li class="mb-3 d-flex">
                        <i class="fas fa-map-marker-alt me-3 mt-1"></i>
                        <span>Jl. Pahlawan</span>
                    </li>
                    <li class="mb-3 d-flex">
                        <i class="fas fa-phone me-3 mt-1"></i>
                        <span>+62 812 3456 7890</span>
                    </li>
                    <li class="mb-3 d-flex">
                        <i class="fas fa-envelope me-3 mt-1"></i>
                        <span>komplain@gmail.com</span>
                    </li>
                </ul>
            </div>
        </div>
        <hr class="my-4">
        <div class="text-center">
            <p class="mb-0">&copy; {{ __('messages.copyright') }}</p>
        </div>
    </div>
</footer>
