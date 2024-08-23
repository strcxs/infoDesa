<style>
    .navbar {
        /* padding: 1rem 2rem; Menambah padding */
    }
    .navbar-brand {
        display: flex;
        align-items: center;
    }
    .navbar-brand div {
        display: flex;
        flex-direction: column;
    }
    .navbar-brand img {
        width: 50px; /* Memperbesar logo */
        height: 50px;
    }

    .navbar-nav .nav-link {
        font-size: 1rem; /* Memperbesar ukuran font link */
        padding: 0.75rem 1rem; /* Menambah padding untuk link */
    }

    .dropdown-menu {
        font-size: 1rem; /* Memperbesar ukuran font menu dropdown */
    }

    .navbar-toggler {
        padding: 0.5rem; /* Menambah padding pada toggle button */
    }
    .bg-custom{
        background-color: #50A309;
        color: #ffffff;
    }
    
    .bg-custom a{
        color: #ffffff;   
        text-decoration: none;
    }
    .bg-custom ul{
        /* font-size: 14px; */
        list-style: none;;
        padding: 0;
        margin: 0
    }
    .bg-custom li{
        margin-bottom: 1rem;
    }
    .btn-custom{
        background-color: #50A309;
        color: #ffffff;
    }
    .navbar-brand .text-custom p {
        margin-bottom: -40px;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-custom sticky-top">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Kab_Bandung_Barat.svg/1200px-Kab_Bandung_Barat.svg.png" width="30" height="30" class="d-inline-block align-top" alt="Logo Desa">
        <div class="d-inline-block align-top ml-2 text-custom">
            <p class="text-light">Desa Kertawangi</p>
            <br>
            <span class="text-light" style="font-size: 12px;">Kabupaten Bandung Barat</span>
        </div>
    </a>
    <button class="navbar-toggler" style="background-color: rgb(168, 168, 168)" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            {{-- <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('home') }}">Tentang Kami</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('home') }}">Sejarah</a>
            </li> --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Pemerintahan
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-dark" href="{{ route('struktur') }}">Struktur Desa</a>
                    <a class="dropdown-item text-dark" href="{{ route('struktur') }}">Struktur Karta Desa</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Informasi Desa
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item  text-dark" href="{{ route('galery') }}">Galeri kegiatan</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Potensi desa
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item  text-dark" href="{{ route('produk') }}">Produk UMKM</a>
                    <a class="dropdown-item  text-dark" href="#">Atraksi</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $.ajax({
            url: "/api/dashboard/",
            method: "GET", // First change type to method here
            success: function(response) {
                $("#about-footer").text(response.about);
            }
        });
    });
</script>