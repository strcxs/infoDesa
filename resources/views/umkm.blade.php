<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struktur Desa</title>
    <link rel="shortcut icon" type="image/icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Kab_Bandung_Barat.svg/1200px-Kab_Bandung_Barat.svg.png"/>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .card {
          display: flex;
          flex-direction: column;
          height: 100%;
        }
      
        .card-body {
          flex: 1;
          display: flex;
          flex-direction: column;
          justify-content: flex-end;
        }

        #button {
            /* justify-content: flex-end; */
        }
      </style>
</head>
<body>
    @include('navbar')
    
    <div class="container mt-5">
        <div class="text-justify mb-4">
            <h4 class="heading">Dukung UMKM Lokal !</h4>
            <p class="text-justify">Selamat datang di halaman produk kami. Di sini, Anda dapat menemukan berbagai produk unggulan dari Usaha Mikro, Kecil, dan Menengah (UMKM) yang ada di daerah kami. Setiap pembelian Anda tidak hanya mendapatkan produk berkualitas tetapi juga berkontribusi langsung dalam mendukung pertumbuhan ekonomi lokal dan pemberdayaan komunitas.</p>
        </div>
        <div class="row" id="content-produk">
            <!-- Produk 1 -->
            {{-- <div class="col-6 col-lg-4">
                <div class="card">
                    <div id="carouselExampleControls2" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img style="height: 200px; object-fit: cover" src="https://cdn1-production-images-kly.akamaized.net/Kixzbo4x1Ts6m9o2Y5Ze2J6miA4=/1200x675/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/2830503/original/086516100_1560775012-iStock-545994470.jpg" class="d-block w-100" alt="Produk 1">
                            </div>
                            <div class="carousel-item">
                                <img style="height: 200px; object-fit: cover" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSppT61XHA2L6tOiqTxZNEkacRovSIdp6CiEg&s" class="d-block w-100" alt="Produk 2">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Nama Produk 1</h5>
                        <p class="card-text">Nomor HP: 08123456789</p>
                        <a href="https://link-ecommerce.com/produk1" class="btn btn-primary"><i class="fas fa-phone"></i> Hubungi Kami</a>
                    </div>
                </div>
            </div> --}}
            <!-- Tambahkan lebih banyak produk di sini -->
        </div>
    </div>

    <footer class="bg-light text-center py-3">
        <p>&copy; 2024 Nurtanio University KKN Kertawangi. All rights reserved.</p>
    </footer>

    <!-- Link ke Bootstrap JS dan dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function convertPhoneNumber(phoneNumber) {
            phoneNumber = phoneNumber.trim();
            if (phoneNumber.startsWith('0')) {
                return '+62' + phoneNumber.substring(1);
            } else {
                return phoneNumber;
            }
        }
        function isValidPhoneNumber(phoneNumber) {
            // Menghapus spasi dan karakter yang tidak perlu
            phoneNumber = phoneNumber.trim();
            
            // Regular expression untuk memvalidasi nomor telepon
            // Misalnya, nomor telepon Indonesia yang diawali dengan 0 atau +62 dan diikuti oleh 8 hingga 12 digit
            const phoneRegex = /^(?:\+62|0)\d{8,12}$/;
            
            // Cek apakah string sesuai dengan regex
            return phoneRegex.test(phoneNumber);
        }
        $(document).ready(function(){
            $.ajax({
                url: "/api/produk/",
                method: "GET", // First change type to method here
                success: function(response) {
                    response.forEach((data,index) => {
                        number = null;
                        whastapp = null;
                        if (isValidPhoneNumber(data.link)) {
                            number = '<a href="tel:'+data.link+'" id="button" class="btn btn-primary mb-2"><i class="fas fa-phone"></i> hubungi</a>';
                            whastapp = '<a href="https://wa.me/'+convertPhoneNumber(data.link)+'" class="btn btn-success"><i class="fab fa-whatsapp"></i> whatsapp</a>';
                        }else{
                            number = '<a href="'+data.link+'" id="button" class="btn btn-primary mb-2"><i class="fas fa-phone"></i> hubungi</a>';
                            whastapp = '<button href="#" disabled="true" class="btn btn-success" ><i class="fab fa-whatsapp"></i> whatsapp</button>';
                        }
                        $('#content-produk').append(
                            '<div class="col-6 col-lg-4">' +
                            '    <div class="card">' +
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
                                            number +
                                            whastapp+
                            // '            </div>'+
                            '        </div>' +
                            '    </div>' +
                            '</div>'
                        );
                        if (data.data_image.length != 0) {
                            data.data_image.forEach((image,index) => {
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
        });
    </script>
</body>
</html>