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
                <h2>Pengaturan Atraksi</h2>
                <form id="atraksiForm" class="mb-4">
                    <div class="mb-3">
                        <label for="atraksiName" class="form-label">Nama Atraksi:</label>
                        <input type="text" class="form-control" id="atraksiName" name="atraksiName" required>
                    </div>
                    <div class="mb-3">
                        <label for="atraksiInstagram" class="form-label">Link Instagram Atraksi</label>
                        <input type="text" class="form-control" id="atraksiInstagram" name="atraksiInstagram" required>
                    </div>
                    <div class="mb-3">
                        <label for="atraksiMaps" class="form-label">Link Maps Atraksi</label>
                        <input type="text" class="form-control" id="atraksiMaps" name="atraksiMaps" required>
                    </div>
                    <div class="mb-3">
                        <label for="atraksiImages" class="form-label">Gambar Atraksi:</label>
                        <input type="file" class="form-control" id="atraksiImages" name="atraksiImages[]" multiple accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Buat Baru</button>
                </form>
                <table class="table table-striped" id="atraksiTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>Instagram</th>
                            <th>Maps</th>
                            <th>Gambar Atraksi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <!-- Data Produk akan ditambahkan di sini oleh JavaScript -->
                    </tbody>
                </table>
            </main>
            <div id="modal">
                <div class="modal fade" id="editAtraksiModal" tabindex="-1" aria-labelledby="editAtraksiModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editAtraksiModalLabel">Edit Atraksi</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form id="editAtraksiForm">
                                    <div class="mb-3">
                                        <label for="editAtraksiName" class="form-label">Nama Atraksi:</label>
                                        <input type="text" class="form-control" id="editAtraksiName" name="editAtraksiName" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editAtraksiInstagram" class="form-label">Instagram:</label>
                                        <input type="text" class="form-control" id="editAtraksiInstagram" name="editatraksiInstagram" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editAtraksiMaps" class="form-label">Maps:</label>
                                        <input type="text" class="form-control" id="editAtraksiMaps" name="editatraksiMaps" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editAtraksiImages" class="form-label">Gambar Atraksi:</label>
                                        <div id="currentImages" class="d-flex flex-wrap mb-2"></div>
                                        <input type="file" class="form-control" id="editAtraksiImages" name="atraksiImages[]" multiple accept="image/*">
                                    </div>
                                    <input type="hidden" id="editAtraksiId" name="productId">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        // $('#tabel').DataTable();
        function uploadFiles(productId,number,bool) {
            var fileData = null;
            var max = null;
            if (bool) {
                var files = $('#atraksiImages')[0].files;
                max = files.length;

                var fileData = new FormData();
                fileData.append('atraksiImages[]', files[number]);
            }else{
                var files = $('#editAtraksiImages')[0].files;
                max = files.length;
                
                var fileData = new FormData();
                fileData.append('atraksiImages[]', files[number]);
            }
            
            $.ajax({
                url: `/api/atraksiImg/${productId}`, // Pastikan endpoint sesuai
                method: 'POST',
                data: fileData,
                contentType: false,
                processData: false,
                success: function() {
                    if (number+1 == max) {
                        console.log('File uploaded successfully!');
                        window.location.reload();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error uploading file:', error);
                }
            });
        }

        $(document).ready(function(){
            function loadProducts() {
                $.ajax({
                    url: "/api/atraksi",
                    method: 'GET',
                    success: function(products) {
                        products.forEach(product => {
                            var link = `<a href="${product.medsos}" target="_blank">Instagram</a>`;
                            var maps = `<a href="${product.gmaps}" target="_blank">Maps</a>`;
                            if (product.medsos == "-") {
                                link = "-";
                            }
                            if (product.gmaps == "-") {
                                maps = "-";
                            }
                            $('tbody').append(`
                                <tr>
                                    <td>${product.id}</td>
                                    <td>${product.nama}</td>
                                    <td>${maps}</td>
                                    <td>${link}</td>
                                    <td>
                                        <div id="images-${product.id}" class="d-flex">
                                            ${product.data_image.map(img => `
                                                <div class="position-relative me-2 mb-2">
                                                    <img style="height:100px" src="{{asset('storage/images/atraksi/${img.atraksi_img}')}}" alt="Gambar ${img.atraksi_img}" class="img-thumbnail">
                                                    <button type="button" class="remove-img-btn" onclick="removeImage(${product.id}, ${img.id})">&times;</button>
                                                </div>
                                            `).join('')}
                                        </div>
                                    </td>
                                    <td><button class="btn btn-warning btn-sm m-1" onclick="editProduct(${product.id})">Edit</button><button class="btn btn-danger btn-sm" onclick="deleteProduct(${product.id})">Delete</button></td>
                                </tr>
                            `);
                        });
                        $('#atraksiTable').DataTable();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching products:', error);
                    }
                });
            }
            window.deleteProduct = function(productId) {
                $.ajax({
                    url: `${'/api/atraksi'}/${productId}`,
                    method: 'DELETE',
                    success: function(response) {
                        window.location.reload();
                    }
                });
            };
            // Fungsi untuk menangani edit produk
            window.editProduct = function(productId) {
                $.ajax({
                    url: `${'/api/atraksi'}/${productId}`,
                    method: 'GET',
                    success: function(product) {
                        $('#editAtraksiName').val(product.nama);
                        $('#editAtraksiInstagram').val(product.medsos);
                        $('#editAtraksiMaps').val(product.gmaps);
                        $('#editAtraksiId').val(productId);

                        const imageContainer = $('#currentImages');
                        imageContainer.empty();
                        product.data_image.forEach(img => {
                            const imgDiv = $(`
                                <div class="position-relative me-2 mb-2">
                                    <img style="height:60px" src="{{asset('storage/images/atraksi/${img.atraksi_img}')}}" alt="Gambar ${img.atraksi_img}" class="img-thumbnail">
                                    <button type="button" class="remove-img-btn" onclick="removeImage(${productId}, ${img.id})">&times;</button>
                                </div>
                            `);
                            imageContainer.append(imgDiv);
                        });

                        const modal = new bootstrap.Modal($('#editAtraksiModal')[0]);
                        modal.show();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching product details:', error);
                    }
                });
            };

            // Fungsi untuk menghapus gambar
            window.removeImage = function(productId, imageId) {
                if (confirm('Anda yakin ingin menghapus gambar ini?')) {
                    $.ajax({
                        url: `/api/atraksiImg/${imageId}`,
                        method: 'DELETE',
                        success: function() {
                            alert('Gambar berhasil dihapus!');
                            window.location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error('Error deleting image:', error);
                        }
                    });
                }
            };


            ///
            $('#atraksiForm').on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData();
                var files = $('#atraksiImages')[0].files;
                
                if (files.length === 0) {
                    $.ajax({
                        url: `/api/atraksi/`,
                        method: 'POST',
                        data: {
                            "nama":$("#atraksiName").val(),
                            "medsos":$("#atraksiInstagram").val(),
                            "gmaps":$("#atraksiMaps").val()
                        },
                        success: function() {
                            window.location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error('Error updating product:', error);
                        }
                    });
                }else{
                    $.each(files, function(i, file) {
                        formData.append('atraksiImages[]', file);
                    });
                    
                    $.ajax({
                        url: `/api/atraksi/`,
                        method: 'POST',
                        data: {
                            "nama":$("#atraksiName").val(),
                            "medsos":$("#atraksiInstagram").val(),
                            "gmaps":$("#atraksiMaps").val()
                        },
                        success: function(response) {
                            ///
                            var i = 0;
                            console.log(response);
                            
                            formData.forEach(function(value, key) {
                                $.ajax({
                                    url: `${'/api/atraksiImg'}/`,
                                    method: 'POST',
                                    data: {
                                        "id_atraksi":response.id,
                                    },
                                    success: function(responsex){
                                        uploadFiles(responsex.id,i,true);
                                        i++;
                                    }
                                });
                                
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error updating product:', error);
                        }
                    });
                }
            });
            ///


            // Tangani pengiriman form edit produk
            $('#editAtraksiForm').on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData();
                var files = $('#editAtraksiImages')[0].files;
                
                if (files.length === 0) {
                    $.ajax({
                        url: `${'/api/atraksi'}/${$('#editAtraksiId').val()}`,
                        method: 'PUT',
                        data: {
                            "nama":$("#editAtraksiName").val(),
                            "medsos":$("#editAtraksiInstagram").val(),
                            "gmaps":$("#editAtraksiMaps").val()
                        },
                        success: function() {
                            window.location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error('Error updating product:', error);
                        }
                    });
                }

                $.each(files, function(i, file) {
                    formData.append('atraksiImages[]', file);
                });

                $.ajax({
                    url: `${'/api/atraksi'}/${$('#editAtraksiId').val()}`,
                    method: 'PUT',
                    data: {
                        "nama":$("#editAtraksiName").val(),
                        "medsos":$("#editAtraksiInstagram").val(),
                        "gmaps":$("#editAtraksiMaps").val()
                    },
                    success: function(response) {
                        ///
                        var i = 0;
                        formData.forEach(function(value, key) {
                            $.ajax({
                                url: `${'/api/atraksiImg'}/`,
                                method: 'POST',
                                data: {
                                    "id_atraksi":response.id,
                                },
                                success: function(responsex){
                                    uploadFiles(responsex.id,i,false);
                                    i++;
                                }
                            });
                            
                        });
                        // window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating product:', error);
                    }
                });
            });
            loadProducts();
        });
    </script>
</body>
</body>
</html>