
<div class="sidebar-area" id="sidebar-area">
    <div class="logo position-relative">
        <a href="index.html" class="d-block text-decoration-none py-lg-5">
            {{-- <img src="{{ asset("") }}assets/images/logo-icon.png" alt="logo-icon"> --}}
            <span class="logo-text fw-bold text-dark">MAX GYM</span>
        </a>
        <button
            class="sidebar-burger-menu bg-transparent p-0 border-0 opacity-0 z-n1 position-absolute top-50 end-0 translate-middle-y"
            id="sidebar-burger-menu">
            <i data-feather="x"></i>
        </button>
    </div>
    <aside id="layout-menu" class="layout-menu menu-vertical menu active" data-simplebar>
        <ul class="menu-inner">
            <li class="menu-item">
                <a href="/dashboard/{{ Auth::user()->role }}" class="menu-link">
                    <i data-feather="grid" class="menu-icon tf-icons"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="menu-title small text-uppercase">
                <span class="menu-title-text">APPS</span>
            </li>
            <li class="menu-item">
                <a href="/customer" class="menu-link">
                    <i data-feather="folder-minus" class="menu-icon tf-icons"></i>
                    <span class="title">Customer</span>
                </a>
            </li>
            @if (Auth::user()->role === 'admin')
            <li class="menu-item">
                <a href="/akses" class="menu-link">
                    <i data-feather="folder-minus" class="menu-icon tf-icons"></i>
                    <span class="title">Akses</span>
                </a>
            </li>    
            @elseif (Auth::user()->role === 'karyawan')
            <li class="menu-item disabled" >
                <a href="#" class="menu-link">
                    <i data-feather="folder-minus" class="menu-icon tf-icons"></i>
                    <span class="title">Akses</span>
                </a>
            </li>
            @endif

            
          
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <i data-feather="mail" class="menu-icon tf-icons"></i>
                    <span class="title">Rekapitulasi</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="/rekapitulasi-paket" class="menu-link">
                            Rekapitulasi Paket
                        </a>
                    </li>
                    
                </ul>
            </li>
            <li class="menu-item">
                <a href="/paket" class="menu-link">
                    <i data-feather="settings" class="menu-icon tf-icons"></i>
                    <span class="title">Settings</span>
                </a>
            </li>
        </ul>
    </aside>
    <div class="bg-white z-1 admin">
        <div class="d-flex align-items-center admin-info border-top">
            <div class="flex-shrink-0">
                <a href="profile.html" class="d-block">
                    <img src="{{ asset("") }}assets/images/admin.jpg" class="rounded-circle wh-54" alt="admin">
                </a>
            </div>
            <div class="flex-grow-1 ms-3 info">
                <a href="profile.html" class="d-block name">{{ Auth::user()->name }}</a>
                <a href="/logout">Log Out</a>
            </div>
        </div>
    </div>
</div>