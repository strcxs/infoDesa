<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Kertawangi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" type="image/icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Kab_Bandung_Barat.svg/1200px-Kab_Bandung_Barat.svg.png"/>
    <style>
        #more {display: none;}
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('navbar')
    <div class="container-fluid">
        <div id="produkCarousel" class="carousel slide" data-ride="carousel">
            <div id="banner" class="carousel-inner">
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
                <img id="kades_image" src="" alt="Kepala Desa" class="img-fluid">
            </div>
            <!-- Konten About Us -->
            <div class="col-md-6 text-content text-justify">
                <h2>Tentang Kami</h2>
                <p id="about"></p>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        {{-- <h2 style="text-align: center">Visi Misi Desa</h2> --}}
        <div>
            <span><b>Apa visi Desa Kertawangi?</b></span>
            <p id="visi"></p>
            <span><b>Berikut adalah Misi Dari Desa Kertawangi :</b></span>
            <div id="misiList">

            </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="row align-items-center">
            <div class="col-md-6 text-justify">
                <h2>geografis</h2><br>
                {{-- content  --}}
                <span><strong>Nama Desa:</strong></span><br>
                <span id="nama_desa"></span><br>
                <span><strong>Alamat Desa:</strong></span><br>
                <span id="alamat_desa"></span><br>
                <span><strong>Luas Desa</strong></span><br>
                <span id="luas_desa"></span><br>
                <span><strong>Jumlah Penduduk:</strong></span><br>
                <span id="jumlah_penduduk"></span><br>
            </div>
            <div class="col-md-6 d-flex justify-content-center">
                <div class="maps">
                    <div style="width: 100%">
                        <iframe width="450px" height="300px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Kertawangi+(Desa%20Kertawangi)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/">gps systems</a></iframe>
                    </div>
                </div>
                {{-- <img src="https://asset-a.grid.id//crop/0x0:0x0/700x465/photo/2021/08/05/kondisi-geografis-pulau-pulau-di-20210805121131.jpg" alt="Kepala Desa" class="img-fluid"> --}}
            </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="row align-items-center">
            <div class="col-md-6 text-justify">
                <h2>Demografis</h2>
                <p id="demografis"></p>
            </div>
            <div class="col-md-6 d-flex justify-content-center">
                <img src="https://annurngrukem.com/wp-content/uploads/2019/12/Demografi-1024x1024.jpg" alt="Kepala Desa" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <!-- Card for Pendapatan -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-arrow-up me-2"></i> Pendapatan
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-info-circle me-2"></i> Informasi Pendapatan</h5>
                        <p class="card-text">
                            <strong>Jumlah:</strong> <span id="pendapatan"></span>
                        </p>
                    </div>
                    <div class="card-footer text-muted">
                        Data berdasarkan laporan terbaru.
                    </div>
                </div>
            </div>

            <!-- Card for Belanja -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-arrow-down me-2"></i> Belanja
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-info-circle me-2"></i> Informasi Belanja</h5>
                        <p class="card-text">
                            <strong>Jumlah:</strong> <span id="belanja"></span>
                        </p>
                    </div>
                    <div class="card-footer text-muted">
                        Data dapat berubah sesuai kebijakan terbaru.
                    </div>
                </div>
            </div>

            <!-- Card for Penerimaan -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-receipt me-2"></i> Penerimaan
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-info-circle me-2"></i> Informasi Penerimaan</h5>
                        <p class="card-text">
                            <strong>Jumlah:</strong> <span id="penerimaan"></span>
                        </p>
                    </div>
                    <div class="card-footer text-muted">
                        Berdasarkan laporan bulanan.
                    </div>
                </div>
            </div>

            <!-- Card for Pengeluaran -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-exclamation-circle me-2"></i> Pengeluaran
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-info-circle me-2"></i> Informasi Pengeluaran</h5>
                        <p class="card-text">
                            <strong>Jumlah:</strong> <span id="pengeluaran"></span>
                        </p>
                    </div>
                    <div class="card-footer text-muted">
                        Data dapat berubah sesuai dengan kebijakan terbaru.
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container mt-5 text-justify">
        <div class="history-container">
            <h2 class="history-title">Sejarah Desa Kertawangi</h2>
            <div class="history-content">
                <span id="sejarah"></span>
                <span id="dots">...</span>
                <span id="more"></span>
                <span id="readMore" onclick="toggleReadMore()" class="text text-primary">Tampilkan lebih banyak</span>
            </div>
        </div>
    </div> --}}
    <div class="container mt-2">
        {{-- <div class="maps">
            <div style="width: 100%">
                <iframe width="100%vh" height="300px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Kertawangi+(Desa%20Kertawangi)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/">gps systems</a></iframe>
            </div>
        </div> --}}
    </div>
    <!-- Footer -->
    <footer class="bg-light text-center py-3">
        <p>&copy; 2024 Nurtanio University KKN Kertawangi. All rights reserved.</p>
    </footer>

    <!-- Link ke Bootstrap JS dan dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function toggleReadMore() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var moreButton = document.getElementById("readMore");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                moreText.style.display = "none";
                moreButton.innerText = "Tampilkan lebih banyak"
            } else {
                dots.style.display = "none";
                moreButton.innerText = "Tampilkan lebih sedikit"
                moreText.style.display = "inline";
            }
        }
        function maxSplit(text,max){
            var fullText = text;
            var words = fullText.split(' ');
            
            return words.slice(max).join(' ');
        }
        function minSplit(text,max){
            var fullText = text;
            var words = fullText.split(' ');
            return words.slice(0, max).join(' ');
        }
        function formatRupiah(angka) {
            let numberString = angka.toString().replace(/[^0-9]/g, '');
            let formattedNumber = numberString.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            return `Rp. ${formattedNumber}`;
        }
        function formatAngka(angka) {
            let numberString = angka.toString().replace(/[^0-9]/g, '');
            let formattedNumber = numberString.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            return `${formattedNumber}`;
        }

        $(document).ready(function(){
            $.ajax({
                url: "/api/geografis/",
                method: "GET", // First change type to method here
                success: function(response) {
                    $('#nama_desa').text(response.nama_desa);
                    $('#alamat_desa').text(response.alamat_desa);
                    $('#luas_desa').text(formatAngka(response.luas_desa)+" km²");
                    $('#jumlah_penduduk').text(formatAngka(response.jumlah_penduduk)+" Jiwa");
                }
            });
            $.ajax({
                url: "/api/anggaran/",
                method: "GET", // First change type to method here
                success: function(response) {
                    $('#pendapatan').text(formatRupiah(response.pendapatan));
                    $('#pengeluaran').text(formatRupiah(response.pengeluaran));
                    $('#belanja').text(formatRupiah(response.belanja));
                    $('#penerimaan').text(formatRupiah(response.penerimaan));
                }
            });
            $.ajax({
                url: "/api/banner/",
                method: "GET", // First change type to method here
                success: function(response) {
                    response.forEach((data,index) => {
                        if (index == 0) {
                            $('#banner').append(
                                '<div class="carousel-item active">' +
                                '    <img class="d-block w-100 img-fluid" src="'+`{{asset('storage/images/banner/${data.banner_img}')}}`+'" alt="Produk 1" style="max-height: 450px; object-fit: cover;">' +
                                '    <div class="carousel-caption d-none d-md-block">' +
                                '    </div>' +
                                '</div>'
                            )
                        }else{
                            $('#banner').append(
                                '<div class="carousel-item">' +
                                '    <img class="d-block w-100 img-fluid" src="'+`{{asset('storage/images/banner/${data.banner_img}')}}`+'" alt="Produk 1" style="max-height: 450px; object-fit: cover;">' +
                                '    <div class="carousel-caption d-none d-md-block">' +
                                '    </div>' +
                                '</div>'
                            )
                        }
                    });
                }
            });
            $.ajax({
                url: "/api/dashboard/",
                method: "GET", // First change type to method here
                success: function(response) {
                    $('#kades_image').attr('src', `{{asset('storage/images/kades/${response.kades_image}')}}`);
                    $("#about").text(response.about);
                    $("#visi").text(response.visi);
                    $("#geografis").text(response.geografis);
                    $("#demografis").text(response.demografis);

                    // $("#sejarah").text(minSplit(response.sejarah,50));
                    // $("#more").text(maxSplit(response.sejarah,50));
                    
                    var misi = response.misi;
                    const points = misi.split('. ').filter(point => point.trim() !== '');
                    const htmlList = points.map(point => `<li>${point.trim()}</li>`).join('\n');

                    document.getElementById('misiList').innerHTML = `<ul>\n${htmlList}\n</ul>`;
                }
            });
        });
    </script>
</body>
</html>
