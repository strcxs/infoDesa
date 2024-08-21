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
                <h2>Pengaturan Galeri</h2>
                <div class="mt-4">
                    <form id="uploadForm" class="mb-3">
                        <div class="mb-3">
                            <label for="mediaType" class="form-label">Pilih Media yang akan diUpload </label>
                            <select id="mediaType" class="form-select" required>
                                <option value="" disabled selected>-Pilih-</option>
                                <option value="image">Foto</option>
                                <option value="video">Video (YouTube Link)</option>
                            </select>
                        </div>
                        
                        <div id="imageUpload" class="d-none">
                            <div class="mb-3">
                                <label for="imageFile" class="form-label">Upload Foto</label>
                                <input type="file" class="form-control" id="fileUpload">
                            </div>
                            <div class="mb-3">
                                <label for="caption" class="form-label">Caption</label>
                                <input type="text" class="form-control" id="caption" placeholder="Enter caption">
                            </div>
                        </div>
                        
                        <div id="videoUpload" class="d-none">
                            <div class="mb-3">
                                <label for="youtubeLink" class="form-label">YouTube Video Link</label>
                                <input type="url" class="form-control" id="youtubeLink" placeholder="Enter YouTube video link">
                            </div>
                            <div class="mb-3">
                                <label for="caption" class="form-label">Caption</label>
                                <input type="text" class="form-control" id="captionY" placeholder="Enter caption">
                            </div>
                        </div>
                        
                        <button id="add" type="button" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
                <table id="tabel" class="display">
                    <thead>
                        <tr>
                            <th>Nama Gambar</th>
                            <th>Link Youtube</th>
                            <th>Caption</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="dataTabel">
                        <!-- More rows as needed -->
                    </tbody>
                </table>
            </main>
            <div id="modal">
                
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $.ajax({
                url: "/api/galeri/",
                method: "GET", // First change type to method here
                success: function(response) {
                    response.forEach(data => {
                        var img = null;
                        var link = null;
                        var youtube = null
                        if (data.image==null) {
                            img = "-";
                            link = "<td><p>-</p></td>";
                            youtube = "<td><a href=\""+data.youTube+"\">Youtube Link</a></td>";
                        }else{
                            img = "{{asset('storage/images/galeri/')}}" + '/' + data.image;
                            link = "<td><a href=\""+img+"\">Image Link</a></td>";
                            youtube = "<td><p>-</p></td>";
                        }
                        $('#dataTabel').append(
                            "<tr>"+
                                link +
                                youtube +
                            "    <td>"+data.caption+"</td>"+
                            "    <td class=\"action-buttons\">"+
                            "        <button class=\"btn btn-warning\" data-toggle=\"modal\" data-target=\"#editModal-"+data.id+"\" data-id=\"2\">Edit</button>"+
                            "        <button class='btn btn-danger' id=\"delete-"+data.id+"\">Delete</button>"+
                            "    </td>"+
                            "</tr>"
                        );
                        $('#modal').append(
                            "<div class=\"modal fade\" id=\"editModal-"+data.id+"\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"editModalLabel\" aria-hidden=\"true\">"+
                            "    <div class=\"modal-dialog\" role=\"document\">"+
                            "        <div class=\"modal-content\">"+
                            "            <div class=\"modal-header\">"+
                            "                <h5 class=\"modal-title\" id=\"editModalLabel\">Edit Caption</h5>"+
                            "                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">"+
                            "                    <span aria-hidden=\"true\">&times;</span>"+
                            "                </button>"+
                            "            </div>"+
                            "            <div class=\"modal-body\">"+
                            "                <form id=\"editForm\">"+
                            "                    <div class=\"form-group\">"+
                            "                        <label for=\"imageCaption\">Caption</label>"+
                            "                        <input type=\"text\" class=\"form-control\" id=\"imageCaption-"+data.id+"\" value=\""+data.caption+"\" required>"+
                            "                    </div>"+
                            "                    <input type=\"hidden\" id=\"rowIndex\">"+
                            "                    <button id=\"edit-"+data.id+"\" type=\"button\" class=\"btn btn-primary\">Save changes</button>"+
                            "                </form>"+
                            "            </div>"+
                            "        </div>"+
                            "    </div>"+
                            "</div>"
                        )
                        $("#edit-"+data.id+"").click(function(event){
                            Update(data.id,$("#imageCaption-"+data.id+"").val());
                        });
                        $("#delete-"+data.id+"").click(function(event){
                            Delete(data.id);
                        });
                    });
                    $('#tabel').DataTable();
                }
            });
        });
        function Update(id,caption){
            Swal.fire({
                    title: 'Are you sure?',
                    text: "Update this Galery",
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
                        // coding
                        $.ajax({
                            url: "/api/galeri/"+id,
                            method: "PUT", // First change type to method here
                            data:{
                                "caption":caption,
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
        }
        function Delete(id){
            Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete this Galery",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Delete',
                    cancelButtonText: 'No, cancel!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Delete Successfully',
                            'success'
                        );
                        // coding
                        $.ajax({
                            url: "/api/galeri/"+id,
                            method: "DELETE", // First change type to method here
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
        }
        function convertToEmbedUrl(youtubeUrl) {
            // Regex untuk mengekstrak ID video dari URL YouTube
            const regex = /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|v\/|.*?v=)|youtu\.be\/|youtube\.com\/embed\/)([^"&?\/\s]{11})/;
            const match = youtubeUrl.match(regex);

            if (match) {
                const videoId = match[1];
                return `https://www.youtube.com/embed/${videoId}`;
            } else {
                throw new Error('URL tidak valid.');
            }
        }
        document.getElementById('mediaType').addEventListener('change', function () {
            const mediaType = this.value;
            document.getElementById('imageUpload').classList.toggle('d-none', mediaType !== 'image');
            document.getElementById('videoUpload').classList.toggle('d-none', mediaType !== 'video');


            $("#add").click(function(event){ 
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Add New Galery",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes,',
                    cancelButtonText: 'No, cancel!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Updated!',
                            'Galery success Updated.',
                            'success'
                        );
                        // coding
                        if ($('#mediaType').val()=="video") {
                            $.ajax({
                                url: "/api/galeri/",
                                method: "POST", // First change type to method here
                                data:{
                                    "youTube":convertToEmbedUrl($("#youtubeLink").val()),
                                    "caption":$("#captionY").val(),
                                },
                                success: function(response) {
                                    window.location.reload();
                                }
                            });
                        }else{
                            $.ajax({
                                url: "/api/galeri/",
                                method: "POST", // First change type to method here
                                data:{
                                    "caption":$("#caption").val(),
                                },
                                success: function(response) {
                                    var file = $('#fileUpload').prop('files')[0];
                                    var images = new FormData();
                                    images.append('image', file);
                                    
                                    $.ajax({
                                        url: "/api/galeri/"+response.id,
                                        method: "POST",
                                        processData: false,
                                        contentType: false,
                                        data:images,
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
