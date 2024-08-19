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
    @include('navbar')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Galeri Kegiatan Desa Kartawangi</h1>
        <p>Selamat datang di galeri kami! Di sini, Anda dapat melihat berbagai kegiatan dan acara yang telah berlangsung di Desa Kartawangi. Kami berharap galeri ini dapat memberikan gambaran yang lebih jelas tentang kehidupan dan budaya desa kami. Selamat menikmati!</p>
        <div class="row">
            <!-- Foto 1 -->
            <div class="col-12 col-md-6 col-lg-3 mb-2">
                <div class="d-flex" style="height: 210px;width: 100%">
                    <img 
                        src="https://bintangsekolahindonesia.com/wp-content/uploads/2023/05/WhatsApp-Image-2023-05-11-at-15.51.57.jpeg" 
                        alt="Foto 1" 
                        class="img-fluid" 
                        style="object-fit: cover; cursor: pointer;" 
                        data-toggle="modal" 
                        data-target="#imageModal"
                    >    
                </div>
                <div class="caption">
                    <span>Pemasangan Bendera Merah putih</span>
                </div>
            </div>
            <!-- Foto 2 -->
            <div class="col-12 col-md-6 col-lg-3 mb-2">
                <div class="d-flex" style="height: 210px;width: 100%">
                    <img 
                        src="https://bintangsekolahindonesia.com/wp-content/uploads/2023/05/WhatsApp-Image-2023-05-11-at-15.51.57.jpeg" 
                        alt="Foto 1" 
                        class="img-fluid" 
                        style="object-fit: cover; cursor: pointer;" 
                        data-toggle="modal" 
                        data-target="#imageModal"
                    >    
                </div>
                <div class="caption">
                    <span>Pemasangan Bendera Merah putih</span>
                </div>
            </div>
            <!-- Video 1 -->
            <div class="col-12 col-md-6 col-lg-3 mb-2 flex-column align-items-center">
                <div class="d-flex" style="height: 210px">
                    <iframe width="560" height="315" style="height: auto; width:100%;" 
                        src="https://www.youtube.com/embed/fip4ETMVd_I?si=97guyzrzRe2euNyS" 
                        title="YouTube video player" frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen="">
                    </iframe>
                </div>
                <div class="caption">
                    <span>Upacara Bendera Di Desa Kartawangi</span>
                </div>
            </div>
            <!-- Video 2 -->
            <div class="col-12 col-md-6 col-lg-3 mb-2 flex-column align-items-center">
                <div class="d-flex" style="height: 210px">
                    <iframe width="560" height="315" style="height: auto; width:100%;" 
                        src="https://www.youtube.com/embed/t69CrzPklkc?si=MqnMljWsGTeOp8L6" 
                        title="YouTube video player" frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen="">
                    </iframe>
                </div>
                <div class="caption">
                    <span>Pidato Proklamasi dari Ir.Soekarno</span>
                </div>
            </div>
            <!-- Tambahkan lebih banyak foto dan video sesuai kebutuhan -->
        </div>
        {{-- modal  --}}
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <img 
                            src="https://bintangsekolahindonesia.com/wp-content/uploads/2023/05/WhatsApp-Image-2023-05-11-at-15.51.57.jpeg" 
                            alt="Foto 1" 
                            class="img-fluid"
                        >
                    </div>
                </div>
            </div>
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