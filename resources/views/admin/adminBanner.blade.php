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
                <h2>Pengaturan Banner</h2>
                <div class="mt-4">
                    <form id="uploadForm" class="mb-3">
                        <div id="imageUpload">
                            <div class="mb-3">
                                <label for="imageFile" class="form-label">Upload Gambar Banner </label>
                                <input type="file" class="form-control" id="fileUpload">
                            </div>
                        </div>
                        <button id="add" type="button" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
                <table id="tabel" class="display">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="dataTabel">
                        <!-- More rows as needed -->
                    </tbody>
                </table>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        function Delete(id){
            $.ajax({
                url: "/api/banner/"+id,
                method: "DELETE", // First change type to method here
                success: function(response) {
                    window.location.reload();
                }
            });
        }
        $(document).ready(function(){
            $("#add").click(function(event){ 
                var file = $('#fileUpload').prop('files')[0];
                var images = new FormData();
                images.append('image', file);

                $.ajax({
                    url: "/api/banner/",
                    method: "POST",
                    processData: false,
                    contentType: false,
                    data:images,
                    success: function(response) {
                        window.location.reload();
                    }
                });
            });

            $.ajax({
                url: "/api/banner/",
                method: "GET", // First change type to method here
                success: function(response) {
                    response.forEach(data => {
                        img = "{{asset('storage/images/banner/')}}" + '/' + data.banner_img;
                        $('#dataTabel').append(
                            "<tr>"+
                            "   <td><a href=\""+img+"\">Image Link</a></td>" +
                            "    <td class=\"action-buttons\">"+
                            "        <button class='btn btn-danger' id=\"delete-"+data.id+"\">Delete</button>"+
                            "    </td>"+
                            "</tr>"
                        );

                        $("#delete-"+data.id+"").click(function(event){
                            Delete(data.id);
                        });
                    });
                    $('#tabel').DataTable();
                }
            });
        });
    </script>
</body>
</body>
</html>
