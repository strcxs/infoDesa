<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galeri Kegiatan</title>
    <link rel="shortcut icon" type="image/icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Kab_Bandung_Barat.svg/1200px-Kab_Bandung_Barat.svg.png"/>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('navbar')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Galeri Kegiatan Desa Kertawangi</h1>
        <p>Selamat datang di galeri kami! Di sini, Anda dapat melihat berbagai kegiatan dan acara yang telah berlangsung di Desa Kertawangi. Kami berharap galeri ini dapat memberikan gambaran yang lebih jelas tentang kehidupan dan budaya desa kami. Selamat menikmati!</p>
        <div class="row" id="galeri">
            <!-- Foto 1 -->
            {{-- <div class="col-12 col-md-6 col-lg-3 mb-2">
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
            </div> --}}
            
            <!-- Video 1 -->
            {{-- <div class="col-12 col-md-6 col-lg-3 mb-2 flex-column align-items-center">
                <div class="d-flex" style="height: 210px">
                    <iframe width="560" height="315" style="height: auto; width:100%;" 
                        src="https://www.youtube.com/embed/fip4ETMVd_I?si=97guyzrzRe2euNyS" 
                        title="YouTube video player" frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen="">
                    </iframe>
                </div>
                <div class="caption">
                    <span>Upacara Bendera Di Desa Kertawangi</span>
                </div>
            </div> --}}
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
        <p>&copy; 2024 Nurtanio University KKN Kertawangi. All rights reserved.</p>
    </footer>

    <!-- Link ke Bootstrap JS dan dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $.ajax({
                url: "/api/galeri/",
                method: "GET", // First change type to method here
                success: function(response) {
                    response.forEach(data => {
                        
                        if (data.youTube != null) {
                            $('#galeri').append(
                                "<div class=\"col-12 col-md-6 col-lg-3 mb-2 flex-column align-items-center\">"+
                                "    <div class=\"d-flex\" style=\"height: 210px\">"+
                                "        <iframe width=\"560\" height=\"315\" style=\"height: auto; width:100%;\" "+
                                "            src=\""+data.youTube+"\" "+
                                "            title=\"YouTube video player\" frameborder=\"0\" "+
                                "            allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" "+
                                "            allowfullscreen=\"\">"+
                                "        </iframe>"+
                                "    </div>"+
                                "    <div class=\"caption\">"+
                                "        <span>"+data.caption+"</span>"+
                                "    </div>"+
                                "</div>"
                            );
                        }else{
                            var image = "{{asset('storage/images/galeri/')}}" + '/' + data.image;
                            $('#galeri').append(
                                "<div class=\"col-12 col-md-6 col-lg-3 mb-2\">"+
                                "    <div class=\"d-flex\" style=\"height: 210px;width: 100%\">"+
                                "        <img "+
                                "            src=\""+image+"\" "+
                                "            alt=\"Foto 1\" "+
                                "            class=\"img-fluid\" "+
                                "            style=\"object-fit: cover; cursor: pointer;\" "+
                                "            data-toggle=\"modal\" "+
                                "            data-target=\"#imageModal-"+data.id+"\""+
                                "        >"+
                                "    </div>"+
                                "    <div class=\"caption\">"+
                                "        <span>"+data.caption+"</span>"+
                                "    </div>"+
                                "</div>"+
                                // modal
                                "<div class=\"modal fade\" id=\"imageModal-"+data.id+"\" tabindex=\"-1\" aria-labelledby=\"imageModalLabel\" aria-hidden=\"true\">"+
                                "    <div class=\"modal-dialog modal-dialog-centered modal-lg\">"+
                                "        <div class=\"modal-content\">"+
                                "            <div class=\"modal-body\">"+
                                "                <img "+
                                "                    src=\""+image+"\" "+
                                "                    alt=\"Foto 1\" "+
                                "                    class=\"img-fluid\""+
                                "                >"+
                                "            </div>"+
                                "        </div>"+
                                "    </div>"+
                                "</div>"

                            )
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>