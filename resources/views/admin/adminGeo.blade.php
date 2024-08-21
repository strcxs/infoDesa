<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Desa</title>
    <!-- Bootstrap CSS -->

    <link rel="shortcut icon" type="image/icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Kab_Bandung_Barat.svg/1200px-Kab_Bandung_Barat.svg.png"/>
    
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
            @include('admin/navbarAdmin')

            <!-- Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4 content">
                <h2>Pengaturan Geografis</h2>
                <div class="mt-4">
                    <form>
                        <div class="mb-3">
                            <label for="about" class="form-label"><strong>Nama Desa :</strong></label>
                            <textarea class="form-control" id="nama_desa"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="visi" class="form-label"><strong>Alamat Desa :</strong></label>
                            <textarea class="form-control" id="alamat_desa"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="misi" class="form-label"><Strong>Luas Desa :</Strong></label>
                            <textarea class="form-control" id="luas_desa"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="demografis" class="form-label"><strong>Jumlah Penduduk :</strong></label>
                            <textarea class="form-control" id="jumlah_penduduk"></textarea>
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
                url: "/api/geografis/",
                method: "GET", // First change type to method here
                success: function(response) {
                    $("#nama_desa").text(response.nama_desa);
                    $("#alamat_desa").text(response.alamat_desa);
                    $("#luas_desa").text(response.luas_desa);
                    $("#jumlah_penduduk").text(response.jumlah_penduduk);
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
                        $.ajax({
                            url: "/api/geografis/1",
                            method: "PUT", // First change type to method here
                            data: {
                                "nama_desa" : $("#nama_desa").val(),
                                "alamat_desa" : $("#alamat_desa").val(),
                                "luas_desa" : $("#luas_desa").val(),
                                "jumlah_penduduk" : $("#jumlah_penduduk").val(),
                            },
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
