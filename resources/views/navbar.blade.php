<nav class="navbar navbar-expand-lg navbar-dark bg-light">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Kab_Bandung_Barat.svg/1200px-Kab_Bandung_Barat.svg.png" width="30" height="30" class="d-inline-block align-top" alt="Logo Desa">
        <span class="text-dark">Desa Kartawangi</span>
    </a>
    <button class="navbar-toggler" style="background-color: rgb(168, 168, 168)" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('home') }}">Tentang Kami</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('home') }}">Sejarah</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Pemerintahan
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('struktur') }}">Struktur Desa</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Informasi Desa
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('galery') }}">Galeri kegiatan</a>
                    <a class="dropdown-item" href="#">Potensi Desa</a>
                </div>
            </li>
        </ul>
    </div>
</nav>