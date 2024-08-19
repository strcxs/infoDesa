<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Halaman Bootstrap</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
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

    <div class="container-fluid">
        <div id="produkCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 img-fluid" src="https://via.placeholder.com/800x400?text=Produk+1" alt="Produk 1" style="max-height: 450px; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Produk 1</h5>
                        <p>Deskripsi singkat produk 1.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 img-fluid" src="https://via.placeholder.com/800x400?text=Produk+2" alt="Produk 2" style="max-height: 450px; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Produk 2</h5>
                        <p>Deskripsi singkat produk 2.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 img-fluid" src="https://via.placeholder.com/800x400?text=Produk+3" alt="Produk 3" style="max-height: 450px; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Produk 3</h5>
                        <p>Deskripsi singkat produk 3.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 img-fluid" src="https://via.placeholder.com/800x400?text=Produk+4" alt="Produk 4" style="max-height: 450px; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Produk 4</h5>
                        <p>Deskripsi singkat produk 4.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#produkCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#produkCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container mt-2">
        <div class="row align-items-center">
            <!-- Foto Kepala Desa -->
            <div class="col-md-6 d-flex justify-content-center">
                <img src="https://via.placeholder.com/300" alt="Kepala Desa" class="img-fluid">
            </div>
            <!-- Konten About Us -->
            <div class="col-md-6 text-content text-justify">
                <h2>Tentang Kami</h2>
                <p>Selamat datang di halaman tentang kami. Nama Kepala Desa adalah Sugeng S.pd,. M.kom, yang memimpin desa kami dengan dedikasi dan komitmen. Kami berkomitmen untuk meningkatkan kesejahteraan masyarakat dan mengembangkan desa kami dengan berbagai inisiatif dan program. Di halaman ini, Anda akan menemukan informasi lebih lanjut tentang visi, misi, dan pencapaian desa kami.</p>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        {{-- <h2 style="text-align: center">Visi Misi Desa</h2> --}}
        <div>
            <span><b>Apa visi Desa Kartawangi?</b></span>
            <p>Visi kami adalah untuk menciptakan desa yang sejahtera, mandiri, dan berkelanjutan. Kami berkomitmen untuk memajukan ekonomi lokal, meningkatkan kualitas hidup, dan menjaga kelestarian lingkungan melalui berbagai program dan inisiatif yang inovatif.</p>
            <span><b>Berikut adalah Misi Dari Desa Kartawangi :</b></span>
            <ul class="list">
                <li class="list">Mengembangkan infrastruktur desa untuk mendukung pertumbuhan ekonomi dan kesejahteraan masyarakat.</li>
                <li class="list">Meningkatkan kualitas pendidikan dan kesehatan melalui berbagai program dan pelatihan.</li>
                <li class="list">Memelihara dan melestarikan lingkungan untuk memastikan keberlanjutan sumber daya alam bagi generasi mendatang.</li>
                <li class="list">Mendorong partisipasi aktif masyarakat dalam pengambilan keputusan dan perencanaan pembangunan desa.</li>
            </ul>
        </div>
    </div>
    <div class="container mt-2">
        <div class="row align-items-center">
            <div class="col-md-6 text-justify">
                <h2>geografis</h2>
                <p>Selamat datang di halaman tentang kami. Nama Kepala Desa adalah Sugeng S.pd,. M.kom, yang memimpin desa kami dengan dedikasi dan komitmen. Kami berkomitmen untuk meningkatkan kesejahteraan masyarakat dan mengembangkan desa kami dengan berbagai inisiatif dan program. Di halaman ini, Anda akan menemukan informasi lebih lanjut tentang visi, misi, dan pencapaian desa kami.</p>
            </div>
            <div class="col-md-6 d-flex justify-content-center">
                <img src="https://via.placeholder.com/300" alt="Kepala Desa" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="row align-items-center">
            <div class="col-md-6 text-justify">
                <h2>Demografis</h2>
                <p>Selamat datang di halaman tentang kami. Nama Kepala Desa adalah Sugeng S.pd,. M.kom, yang memimpin desa kami dengan dedikasi dan komitmen. Kami berkomitmen untuk meningkatkan kesejahteraan masyarakat dan mengembangkan desa kami dengan berbagai inisiatif dan program. Di halaman ini, Anda akan menemukan informasi lebih lanjut tentang visi, misi, dan pencapaian desa kami.</p>
            </div>
            <div class="col-md-6 d-flex justify-content-center">
                <img src="https://via.placeholder.com/300" alt="Kepala Desa" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="container mt-5 text-justify">
        <div class="history-container">
            <h2 class="history-title">Sejarah Desa Kartawangi</h2>
            <div class="history-content">
                <p>Desa Kartawangi terletak di Kabupaten Bandung Barat, Provinsi Jawa Barat, Indonesia. Desa ini memiliki sejarah yang panjang dan kaya yang mencerminkan perkembangan dan perubahan yang terjadi di kawasan tersebut sepanjang waktu.</p>
                <p>Asal usul nama Kartawangi berasal dari bahasa Sunda, di mana "Karta" berarti makmur atau sejahtera dan "Wangi" berarti harum. Nama ini mencerminkan harapan dan doa masyarakat desa agar desa ini selalu makmur dan harum dalam arti yang luas, baik dalam konteks kesejahteraan sosial maupun lingkungan.</p>
                <p>Pada masa lalu, Desa Kartawangi merupakan daerah pertanian yang subur dengan berbagai tanaman pangan yang ditanam oleh masyarakat setempat. Seiring berjalannya waktu, desa ini mengalami berbagai perubahan dalam struktur sosial dan ekonomi, terutama dengan adanya modernisasi dan perkembangan infrastruktur.</p>
                <p>Saat ini, Desa Kartawangi terus berkembang dengan adanya berbagai program pembangunan yang bertujuan untuk meningkatkan kualitas hidup warganya. Masyarakat desa tetap menjaga tradisi dan budaya lokal sambil beradaptasi dengan perubahan zaman, menjadikan Desa Kartawangi sebagai contoh harmonisasi antara tradisi dan modernitas.</p>
            </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="maps">
            <div style="width: 100%">
                <iframe width="100%vh" height="300px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Kartawangi+(Desa%20Kartawangi)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/">gps systems</a></iframe>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="bg-light text-center py-3">
        <p>&copy; 2024 Nurtanio University KKN Kartawangi. All rights reserved.</p>
    </footer>

    <!-- Link ke Bootstrap JS dan dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
