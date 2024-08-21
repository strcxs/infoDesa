<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" type="image/icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Kab_Bandung_Barat.svg/1200px-Kab_Bandung_Barat.svg.png"/>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    {{-- data tabel  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>



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
            @include('admin/navbarAdmin')

            <!-- Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4 content">
                <h2>Pengaturan Struktur</h2>
                <div class="mt-4">
                    <form id="uploadForm" class="mb-3">
                        <div id="imageUpload">
                            <div class="mb-3">
                                <label for="imageFile" class="form-label">Upload Gambar Struktur </label>
                                <input type="file" class="form-control" id="fileUpload">
                            </div>
                        </div>
                        <button id="add" type="button" class="btn btn-primary">Ubah</button>
                    </form>
                    <h4>Gambar Struktur saat ini</h4>
                    <img id="struktur-img" style="max-width: 100%" src="" alt="">
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $.ajax({
                url: "/api/struktur/",
                method: "GET", // First change type to method here
                success: function(response) {
                    $('#struktur-img').attr('src', `{{asset('storage/images/struktur/${response.image}')}}`);
                }
            });
        $(document).ready(function(){
            $("#add").click(function(event){ 
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Change Structure",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No, cancel!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Updated!',
                            'success Updated.',
                            'success'
                        );
                        // coding
                        var file = $('#fileUpload').prop('files')[0];
                        var images = new FormData();
                        images.append('image', file);
        
                        $.ajax({
                            url: "/api/struktur/1",
                            method: "POST",
                            processData: false,
                            contentType: false,
                            data:images,
                            success: function(response) {
                                window.location.reload();
                            }
                        });
                        
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
