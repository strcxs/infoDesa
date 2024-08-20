<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <!-- Bootstrap CSS -->
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            padding-top: 20px;
        }
        .sidebar a {
            color: #fff;
        }
        .sidebar .nav-link {
            padding: 15px 20px;
        }
        .content {
            padding: 20px;
        }
        @media (max-width: 767px) {
            .sidebar {
                position: relative;
                height: auto;
                width: 100%;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
            }
            .sidebar .nav-item {
                text-align: center;
            }
            .content {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
                <button class="btn btn-light d-md-none" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-expanded="false" aria-controls="sidebarCollapse">
                    <i class="bi bi-list"></i> Menu
                </button>
                <div class="collapse d-md-block" id="sidebarCollapse">
                    <h4 class="text-white">Admin Dashboard</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('admin') }}">
                                <i class="fas fa-house"></i>
                                Dashboard
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-sitemap"></i>
                                Struktur
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('adminGalery') }}">
                                <i class="fab fa-envira"></i>
                                Galery
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4 content">
                <h2>Dashboard Admin</h2>
                <div class="mt-4">
                    <form>
                        <div class="mb-3">
                            <label for="about" class="form-label"><strong>Tentang Kami</strong></label>
                            <textarea class="form-control" id="about"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="visi" class="form-label"><strong>Visi</strong></label>
                            <textarea class="form-control" id="visi"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="misi" class="form-label"><Strong>Misi</Strong></label>
                            <textarea class="form-control" id="misi"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="geografis" class="form-label"><strong>Geografis</strong></label>
                            <textarea class="form-control" id="geografis"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="demografis" class="form-label"><strong>Demografis</strong></label>
                            <textarea class="form-control" id="demografis"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="sejarah" class="form-label"><strong>sejarah</strong></label>
                            <textarea class="form-control" id="sejarah"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="fileUpload" class="form-label"><strong>Upload File</strong></label>
                            <input type="file" class="form-control" id="fileUpload">
                        </div>
                        <button id="edit" type="button" class="btn btn-warning">Edit</button>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function(){
            $.ajax({
                url: "/api/dashboard/",
                method: "GET", // First change type to method here
                success: function(response) {
                    $("#about").text(response.about);
                    $("#visi").text(response.visi);
                    $("#misi").text(response.misi);
                    $("#geografis").text(response.geografis);
                    $("#demografis").text(response.demografis);
                    $("#sejarah").text(response.sejarah);
                }
            });
            
            $("#edit").click(function(event){ 
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Update Dashboard",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Update',
                    cancelButtonText: 'No, cancel!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Updated!',
                            'Dashboard success Updated.',
                            'success'
                        );
                        var file = $('#fileUpload').prop('files')[0];
                        var images = new FormData();
                        images.append('kades_image', file);
                        
                        if (file == undefined) {
                            $.ajax({
                                url: "/api/dashboard/1",
                                method: "PUT", // First change type to method here
                                data: {
                                    "about" : $("#about").val(),
                                    "visi" : $("#visi").val(),
                                    "misi" : $("#misi").val(),
                                    "geografis" : $("#geografis").val(),
                                    "demografis" : $("#demografis").val(),
                                    "sejarah" : $("#sejarah").val(),
                                },
                                success: function(response) {
                                    window.location.reload();
                                }
                            });
                        }else{
                            $.ajax({
                                url: "/api/dashboard/1",
                                method: "POST", // First change type to method here    
                                data: images,
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    $.ajax({
                                        url: "/api/dashboard/1",
                                        method: "PUT", // First change type to method here
                                        data: {
                                            "about" : $("#about").val(),
                                            "visi" : $("#visi").val(),
                                            "misi" : $("#misi").val(),
                                            "geografis" : $("#geografis").val(),
                                            "demografis" : $("#demografis").val(),
                                            "sejarah" : $("#sejarah").val(),
                                        },
                                        success: function(response) {
                                            window.location.reload();
                                        }
                                    });
                                }
                            });
                        }
                        
                    } else if (result.isDismissed) {
                        Swal.fire(
                            'Cancelled',
                            '',
                            'error'
                        );
                    }
                });
            });
        });
    </script>
</body>
</body>
</html>
