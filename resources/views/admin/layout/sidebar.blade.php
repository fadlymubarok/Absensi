<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-text mx-3">Absensi Siswa</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        DATA
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request()->is('absen') || Request()->is('rayons*') || Request()->is('rombels*') || Request()->is('registrasi') || Request()->is('admins*') || Request()->is('siswa*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-table"></i>
            <span>Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request()->is('absen') ? 'active' : ''}}" href="/absen">Data Absen</a>
                <a class="collapse-item {{ Request()->is('rayons*') ? 'active' : ''}}" href="/rayons">Data Rayon</a>
                <a class="collapse-item {{ Request()->is('rombels*') ? 'active' : ''}}" href="/rombels">Data Rombel</a>
                <a class="collapse-item {{ Request()->is('siswa*') ? 'active' : ''}}" href="/siswa">Data Siswa</a>
                <a class="collapse-item {{ Request()->is('admin*') ? 'active' : ''}}" href="/admins">Data Admin</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>