<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <!-- Bootstrap CSS -->
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
                            <a class="nav-link text-white" href="#">
                                <i class="fab fa-envira"></i>
                                Galery
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4 content">
                <h2>Pengaturan Galeri</h2>
                <div class="mt-4">
                    <form id="uploadForm">
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
                                <input type="file" class="form-control" id="imageFile" accept="image/*">
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
                                <input type="text" class="form-control" id="caption" placeholder="Enter caption">
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('mediaType').addEventListener('change', function () {
            const mediaType = this.value;
            document.getElementById('imageUpload').classList.toggle('d-none', mediaType !== 'image');
            document.getElementById('videoUpload').classList.toggle('d-none', mediaType !== 'video');
        });
    </script>
</body>
</body>
</html>
