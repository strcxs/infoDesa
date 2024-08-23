<style>
    .nav-link.active {
        background-color: #007bff; /* Change to your preferred active color */
        color: #fff; /* Text color when active */
        border-radius: 0.25rem; /* Optional: Adds rounded corners to the active link */
    }

    .nav-link.active i {
        color: #fff; /* Icon color when active */
    }
</style>
<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
    <button class="btn btn-light d-md-none" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-expanded="false" aria-controls="sidebarCollapse">
        <i class="bi bi-list"></i> Menu
    </button>
    <div class="collapse d-md-block" id="sidebarCollapse">
        <h4 class="text-white">Admin Dashboard</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('admin') ? 'active' : '' }}" href="{{ route('admin') }}">
                    <i class="fas fa-house"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('adminBanner') ? 'active' : '' }}" href="{{ route('adminBanner') }}">
                    <i class="fas fa-image"></i>
                    Banner
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('adminGeo') ? 'active' : '' }}" href="{{ route('adminGeo') }}">
                    <i class="fas fa-book-atlas"></i>
                    Geografis
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('adminAPBN') ? 'active' : '' }}" href="{{ route('adminAPBN') }}">
                    <i class="fas fa-dollar-sign"></i>
                    APBD
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('adminStruktur') ? 'active' : '' }}" href="{{ route('adminStruktur') }}">
                    <i class="fas fa-sitemap"></i>
                    Struktur
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('adminGalery') ? 'active' : '' }}" href="{{ route('adminGalery') }}">
                    <i class="fab fa-envira"></i>
                    Galery
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('adminProduk') ? 'active' : '' }}" href="{{ route('adminProduk') }}">
                    <i class="fas fa-cart-shopping"></i>
                    UMKM
                </a>
            </li>
        </ul>
    </div>
</nav>