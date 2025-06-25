<style>
    @keyframes growFromCenter {
      0% {
        transform: scaleY(0);
        opacity: 0;
      }
      100% {
        transform: scaleY(1);
        opacity: 1;
      }
    }
    
    .sidebar .nav-link {
      position: relative;
      padding-left: 20px;
    }
    
    .sidebar .nav-link::before {
      content: "";
      position: absolute;
      left: 0;
      top: 8px;
      bottom: 8px;
      width: 4px;
      background-color: #ffffff;
      border-radius: 0 4px 4px 0;
      transform-origin: center;
      transform: scaleY(0);
      opacity: 0;
    }
    
    .sidebar .nav-link.active::before {
      animation: growFromCenter 0.4s ease-out forwards;
    }
      </style>
        <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        
          <a class="sidebar-brand d-flex align-items-center justify-content-start">
            <div class="sidebar-brand-icon rotate-n-15"></div>

                <img src="hndround-remove.png" alt="Icon" style="width:40px; margin-left:10px; margin-right:8px;">
                <div class="sidebar-brand-text mx-1">NadimDesk</div>
            </a>
                <hr class="sidebar-divider d-none d-md-block" style="opacity: 0.5; background-color: rgb(255, 255, 255); height: 1px; border: none;">
        
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
            @if(auth()->user()->role != 'Direktur')
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('komplain') ? 'active' : '' }}" href="{{ route('komplain') }}">            
                    <i class="fas fa-fw fa-comment-dots"></i>
                    <span>Komplain</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('saran') ? 'active' : '' }}" href="{{ route('saran') }}">
                    <i class="fas fa-lightbulb"></i>
                    <span>Saran</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('penilaian') ? 'active' : '' }}" href="{{ route('penilaian') }}">
                    <i class="fas fa-star"></i>
                    <span>Penilaian</span></a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('data.pelapor') ? 'active' : '' }}" href="{{ route('data.pelapor') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Pelapor</span></a>
            </li>

            @if(auth()->user()->role == 'Manager')
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('kelola.admin') ? 'active' : '' }}" href="{{ route('kelola.admin') }}">
                    <i class="fas fa-cog"></i>
                    <span>Kelola Admin</span></a>
            </li>
            @endif
            @endif
           <div class="text-center d-none d-md-inline" style="margin-top: 20px;">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
        
        </ul>
        <!-- End of Sidebar --> 