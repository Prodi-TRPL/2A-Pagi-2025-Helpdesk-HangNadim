<!-- Footer -->
<footer class="text-white py-5 bg-primary" id="contact" style="font-family:Segoe UI', sans-serif">
    <div class="container">
        <div class="row g-4"> <div class="col-lg-6">
            <h5 class="fw-bold mb-4">{{ __('messages.us') }}</h5>
            <ul class="list-unstyled">
                <li class="mb-3 d-flex">
                    <i class="fas fa-map-marker-alt me-3 mt-1"></i>
                    <span>PT Bandara Internasional Batam Jl. Hang Nadim no. 01 
                        <br>(Area Perkantoran Lt. 2) Batu Besar, Nongsa, Kota Batam
                        <br>Kepulauan Riau 29466</span>
                </li>
                <li class="mb-3 d-flex">
                    <i class="fas fa-phone me-3 mt-1"></i>
                    <span> (0778) 7630660</span>
                </li>
                <li class="mb-3 d-flex">
                    <i class="fas fa-envelope me-3 mt-1"></i>
                    <span>info@bthairport.com</span>
                </li>
            </ul>
        </div>
            
            <div class="col-lg-3">
                <h5 class="fw-bold mb-4">{{ __('messages.navigasi') }}</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ route('home') }}" class="nav-link text-white p-0">{{ __('messages.home_footer') }}</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('lacak.komplain') }}" class="nav-link text-white p-0">{{ __('messages.track_footer') }}</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h5 class="fw-bold mb-4">NadimDesk</h5>
                <p class="text-muted/white">{{ __('messages.footer') }}</p>
                <div class="d-flex gap-3 mt-4">
                    <a href="https://www.facebook.com/share/1YwQ5v6xQh/?mibextid=wwXIfr" class="btn btn-outline-light btn-sm rounded-circle">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.bthairport.com/" class="btn btn-outline-light btn-sm rounded-circle">
                        <i class="fas fa-globe"></i>
                    </a>
                    <a href="https://www.instagram.com/batamairport?igsh=MW5xNzhpa3VueGxjMA==" class="btn btn-outline-light btn-sm rounded-circle">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/bandarainternasionalbatam/" class="btn btn-outline-light btn-sm rounded-circle">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>
        <hr class="my-4">
        <div class="text-center">
            <p class="mb-0">&copy; {{ __('messages.copyright') }}</p>
        </div>
    </div>
</footer>
