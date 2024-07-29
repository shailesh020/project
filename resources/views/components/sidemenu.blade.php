<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        <div class="sidebar-brand-icon">
            <img class="img-thumbnail" src="{{asset('logo.png')}}" alt="LOGO" style="    width: 56px;
    margin-left: 24px;">
        </div>
        <div class="sidebar-brand-text mx-3">Yo Do Digital</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{activePage('home')}}">
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item {{activePage('logo')}}">
        <a class="nav-link" href="{{route('logo')}}">
            <i class="fab fa-artstation"></i>
            <span>Logo</span>
        </a>
    </li>
    <li class="nav-item {{activePage('testimonials')}}">
        <a class="nav-link" href="{{route('testimonials')}}">
            <i class="fa fa-list"></i>
            <span>Testimonials</span>
        </a>
    </li>

    <li class="nav-item {{activePage('blog')}}">
        <a class="nav-link" href="{{route('blog')}}">
            <i class="fa fa-cubes"></i>
            <span>Blog</span>
        </a>
    </li>
    <li class="nav-item {{activePage('contact-us')}}">
        <a class="nav-link" href="{{route('contact-us')}}">
            <i class="fas fa-address-card"></i>
            <span>Contact Us</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
