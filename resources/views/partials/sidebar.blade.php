<head>
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
    #accordionSidebar.sidebar-dark .nav-link {
        color: #ffffff !important; /
        font-size: 1.1rem; 
        padding-left: 25px; 
    }
    #accordionSidebar.sidebar-dark .nav-link:hover {
    background-color: rgba(255, 255, 255, 0.2); 
    color: #ffffff !important; 
    transition: background-color 0.3s ease, border-radius 0.3s ease; 
    }
    #accordionSidebar.sidebar-dark .nav-item.active .nav-link {
    color: #ffffff !important; 
    background-color: rgba(255, 255, 255, 0.2); 
    border-radius: 6px; 
    }
    #accordionSidebar.sidebar-dark .nav-link i {
    color: #ffffff !important; 
    font-size: 1rem; 
    }
    </style>
</head>

<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            
        </div>
        <div class="sidebar-brand-text mx-3">NadimDesk</div>
    </a>
        <hr class="sidebar-divider d-none d-md-block" style="opacity: 0.5; background-color: rgb(255, 255, 255); height: 1px; border: none;">

    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-comment-dots"></i>
            <span>Komplain</span>
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <i class="fas fa-lightbulb"></i>
            <span>Saran</span></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <i class="fas fa-star"></i>
            <span>Penilaian</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-user"></i>
            <span>Data Pelapor</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-cog"></i>
            <span>Kelola Admin</span></a>
    </li>

   <div class="text-center d-none d-md-inline" style="margin-top: 20px;">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->