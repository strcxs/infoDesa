<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struktur Desa</title>
    <link rel="shortcut icon" type="image/icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Kab_Bandung_Barat.svg/1200px-Kab_Bandung_Barat.svg.png"/>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('navbar')
    <div class="container my-5">
        <h2 class="text-center mb-4">Struktur Organisasi Desa Kertawangi</h2>
        
        <p class="text-center mb-4">Struktur organisasi desa Kertawangi menggambarkan susunan dan pembagian tugas dari anggota-anggota pemerintahan desa. Diagram ini menunjukkan berbagai posisi dan tanggung jawab dalam organisasi, mulai dari kepala desa hingga staf administrasi. Ini penting untuk memahami bagaimana desa dikelola dan bagaimana berbagai fungsi administratif dan pemerintahan saling berinteraksi.</p>

        <!-- Gambar Struktur Organisasi -->
        <div class="text-center">
            <img id="struktur-img" src="" alt="Struktur Organisasi" class="img-fluid mb-4">
        </div>
        
        <p class="text-center">Gambar di atas adalah diagram struktur organisasi kami yang memperlihatkan hierarki dan hubungan antar posisi dalam pemerintahan desa. Setiap bagian memiliki peran dan tanggung jawab khusus untuk memastikan kelancaran administrasi dan pelayanan kepada masyarakat.</p>
    </div>
    @include('footer')

    <!-- Link ke Bootstrap JS dan dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $.ajax({
                url: "/api/struktur/",
                method: "GET", // First change type to method here
                success: function(response) {
                    $('#struktur-img').attr('src', `{{asset('storage/images/struktur/${response.image}')}}`);
                }
            });
        });
    </script>
</body>
</html>