<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Kertawangi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" type="image/icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Kab_Bandung_Barat.svg/1200px-Kab_Bandung_Barat.svg.png"/>
    <style>
        #more {display: none;}
        @media (max-width: 426px) {
                #produkCarousel {
                    display: none !important;
                    size: 10px;
                }
            #maps {
                width: 100%;
            }
        }
        .download-button {
            font-size: 24px; /* Ukuran font tombol */
        }
        .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .bg-custom{
            background-color: #f67828;
            color: #ffffff;   
        }
        .carousel-container {
            position: relative;
            width: 100%;
            height: 450px; /* Adjust as needed */
        }
        .carousel-inner {
            height: 100%;
        }
        .carousel-header {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #f67828; /* Adjust color as needed */
            padding: 10px 20px; /* Adjust padding as needed */
            border-radius: 5px; /* Optional: Rounded corners */
            z-index: 10; /* Ensure this is higher than the carousel's z-index */
            text-align: center; /* Center text horizontally */
            letter-spacing: 2px; /* Adjust the spacing between letters */
            line-height: 4rem;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        .carousel-header p{
            font-size: 65px;
        }
        .carousel-header span{
            line-height: -5rem;
            font-size: 15px;
        }
        .carousel-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.334); Semi-transparent black overlay;
            z-index: 5; /* Ensure this is below the header but above the carousel */
        }
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            cursor: pointer;
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }
        .card-body i {
            color: #f67828;
            transition: color 0.3s ease;
        }
        .card:hover .card-body i {
            color: #0da217;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }
        #scrollToTopBtn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #f67828;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s, transform 0.3s;
        }
        #scrollToTopBtn.show {
            opacity: 1;
            transform: scale(1);
        }
        #scrollToTopBtn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('navbar')
    <div class="container-fluid mt-3" id="produkCarousel">
        <div class="carousel-container">
            <div class="carousel-overlay"></div> <!-- Dark overlay -->
            <div class="carousel-header">
                <p>WEBSITE DESA KERTAWANGI</p>
                <span>CISARUA - BANDUNG BARAT - JAWA BARAT</span>
            </div>
            <div style="width: 100%" class="carousel slide" data-ride="carousel">
                <div id="banner" class="carousel-inner">
                    <!-- Add carousel items here -->
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="row align-items-center">
            <!-- Foto Kepala Desa -->
            <div class="col-6 col-md-3">
                <div class="card text-center" data-target="umkm">
                    <div class="card-body">
                        <i class="fas fa-map-marked-alt fa-3x mb-3"></i>
                        <h5 class="card-title">Potensi Desa</h5>
                        <p class="card-text">Informasi mengenai potensi dan keunggulan desa.</p>
                    </div>
                </div>
            </div>
            <!-- Card 2: Keuangan Desa -->
            <div class="col-6 col-md-3">
                <div class="card text-center" data-target="keuangan-desa">
                    <div class="card-body">
                        <i class="fas fa-wallet fa-3x mb-3"></i>
                        <h5 class="card-title">Keuangan Desa</h5>
                        <p class="card-text">Informasi terkait keuangan desa dan anggaran.</p>
                    </div>
                </div>
            </div>
            <!-- Card 3: Layanan Masyarakat -->
            <div class="col-6 col-md-3">
                <div class="card text-center" data-target="layanan-masyarakat">
                    <div class="card-body">
                        <i class="fas fa-hands-helping fa-3x mb-3"></i>
                        <h5 class="card-title">Layanan Masyarakat</h5>
                        <p class="card-text">Layanan dan fasilitas yang disediakan untuk masyarakat.</p>
                    </div>
                </div>
            </div>
            <!-- Card 4: Kegiatan Desa -->
            <div class="col-6 col-md-3">
                <div class="card text-center" data-target="galeri">
                    <div class="card-body">
                        <i class="fas fa-calendar-day fa-3x mb-3"></i>
                        <h5 class="card-title">Kegiatan Desa</h5>
                        <p class="card-text">Informasi mengenai kegiatan dan acara desa.</p>
                    </div>
                </div>
            </div>
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
                <h2>Geografis</h2><br>
                {{-- content  --}}
                <table class="table x-table-striped table-sm">
                    <tbody>
                        <tr>
                            <td width="40%"><strong>Kode Desa</strong></td>
                            <td width="1px">:</td>
                            <td id="kode-desa"></td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>Tahun Pembentukan</strong></td>
                            <td width="1px">:</td>
                            <td id="tahun-pembentukan" class="text-truncate"></td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>Dasar Hukum</strong></td>
                            <td width="1px">:</td>
                            <td id="dasar-hukum" class="text-truncate"></td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>Tipologi</strong></td>
                            <td width="1px">:</td>
                            <td id="tipologi" class="text-truncate"></td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>Klasifikasi</strong></td>
                            <td width="1px">:</td>
                            <td id="klasifikasi" class="text-truncate"></td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>Kategori</strong></td>
                            <td width="1px">:</td>
                            <td id="kategori" class="text-truncate"></td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>Luas Wilayah</strong></td>
                            <td width="1px">:</td>
                            <td id="luas-wilayah" class="text-truncate"></td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>Batas Sebelah Utara</strong></td>
                            <td width="1px">:</td>
                            <td id="batas-utara" class="text-truncate"></td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>Batas Sebelah Selatan</strong></td>
                            <td width="1px">:</td>
                            <td id="batas-selatan" class="text-truncate"></td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>Batas Sebelah Timur</strong></td>
                            <td width="1px">:</td>
                            <td id="batas-timur" class="text-truncate"></td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>Batas Sebelah Barat</strong></td>
                            <td width="1px">:</td>
                            <td id="batas-barat" class="text-truncate"></td>
                        </tr>
                    </tbody>
                  </table>
            </div>
            <div class="col-md-6 d-flex justify-content-center">
                <div class="maps">
                    <div style="width: 100%">
                        <iframe id="maps" width="450px" height="500px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Kertawangi+(Desa%20Kertawangi)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/">gps systems</a></iframe>
                    </div>
                </div>
                {{-- <img src="https://asset-a.grid.id//crop/0x0:0x0/700x465/photo/2021/08/05/kondisi-geografis-pulau-pulau-di-20210805121131.jpg" alt="Kepala Desa" class="img-fluid"> --}}
            </div>
        </div>
    </div>
    <div class="container mt-5" id="keuangan-desa">
        <h2>Keuangan Desa</h2>
        <div class="row">
            <!-- Card for Pendapatan -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-custom text-white">
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
                    <div class="card-header bg-custom text-white">
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
                    <div class="card-header bg-custom text-white">
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
                    <div class="card-header bg-custom text-white">
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
    <div class="container mt-5 mb-5" id="layanan-masyarakat">
        <h2>Layanan Masyarakat</h2>
        <div class="container">
            <div class="text-justify">
                <ul>
                    <li>Silahkan anda dapat mengunduhnya Aplikasi SISPEK yang telah disediakan</li>
                    <li>Aplikasi ini bertujuan untuk mempermudah masyarakat dalam mengajukan surat</li>
                    <li>Masyarakat dapat melihat informasi mengenai persyaratan surat, informasi perangkat desa, 
                        informasi desa, konsultasi dengan perangkat desa dan mengajukan surat melalui aplikasi</li>
                    <li>Masyarakat perlu untuk mendaftarkan diri terlebih dahulu untuk dapat menggunakan aplikasi <br>
                        dan menunggu akun dibuatkan oleh admin</li>
                    <li>Aplikasi Sispek nantinya akan dapat diunduh melalui playstore dan masih dalam tahap proses</li>
                    <li>Selamat menggunakan aplikasi</li>
                </ul>
                <a href="{{ route('download.pdf') }}" class="btn btn-success download-button">
                    <i class="fas fa-download"></i> Download SISPEK <i class="fab fa-android"></i>
                </a>
            </div>
        </div>
    </div>
    <button id="scrollToTopBtn"><i class="fas fa-chevron-up"></i></button>
    @include('footer');

    <!-- Link ke Bootstrap JS dan dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('click', () => {
                const targetId = card.getAttribute('data-target');
                if (targetId === 'galeri') {
                    return window.location = window.location.origin+'/galeri';
                }else if (targetId === 'umkm') {
                    return window.location = window.location.origin+'/produk';
                } 
                const targetElement = document.getElementById(targetId);
                targetElement.scrollIntoView({ behavior: 'smooth' });

                const offset = 150; // Offset distance in pixels
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                const targetPosition = targetElement.getBoundingClientRect().top + scrollTop - offset;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            });
        });
        //
        const scrollToTopBtn = document.getElementById('scrollToTopBtn');
        
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) { // Show button after scrolling 300px
                scrollToTopBtn.classList.add('show');
            } else {
                scrollToTopBtn.classList.remove('show');
            }
        });
        
        scrollToTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        //
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
                    $('#kode-desa').text(response.kode_desa);
                    $('#tahun-pembentukan').text(response.tahun_pembentukan);
                    $('#dasar-hukum').text(response.dasar_hukum);
                    $('#tipologi').text(response.tipologi);
                    $('#klasifikasi').text(response.klasifikasi);
                    $('#kategori').text(response.kategori);
                    $('#luas-wilayah').text(response.luas_wilayah);
                    $('#batas-utara').text(response.batas_utara);
                    $('#batas-selatan').text(response.batas_selatan);
                    $('#batas-timur').text(response.batas_timur);
                    $('#batas-barat').text(response.batas_barat);

                    // $('#nama_desa').text(response.nama_desa);
                    // $('#alamat_desa').text(response.alamat_desa);
                    // $('#luas_desa').text(formatAngka(response.luas_desa)+" km²");
                    // $('#jumlah_penduduk').text(formatAngka(response.jumlah_penduduk)+" Jiwa");
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
