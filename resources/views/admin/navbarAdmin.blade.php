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
<script>
    if (sessionStorage.getItem('auth')==null) {
        window.location.href = window.location.origin;
    }
</script>
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
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('adminAtraksi') ? 'active' : '' }}" href="{{ route('adminAtraksi') }}">
                    <i class="fas fa-dungeon"></i>
                    Atraksi
                </a>
            </li>
            <li class="nav-item mt-auto">
                <a class="nav-link text-danger {{ request()->routeIs('change') ? 'active' : '' }}" href="{{ route('change') }}">
                    <i class="fas fa-lock"></i>
                    Change Passoword
                </a>
            </li>
            <li class="nav-item mt-auto">
                <a id="logout" class="nav-link text-danger" href="#">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#logout').on('click', function(event) {
            sessionStorage.clear();
            return window.location = window.location.origin+'/login';
        })
    });
</script>