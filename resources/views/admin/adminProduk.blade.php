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
                <h2>Pengaturan UMKM</h2>
                <form id="productForm" class="mb-4">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Nama Produk:</label>
                        <input type="text" class="form-control" id="productName" name="productName" required>
                    </div>
                    <div class="mb-3">
                        <label for="productTelp" class="form-label">Telp Produk</label>
                        <input type="text" class="form-control" id="productTelp" name="productTelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="productLink" class="form-label">Link Produk</label>
                        <input type="text" class="form-control" id="productLink" name="productLink" required>
                    </div>
                    <div class="mb-3">
                        <label for="productImages" class="form-label">Gambar Produk:</label>
                        <input type="file" class="form-control" id="productImages" name="productImages[]" multiple accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
                <table class="table table-striped" id="productsTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>No Telp</th>
                            <th>Link Produk</th>
                            <th>Gambar Produk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <!-- Data Produk akan ditambahkan di sini oleh JavaScript -->
                    </tbody>
                </table>
            </main>
            <div id="modal">
                <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editProductModalLabel">Edit Produk</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form id="editProductForm">
                                    <div class="mb-3">
                                        <label for="editProductName" class="form-label">Nama Produk:</label>
                                        <input type="text" class="form-control" id="editProductName" name="productName" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editProductTelp" class="form-label">Telp Produk:</label>
                                        <input type="text" class="form-control" id="editProductTelp" name="productTelp" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editProductLink" class="form-label">Link Produk:</label>
                                        <input type="text" class="form-control" id="editProductLink" name="productLink" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editProductImages" class="form-label">Gambar Produk:</label>
                                        <div id="currentImages" class="d-flex flex-wrap mb-2"></div>
                                        <input type="file" class="form-control" id="editProductImages" name="productImages[]" multiple accept="image/*">
                                    </div>
                                    <input type="hidden" id="editProductId" name="productId">
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
                var files = $('#productImages')[0].files;
                max = files.length;

                var fileData = new FormData();
                fileData.append('productImages[]', files[number]);
            }else{
                var files = $('#editProductImages')[0].files;
                max = files.length;
                
                var fileData = new FormData();
                fileData.append('productImages[]', files[number]);
            }
            $.ajax({
                url: `/api/produkImg/${productId}`, // Pastikan endpoint sesuai
                method: 'POST',
                data: fileData,
                contentType: false,
                processData: false,
                success: function() {
                    if (number+1 == max) {
                        Swal.fire({
                            title: 'File uploaded successfully!',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            window.location.reload();
                        });
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
                    url: "/api/produk",
                    method: 'GET',
                    success: function(products) {
                        products.forEach(product => {
                            var link = `<a href="${product.link}" target="_blank">link</a>`;
                            if (product.link == "-") {
                                link = "-";
                            }
                            $('tbody').append(`
                                <tr>
                                    <td>${product.id}</td>
                                    <td>${product.nama}</td>
                                    <td>${product.telp}</td>
                                    <td>${link}</td>
                                    <td>
                                        <div id="images-${product.id}" class="d-flex">
                                            ${product.data_image.map(img => `
                                                <div class="position-relative me-2 mb-2">
                                                    <img style="height:100px" src="{{asset('storage/images/produk/${img.produk_img}')}}" alt="Gambar ${img.produk_img}" class="img-thumbnail">
                                                    <button type="button" class="remove-img-btn" onclick="removeImage(${product.id}, ${img.id})">&times;</button>
                                                </div>
                                            `).join('')}
                                        </div>
                                    </td>
                                    <td><button class="btn btn-warning btn-sm m-1" onclick="editProduct(${product.id})">Edit</button><button class="btn btn-danger btn-sm" onclick="deleteProduct(${product.id})">Delete</button></td>
                                </tr>
                            `);
                        });
                        $('#productsTable').DataTable();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching products:', error);
                    }
                });
            }
            window.deleteProduct = function(productId) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete Product",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Update',
                    cancelButtonText: 'No, cancel!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `${'/api/produk'}/${productId}`,
                            method: 'DELETE',
                            success: function(response) {
                                Swal.fire({
                                    title: 'Delete Success',
                                    text: '',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    window.location.reload();
                                });
                            }
                        });
                    }
                })
            };
            // Fungsi untuk menangani edit produk
            window.editProduct = function(productId) {
                $.ajax({
                    url: `${'/api/produk'}/${productId}`,
                    method: 'GET',
                    success: function(product) {
                        $('#editProductName').val(product.nama);
                        $('#editProductTelp').val(product.telp);
                        $('#editProductLink').val(product.link);
                        $('#editProductId').val(productId);

                        const imageContainer = $('#currentImages');
                        imageContainer.empty();
                        product.data_image.forEach(img => {
                            const imgDiv = $(`
                                <div class="position-relative me-2 mb-2">
                                    <img style="height:60px" src="{{asset('storage/images/produk/${img.produk_img}')}}" alt="Gambar ${img.produk_img}" class="img-thumbnail">
                                    <button type="button" class="remove-img-btn" onclick="removeImage(${productId}, ${img.id})">&times;</button>
                                </div>
                            `);
                            imageContainer.append(imgDiv);
                        });

                        const modal = new bootstrap.Modal($('#editProductModal')[0]);
                        modal.show();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching product details:', error);
                    }
                });
            };

            // Fungsi untuk menghapus gambar
            window.removeImage = function(productId, imageId) {
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
                            url: `/api/produkImg/${imageId}`,
                            method: 'DELETE',
                            success: function() {
                                Swal.fire({
                                    title: 'Delete Success',
                                    text: '',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    window.location.reload();
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('Error deleting image:', error);
                            }
                        });
                    }
                })
            };


            ///
            $('#productForm').on('submit', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Add New Product ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Update',
                    cancelButtonText: 'No, cancel!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var formData = new FormData();
                        var files = $('#productImages')[0].files;
                        
                        if (files.length === 0) {
                            $.ajax({
                                url: `/api/produk/`,
                                method: 'POST',
                                data: {
                                    "nama":$("#productName").val(),
                                    "deskripsi":"-",
                                    "telp":$("#productTelp").val(),
                                    "link":$("#productLink").val()
                                },
                                success: function() {
                                    Swal.fire({
                                        title: 'Add Success',
                                        text: '',
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        window.location.reload();
                                    });
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error updating product:', error);
                                }
                            });
                        }else{
                            $.each(files, function(i, file) {
                                formData.append('productImages[]', file);
                            });
                            
                            $.ajax({
                                url: `/api/produk/`,
                                method: 'POST',
                                data: {
                                    "nama":$("#productName").val(),
                                    "deskripsi":"-",
                                    "telp":$("#productTelp").val(),
                                    "link":$("#productLink").val()
                                },
                                success: function(response) {
                                    ///
                                    var i = 0;
                                    console.log(response);
                                    
                                    formData.forEach(function(value, key) {
                                        $.ajax({
                                            url: `${'/api/produkImg'}/`,
                                            method: 'POST',
                                            data: {
                                                "id_produk":response.id,
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
                    }
                })
            });
            ///


            // Tangani pengiriman form edit produk
            $('#editProductForm').on('submit', function(event) {
                event.preventDefault();
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
                        var formData = new FormData();
                        var files = $('#editProductImages')[0].files;
                        
                        if (files.length === 0) {
                            $.ajax({
                                url: `${'/api/produk'}/${$('#editProductId').val()}`,
                                method: 'PUT',
                                data: {
                                    "nama":$("#editProductName").val(),
                                    "deskripsi":"-",
                                    "telp":$("#editProductelp").val(),
                                    "link":$("#editProductLink").val()
                                },
                                success: function() {
                                    Swal.fire({
                                        title: 'Update Berhasil',
                                        text: '',
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        window.location.reload();
                                    });
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error updating product:', error);
                                }
                            });
                        }
        
                        $.each(files, function(i, file) {
                            formData.append('productImages[]', file);
                        });
        
                        $.ajax({
                            url: `${'/api/produk'}/${$('#editProductId').val()}`,
                            method: 'PUT',
                            data: {
                                "nama":$("#editProductName").val(),
                                "deskripsi":"-",
                                "telp":$("#editProductTelp").val(),
                                "link":$("#editProductLink").val()
                            },
                            success: function(response) {
                                ///
                                var i = 0;
                                formData.forEach(function(value, key) {
                                    $.ajax({
                                        url: `${'/api/produkImg'}/`,
                                        method: 'POST',
                                        data: {
                                            "id_produk":response.id,
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
                    }
                })
            });
            loadProducts();
        });
    </script>
</body>
</body>
</html>
