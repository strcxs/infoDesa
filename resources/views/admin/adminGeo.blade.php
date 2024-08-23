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
                            <label for="kode-desa" class="form-label"><strong>Kode Desa :</strong></label>
                            <input type="text" class="form-control" id="kode-desa">
                        </div>
                        <div class="mb-3">
                            <label for="tahun-pembentukan" class="form-label"><strong>Tahun Pembentukan :</strong></label>
                            <input type="text" class="form-control" id="tahun-pembentukan">
                        </div>
                        <div class="mb-3">
                            <label for="dasar-hukum" class="form-label"><strong>Dasar Hukum :</strong></label>
                            <input type="text" class="form-control" id="dasar-hukum">
                        </div>
                        <div class="mb-3">
                            <label for="tipologi" class="form-label"><strong>Tipologi :</strong></label>
                            <input type="text" class="form-control" id="tipologi">
                        </div>
                        <div class="mb-3">
                            <label for="klasifikasi" class="form-label"><strong>Klasifikasi :</strong></label>
                            <input type="text" class="form-control" id="klasifikasi">
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label"><strong>Kategori :</strong></label>
                            <input type="text" class="form-control" id="kategori">
                        </div>
                        <div class="mb-3">
                            <label for="luas-wilayah" class="form-label"><strong>Luas Wilayah :</strong></label>
                            <input type="text" class="form-control" id="luas-wilayah">
                        </div>
                        <div class="mb-3">
                            <label for="batas-utara" class="form-label"><strong>Batas Sebelah Utara :</strong></label>
                            <input type="text" class="form-control" id="batas-utara">
                        </div>
                        <div class="mb-3">
                            <label for="batas-selatan" class="form-label"><strong>Batas Sebelah Selatan :</strong></label>
                            <input type="text" class="form-control" id="batas-selatan">
                        </div>
                        <div class="mb-3">
                            <label for="batas-timur" class="form-label"><strong>Batas Sebelah Timur :</strong></label>
                            <input type="text" class="form-control" id="batas-timur">
                        </div>
                        <div class="mb-3">
                            <label for="batas-barat" class="form-label"><strong>Batas Sebelah Barat :</strong></label>
                            <input type="text" class="form-control" id="batas-barat">
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
                    $('#kode-desa').val(response.kode_desa);
                    $('#tahun-pembentukan').val(response.tahun_pembentukan);
                    $('#dasar-hukum').val(response.dasar_hukum);
                    $('#tipologi').val(response.tipologi);
                    $('#klasifikasi').val(response.klasifikasi);
                    $('#kategori').val(response.kategori);
                    $('#luas-wilayah').val(response.luas_wilayah);
                    $('#batas-utara').val(response.batas_utara);
                    $('#batas-selatan').val(response.batas_selatan);
                    $('#batas-timur').val(response.batas_timur);
                    $('#batas-barat').val(response.batas_barat);

                    // $("#nama_desa").text(response.nama_desa);
                    // $("#alamat_desa").text(response.alamat_desa);
                    // $("#luas_desa").text(response.luas_desa);
                    // $("#jumlah_penduduk").text(response.jumlah_penduduk);
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
                        $.ajax({
                            url: "/api/geografis/1",
                            method: "PUT", // First change type to method here
                            data: {
                                "kode_desa" : $("#kode-desa").val(),
                                "tahun_pembentukan" : $("#tahun-pembentukan").val(),
                                "dasar_hukum" : $("#dasar-hukum").val(),
                                "tipologi" : $("#tipologi").val(),
                                "klasifikasi" : $("#klasifikasi").val(),
                                "kategori" : $("#kategori").val(),
                                "luas_wilayah" : $("#luas-wilayah").val(),
                                "batas_utara" : $("#batas-utara").val(),
                                "batas_selatan" : $("#batas-selatan").val(),
                                "batas_timur" : $("#batas-timur").val(),
                                "batas_barat" : $("#batas-barat").val(),
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: 'Update Berhasil',
                                    text: '',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    window.location.reload();
                                });
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
