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
    <style>
        .card {
            display: flex;
            flex-direction: row;
        }

        .video-container {
            flex: 1;
            padding-right: 10px; /* Add some space between video and text */
            height: 250px; 
        }
        .image-container {
            flex: 1;
            padding-right: 10px; /* Add some space between video and text */
            height: 250px; 
        }
        .image-container img {
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        .card-body {
            padding: 0;
        }

        .caption, .title {
            flex: 1;
            display: flex;
            margin: 10px;
            /* align-items: center; */
            justify-content: center;
        }
        .title {
            text-align: center;
        }
        .caption {
            margin-top: 30px;
        }
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none; /* Opsional: menghilangkan border default */
        }
    </style>
    @include('navbar')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Galeri Kegiatan Desa Kertawangi</h1>
        <p style="text-align: justify">Selamat datang di galeri kami! Di sini, Anda dapat melihat berbagai kegiatan dan acara yang telah berlangsung di Desa Kertawangi. Kami berharap galeri ini dapat memberikan gambaran yang lebih jelas tentang kehidupan dan budaya desa kami. Selamat menikmati!</p>
        <div class="row" id="galeri" >
            
        </div>
    </div>
    @include('footer');

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
                                // "<div class=\"col-12 col-md-6 col-lg-3 mb-4 flex-column align-items-center\">"+
                                // "    <div class=\"d-flex\" style=\"height: 210px\">"+
                                // "        <iframe width=\"560\" height=\"315\" style=\"height: auto; width:100%;\" "+
                                // "            src=\""+data.youTube+"\" "+
                                // "            title=\"YouTube video player\" frameborder=\"0\" "+
                                // "            allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" "+
                                // "            allowfullscreen=\"\">"+
                                // "        </iframe>"+
                                // "    </div>"+
                                // "    <div class=\"caption text-center\">"+
                                // "        <span>"+data.caption+"</span>"+
                                // "    </div>"+
                                // "</div>"
                                `<div class="col-12 col-md-6 col-lg-6 mb-4">
                                    <div class="card row m-1">
                                        <div class="card-body col-6 col-md-6 col-lg-6 mb-6 d-flex">
                                            <div class="video-container">
                                                <iframe style="object-fit:cover"
                                                    src="${data.youTube}" 
                                                    title="YouTube video player" frameborder="0" 
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                                    allowfullscreen>
                                                </iframe>
                                            </div>
                                        </div>
                                        <div class="card-body col-6 col-md-6 col-lg-6 mb-4">
                                            <div class="title" display>
                                                <span><strong>${data.title}</strong></span>
                                            </div>
                                            <div class="caption" display>
                                                <span>${data.caption}</span>    
                                            </div>
                                        </div>
                                    </div>
                                </div>`
                            );
                        }else{
                            var image = "{{asset('storage/images/galeri/')}}" + '/' + data.image;
                            $('#galeri').append(
                                `<div class="col-12 col-md-6 col-lg-6 mb-4">
                                    <div class="card row m-1">
                                        <div class="col-6 col-md-6 col-lg-6 mb-6 card-body d-flex align-items-center">
                                            <div class="image-container">
                                                <img 
                                                    src="${image}" 
                                                    alt="Foto ${data.image}" 
                                                    class="img-fluid" 
                                                    style="object-fit: cover; cursor: pointer;" 
                                                    data-toggle="modal" 
                                                    data-target="#imageModal-${data.id}">
                                            </div>
                                        </div>
                                        <div class="card-body col-6 col-md-6 col-lg-6 mb-6">
                                            <div class="title" display>
                                                <span><strong>${data.title}</strong></span>
                                            </div>
                                            <div class="caption" display>
                                                <span>${data.caption}</span>    
                                            </div>
                                        </div>
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
                    });
                }
            });
        });
    </script>
</body>
</html>