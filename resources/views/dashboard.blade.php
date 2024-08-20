<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Kertawangi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 img-fluid" src="https://tirtorahayu-kulonprogo.desa.id/desa/upload/artikel/sedang_1633915522_DESA%20CERDAS.jpg" alt="Produk 1" style="max-height: 450px; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Produk 1</h5>
                        <p>Deskripsi singkat produk 1.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 img-fluid" src="https://statik.unesa.ac.id/profileunesa_konten_statik/uploads/pusdippket/thumbnail/a6bf8cce-e619-46de-9715-d3b2b90e6512.jpg" alt="Produk 2" style="max-height: 450px; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Produk 2</h5>
                        <p>Deskripsi singkat produk 2.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 img-fluid" src="https://kecsamalanga.bireuenkab.go.id/media/2022.08/43-potensi-desa1.jpg" alt="Produk 3" style="max-height: 450px; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Produk 3</h5>
                        <p>Deskripsi singkat produk 3.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 img-fluid" src="https://kecsamalanga.bireuenkab.go.id/media/2022.08/43-potensi-desa1.jpg" alt="Produk 4" style="max-height: 450px; object-fit: cover;">
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
                <h2>geografis</h2>
                <p id="geografis"></p>
            </div>
            <div class="col-md-6 d-flex justify-content-center">
                <img src="https://asset-a.grid.id//crop/0x0:0x0/700x465/photo/2021/08/05/kondisi-geografis-pulau-pulau-di-20210805121131.jpg" alt="Kepala Desa" class="img-fluid">
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
    <div class="container mt-5 text-justify">
        <div class="history-container">
            <h2 class="history-title">Sejarah Desa Kertawangi</h2>
            <div class="history-content">
                <span id="sejarah"></span>
                <span id="dots">...</span>
                <span id="more"></span>
                <span id="readMore" onclick="toggleReadMore()" class="text text-primary">Tampilkan lebih banyak</span>
            </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="maps">
            <div style="width: 100%">
                <iframe width="100%vh" height="300px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Kertawangi+(Desa%20Kertawangi)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/">gps systems</a></iframe>
            </div>
        </div>
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
            var btnText = document.querySelector("button");
            var moreButton = document.getElementById("readMore");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.textContent = "Read more";
                moreText.style.display = "none";
                moreButton.innerText = "Tampilkan lebih banyak"
            } else {
                dots.style.display = "none";
                moreButton.innerText = "Tampilkan lebih sedikit"
                btnText.textContent = "Read less";
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
        $(document).ready(function(){
            $.ajax({
                url: "/api/dashboard/",
                method: "GET", // First change type to method here
                success: function(response) {
                    $('#kades_image').attr('src', `{{asset('storage/images/kades/${response.kades_image}')}}`);
                    $("#about").text(response.about);
                    $("#visi").text(response.visi);
                    $("#geografis").text(response.geografis);
                    $("#demografis").text(response.demografis);

                    $("#sejarah").text(minSplit(response.sejarah,50));
                    $("#more").text(maxSplit(response.sejarah,50));
                    
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
