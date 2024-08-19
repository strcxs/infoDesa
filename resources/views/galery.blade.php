<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galeri Kegiatan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-light">
        <a class="navbar-brand" href="#">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Kab_Bandung_Barat.svg/1200px-Kab_Bandung_Barat.svg.png" width="30" height="30" class="d-inline-block align-top" alt="Logo Desa">
            <span class="text-dark">Desa Kartawangi</span>
        </a>
        <button class="navbar-toggler" style="background-color: rgb(168, 168, 168)" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="about.php">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="sejarah.php">Sejarah</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pemerintahan
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="struktur.php">Struktur Desa</a>
                        <a class="dropdown-item" href="galery.php">Galeri kegiatan</a>
                        <a class="dropdown-item" href="potensi.php">Potensi Desa</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Galeri Kegiatan Desa Kartawangi</h1>
        <p>Selamat datang di galeri kami! Di sini, Anda dapat melihat berbagai kegiatan dan acara yang telah berlangsung di Desa Kartawangi. Kami berharap galeri ini dapat memberikan gambaran yang lebih jelas tentang kehidupan dan budaya desa kami. Selamat menikmati!</p>
        <div class="row">
            <!-- Foto 1 -->
            <div class="col-12 col-md-6 col-lg-3 mb-2 d-flex justify-content-center">
                <div class="photo">
                    <img src="https://via.placeholder.com/300" alt="Foto 1" class="img-fluid">
                </div>
            </div>
            <!-- Foto 2 -->
            <div class="col-12 col-md-6 col-lg-3 mb-2 d-flex justify-content-center">
                <div class="photo">
                    <img src="https://via.placeholder.com/300" alt="Foto 2" class="img-fluid">
                </div>
            </div>
            <!-- Video 1 -->
            <div class="col-12 col-md-6 col-lg-3 mb-2 d-flex flex-column align-items-center">
                <iframe width="560" height="315" style="height: auto; width:100%;" 
                    src="https://www.youtube.com/embed/fip4ETMVd_I?si=97guyzrzRe2euNyS" 
                    title="YouTube video player" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen="">
                </iframe>
                <div class="caption">
                    <h3>jaloooo</h3>
                </div>
            </div>
            <!-- Video 2 -->
            <div class="col-12 col-md-6 col-lg-3 mb-2 d-flex justify-content-center">
                <div class="d-flex">
                    <iframe width="560" height="315" style="height: auto; width:100%;" 
                        src="https://www.youtube.com/embed/1kISBp8YFac" 
                        title="YouTube video player" frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen="">
                    </iframe>
                </div>
            </div>
            <!-- Tambahkan lebih banyak foto dan video sesuai kebutuhan -->
        </div>
    </div>
    <footer class="bg-light text-center py-3">
        <p>&copy; 2024 Nurtanio University KKN Kartawangi. All rights reserved.</p>
    </footer>

    <!-- Link ke Bootstrap JS dan dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>