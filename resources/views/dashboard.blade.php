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
            background-color: #50A309;
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
            color: #ffffff; /* Adjust color as needed */
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
        #card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        #card:hover {
            cursor: pointer;
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }
        #card .card-body i {
            color: #50A309;
            transition: color 0.3s ease;
        }
        #card:hover .card-body i {
            color: #d7c601;
        }
        #card .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }
        /*  */
        #umkm {
          display: flex;
          flex-direction: column;
          height: 100%;
        }
      
        #umkm .card-body {
          flex: 1;
          display: flex;
          flex-direction: column;
          justify-content: flex-end;
        }
        #umkm .btn-custom{
            background-color: #50A309;
            color: #ffffff;
        }

        #scrollToTopBtn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #50A309;
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
            background-color: #39690f;
        }
        hr.custom-hr {
            border: none;          /* Menghapus border default */
            height: 2px;           /* Ketebalan garis */
            background-color: rgb(230, 230, 230); Warna garis
            margin: 20px 0;        /* Jarak atas dan bawah */
        }
    </style>
    <script>
        async function fetchRSS() {
            const response = await fetch('https://nasional.kompas.com/read/2024/08/22/17383281/revisi-uu-pilkada-batal-disahkan-dpr-tetap-pakai-putusan-mk'); // Ganti dengan URL RSS Feed
            const text = await response.text();
            const parser = new DOMParser();
            const xmlDoc = parser.parseFromString(text, "text/xml");
            const items = xmlDoc.querySelectorAll('item');
            const newsContainer = document.getElementById('news');

            items.forEach(item => {
                const title = item.querySelector('title').textContent;
                const description = item.querySelector('description').textContent;
                const link = item.querySelector('link').textContent;

                const articleElement = document.createElement('div');
                articleElement.innerHTML = `
                    <h2>${title}</h2>
                    <p>${description}</p>
                    <a href="${link}" target="_blank">Baca selengkapnya</a>
                `;
                newsContainer.appendChild(articleElement);
            });
        }

        window.onload = fetchRSS;
    </script>
</head>
<body>
    <!-- Navbar -->
    @include('navbar')
    <div id="news">

    </div>
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
                <div id="card" class="card text-center" data-target="umkm">
                    <div class="card-body">
                        <i class="fas fa-map-marked-alt fa-3x mb-3"></i>
                        <h5 class="card-title">Potensi Desa</h5>
                        <p class="card-text">Informasi mengenai potensi dan keunggulan desa.</p>
                    </div>
                </div>
            </div>
            <!-- Card 2: Keuangan Desa -->
            <div class="col-6 col-md-3">
                <div id="card" class="card text-center" data-target="keuangan-desa">
                    <div class="card-body">
                        <i class="fas fa-wallet fa-3x mb-3"></i>
                        <h5 class="card-title">Keuangan Desa</h5>
                        <p class="card-text">Informasi terkait keuangan desa dan anggaran.</p>
                    </div>
                </div>
            </div>
            <!-- Card 3: Layanan Masyarakat -->
            <div class="col-6 col-md-3">
                <div id="card" class="card text-center" data-target="layanan-masyarakat">
                    <div class="card-body">
                        <i class="fas fa-hands-helping fa-3x mb-3"></i>
                        <h5 class="card-title">Layanan Masyarakat</h5>
                        <p class="card-text">Layanan untuk masyarakat.</p>
                    </div>
                </div>
            </div>
            <!-- Card 4: Kegiatan Desa -->
            <div class="col-6 col-md-3">
                <div id="card" class="card text-center" data-target="galerix">
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
                <h2 style="color: #50A309;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Tentang Kami</h2>
                <p id="about"></p>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        {{-- <h2 style="text-align: center">Visi Misi Desa</h2> --}}
        <div class="text-content">
            <h4 style="color: #50A309;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Apa Visi Desa Kertawangi?</h4>
            {{-- <span>Apa visi Desa Kertawangi?</span> --}}
            <p id="visi"></p>
            <h4 style="color: #50A309;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">>Berikut adalah Misi Dari Desa Kertawangi :</h4>
            {{-- <span><b>Berikut adalah Misi Dari Desa Kertawangi :</b></span> --}}
            <div id="misiList">

            </div>
        </div>
    </div>
    <div class="container mt-5" id="umkm">
        <div class="text-center mb-4">
            <hr class="custom-hr">
            <h2 class="text-content" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;color: #50A309">UMKM Desa Kertawangi</h2>
            
        </div>
        <div class="row" id="content-produk">
            
        </div>
        <div class="text-center">
            <a href="{{ route('produk') }}">Tampilkan lebih banyak produk..</a>
        </div>
    </div>
    <hr class="custom-hr">
    <div class="container mt-5" id="galerix">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-4 mb-4 d-flex align-items-center text-center">
                <p>
                    <span style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size: 40px;color: #50A309">Kegiatan Kertawangi</span><br><br>
                    <span>
                        Kami berkomitmen untuk mempererat hubungan antarwarga dan mempromosikan keunikan budaya lokal. Kami menyambut Anda untuk mengeksplorasi berbagai acara dan kegiatan yang mencerminkan kekayaan tradisi dan kehidupan sehari-hari di desa kami. Galeri ini dirancang untuk memberikan gambaran tentang semangat komunitas kami serta berbagai aktivitas yang dapat Anda temukan di sini. Selamat menikmati kunjungan Anda dan jangan ragu untuk bergabung dengan kami dalam merayakan kehidupan di Desa Kertawangi!    
                    </span>
                </p>
            </div>
            <div class="col-12 col-md-8 col-lg-8 mb-8">
                <div class="row" id="galeri" >
                    
                </div>
                <div class="text-center">
                    <a href="{{ route('galery') }}">Tampilkan lebih banyak Kegiatan..</a>
                </div>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="container mt-5">
        <div class="text-center mb-4">
            <hr class="custom-hr">
            <h2 class="text-content" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;color: #50A309">Atraksi Desa Kertawangi</h2>
            
        </div>
        <div class="row" id="content-atraksi">
            
        </div>
        <div class="text-center">
            <a href="{{ route('atraksi') }}">Tampilkan lebih banyak atraksi..</a>
        </div>
    </div>
    {{--  --}}
    <div class="container mt-5" id="keuangan-desa">
        <h2 style="color: #50A309;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Keuangan Desa</h2>
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
        <h2 style="color: #50A309;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Layanan Masyarakat</h2>
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
                </ul><br><br>
                <a style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif" href="{{ route('download.pdf') }}" class="btn btn-success download-button">
                    <i class="fas fa-download"></i> DOWNLOAD SISPEK <i class="fab fa-android"></i>
                </a>
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
            <div class="col-md-6 d-flex justify-content-center mb-4">
                <div class="maps">
                    <div style="width: 100%">
                        <iframe id="maps" width="450px" height="500px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Kertawangi+(Desa%20Kertawangi)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/">gps systems</a></iframe>
                    </div>
                </div>
                {{-- <img src="https://asset-a.grid.id//crop/0x0:0x0/700x465/photo/2021/08/05/kondisi-geografis-pulau-pulau-di-20210805121131.jpg" alt="Kepala Desa" class="img-fluid"> --}}
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
        function isValidPhoneNumber(phoneNumber) {
            phoneNumber = phoneNumber.trim();
            const phoneRegex = /^(?:\+62|0)\d{8,12}$/;
            return phoneRegex.test(phoneNumber);
        }
        function convertPhoneNumber(phoneNumber) {
            phoneNumber = phoneNumber.trim();
            if (phoneNumber.startsWith('0')) {
                return '+62' + phoneNumber.substring(1);
            } else {
                return phoneNumber;
            }
        }
        $(document).ready(function(){
            $.ajax({
                url: "/api/atraksi/",
                method: "GET", // First change type to method here
                success: function(response) {
                    response.forEach((data,index) => {
                        medsos = null;
                        maps = null;
                        
                        if (data.medsos !=="-") {
                            medsos = `<a href="${data.medsos}" class="btn btn-instagram"><i class="fab fa-instagram"></i> Instagram</a>`;
                        }else{
                            medsos = '<a href="#" class="btn btn-instagram disabled"><i class="fab fa-instagram"></i> Instagram</a>';
                        } 

                        if(data.gmaps !== "-"){
                            maps = '<a href="'+data.gmaps+'" id="button" class="btn btn-custom mb-2"><i class="fa-solid fa-location-dot"></i> Maps</a>';
                        } else{
                            maps = '<a href="#" id="button" class="btn btn-custom disabled mb-2"><i class="fa-solid fa-location-dot"></i> Maps</a>';
                        }
                        $('#content-atraksi').append(
                            '<div class="col-6 col-lg-4 mb-4">' +
                            '    <div class="card" id="umkm">' +
                            '        <div id="carouselExampleControls'+index+'" class="carousel slide">' +
                            '            <div id="produk-img-'+data.id+'" class="carousel-inner">' +
                            '            </div>' +
                            '            <a class="carousel-control-prev" href="#carouselExampleControls'+index+'" role="button" data-slide="prev">' +
                            '                <span class="carousel-control-prev-icon" aria-hidden="true"></span>' +
                            '                <span class="sr-only">Previous</span>' +
                            '            </a>' +
                            '            <a class="carousel-control-next" href="#carouselExampleControls'+index+'" role="button" data-slide="next">' +
                            '                <span class="carousel-control-next-icon" aria-hidden="true"></span>' +
                            '                <span class="sr-only">Next</span>' +
                            '            </a>' +
                            '        </div>' +
                            '        <div class="card-body">' +
                            '            <p class="card-title"><strong>'+data.nama+'</strong></p>' +
                            // '            <div id="button">'+
                                            maps +
                                            medsos+
                            // '            </div>'+
                            '        </div>' +
                            '    </div>' +
                            '</div>'
                        );
                        if (data.data_image.length != 0) {
                            data.data_image.forEach((image,index) => {
                                if (image.atraksi_img != null) {
                                    if (index == 0) {
                                        $("#produk-img-"+data.id+"").append(
                                            '<div class="carousel-item active">' +
                                            '    <img style="height: 200px; object-fit: cover" src="'+`{{asset('storage/images/atraksi/${image.atraksi_img}')}}`+'" class="d-block w-100" alt="Produk 1">' +
                                            '</div>' 
                                        );
                                    }else{
                                        $("#produk-img-"+data.id+"").append(
                                            '<div class="carousel-item">' +
                                            '    <img style="height: 200px; object-fit: cover" src="'+`{{asset('storage/images/atraksi/${image.atraksi_img}')}}`+'" class="d-block w-100" alt="Produk 1">' +
                                            '</div>' 
                                        );
                                    }
                                }else{
                                    $("#produk-img-"+data.id+"").append(
                                        '<div class="carousel-item">' +
                                        '    <img style="height: 200px; object-fit: cover" src="'+`{{asset('storage/images/atraksi/${image.atraksi_img}')}}`+'" class="d-block w-100" alt="Produk 1">' +
                                        '</div>' 
                                    );
                                }
                            });
                        }else{
                            $("#produk-img-"+data.id+"").append(
                                '<div class="carousel-item active">' +
                                '    <img style="height: 200px; object-fit: cover" src="https://www.svgrepo.com/show/508699/landscape-placeholder.svg" class="d-block w-100" alt="Produk 1">' +
                                '</div>' 
                            );
                        }
                    });
                }
            });
            $.ajax({
                url: "/api/galeri/",
                method: "GET", // First change type to method here
                success: function(response) {
                    var num = 0;
                    response.forEach(data => {
                        if (num<4) {
                            if (data.youTube != null) {
                                $('#galeri').append(
                                    `<div class="card col-6 mb-2 p-3">
                                        <div class="video-container">
                                            <iframe style="object-fit:cover"
                                                src="${data.youTube}" 
                                                title="YouTube video player" frameborder="0" 
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                                allowfullscreen>
                                            </iframe>
                                        </div>
                                        <div class="title" display>
                                            <span><strong>${data.title}</strong></span>
                                        </div>
                                        <div class="caption" display>
                                            <span>${data.caption}</span>    
                                        </div>
                                    </div>`
                                );
                            }else{
                                var image = "{{asset('storage/images/galeri/')}}" + '/' + data.image;
                                $('#galeri').append(
                                    `<div class="card col-6 mb-4 p-3">
                                        <div class="image-container">
                                            <img 
                                                src="${image}" 
                                                alt="Foto ${data.image}" 
                                                class="img-fluid" 
                                                style="object-fit: cover; cursor: pointer;height:150px;width:300px;margin-bottom:10px" 
                                                data-toggle="modal" 
                                                data-target="#imageModal-${data.id}">
                                        </div>
                                        <div class="title" display>
                                            <span><strong>${data.title}</strong></span>
                                        </div>
                                        <div class="caption" display>
                                            <span>${data.caption}</span>    
                                        </div>
                                    </div>`+
    
                                    // modal
                                    "<div class=\"modal fade\" id=\"imageModal-"+data.id+"\" tabindex=\"-1\" aria-labelledby=\"imageModalLabel\" aria-hidden=\"true\">"+
                                    "    <div class=\"modal-dialog modal-dialog-centered modal-lg\">"+
                                    "        <div class=\"modal-content\">"+
                                        "                <img "+
                                        "                    src=\""+image+"\" "+
                                        "                    alt=\"Foto 1\" "+
                                        "                    class=\"img-fluid\""+
                                        "                >"+
                                    "        </div>"+
                                    "    </div>"+
                                    "</div>"
    
                                )
                            }
                        }
                        num++;
                    });
                }
            });
            $.ajax({
                url: "/api/produk/",
                method: "GET", // First change type to method here
                success: function(response) {
                    var loop = 0;
                    response.forEach((data,index) => {
                        number = null;
                        whastapp = null;
                        if (loop <3) {
                            if (data.telp !=="-") {
                                whastapp = '<a href="https://wa.me/'+convertPhoneNumber(data.telp)+'" class="btn btn-success"><i class="fab fa-whatsapp"></i> Whatsapp</a>';
                            }else{
                                whastapp = '<a href="#" class="btn btn-success disabled"><i class="fab fa-whatsapp"></i> Whatsapp</a>';
                            } 

                            if(data.link !== "-"){
                                number = '<a href="'+data.link+'" id="button" class="btn btn-custom mb-2"><i class="fas fa-cart-shopping"></i> E-Commerce</a>';
                            } else{
                                number = '<a href="#" id="button" class="btn btn-custom disabled mb-2"><i class="fas fa-cart-shopping"></i> E-Commerce</a>';
                            }
                            $('#content-produk').append(
                                '<div class="col-6 col-lg-4 mb-3">' +
                                '    <div class="card" id="umkm">' +
                                '        <div id="pr-carouselExampleControls'+index+'" class="carousel slide">' +
                                '            <div id="produk-img-'+data.id+'" class="carousel-inner">' +
                                '            </div>' +
                                '            <a class="carousel-control-prev" href="#pr-carouselExampleControls'+index+'" role="button" data-slide="prev">' +
                                '                <span class="carousel-control-prev-icon" aria-hidden="true"></span>' +
                                '                <span class="sr-only">Previous</span>' +
                                '            </a>' +
                                '            <a class="carousel-control-next" href="#pr-carouselExampleControls'+index+'" role="button" data-slide="next">' +
                                '                <span class="carousel-control-next-icon" aria-hidden="true"></span>' +
                                '                <span class="sr-only">Next</span>' +
                                '            </a>' +
                                '        </div>' +
                                '        <div class="card-body">' +
                                '            <p class="card-title"><strong>'+data.nama+'</strong></p>' +
                                // '            <div id="button">'+
                                                number +
                                                whastapp+
                                // '            </div>'+
                                '        </div>' +
                                '    </div>' +
                                '</div>'
                            );
                            if (data.data_image.length != 0) {
                                data.data_image.forEach((image,index) => {
                                    if (image.produk_img != null) {
                                        if (index == 0) {
                                            $("#produk-img-"+data.id+"").append(
                                                '<div class="carousel-item active">' +
                                                '    <img style="height: 200px; object-fit: cover" src="'+`{{asset('storage/images/produk/${image.produk_img}')}}`+'" class="d-block w-100" alt="Produk 1">' +
                                                '</div>' 
                                            );
                                        }else{
                                            $("#produk-img-"+data.id+"").append(
                                                '<div class="carousel-item">' +
                                                '    <img style="height: 200px; object-fit: cover" src="'+`{{asset('storage/images/produk/${image.produk_img}')}}`+'" class="d-block w-100" alt="Produk 1">' +
                                                '</div>' 
                                            );
                                        }
                                    }else{
                                        $("#produk-img-"+data.id+"").append(
                                            '<div class="carousel-item">' +
                                            '    <img style="height: 200px; object-fit: cover" src="'+`{{asset('storage/images/produk/${image.produk_img}')}}`+'" class="d-block w-100" alt="Produk 1">' +
                                            '</div>' 
                                        );
                                    }
                                });
                            }else{
                                $("#produk-img-"+data.id+"").append(
                                    '<div class="carousel-item active">' +
                                    '    <img style="height: 200px; object-fit: cover" src="https://www.svgrepo.com/show/508699/landscape-placeholder.svg" class="d-block w-100" alt="Produk 1">' +
                                    '</div>' 
                                );
                            }
                        }
                        loop++;
                    });
                }
            });
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
