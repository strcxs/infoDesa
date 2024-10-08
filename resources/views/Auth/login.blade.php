<script>
    if (sessionStorage.getItem('auth')!=null) {
        window.location.href = window.location.origin+"/admin";
    }
</script>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Halaman Login</title>
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="shortcut icon" type="image/icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Kab_Bandung_Barat.svg/1200px-Kab_Bandung_Barat.svg.png"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

        <style>
            body {
                background-color: #ededed;
            }
            .login-container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .login-card {
                width: 100%;
                max-width: 400px;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .login-card h2 {
                margin-bottom: 20px;
            }
            .login-card .form-group {
                margin-bottom: 15px;
            }
            .logo {
                width: 100px;
                height: auto;
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <div class="login-container">
            <div class="card login-card">
                <div class="card-body">
                    <h3 style="text-align: center" class="card-title">Login</h3>
                    <div class="justify-content-center" style="text-align: center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Kab_Bandung_Barat.svg/1200px-Kab_Bandung_Barat.svg.png" alt="Logo" class="logo">
                    </div>
                    <p style="text-align: center">Desa Kertawangi</p>
                    <hr style="color: black">
                    <form id="loginForm">
                        <div class="form-group">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter your username">
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter your password">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                        <div class="text-center mt-3">
                            <a href="#">Forgot your password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#loginForm').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "/api/auth",
                    method: 'POST',
                    data:{
                        "username": $('#username').val(),
                        "password": $('#password').val(),
                    },
                    success: function(auth) {
                        if (auth.login) {
                            Swal.fire({
                                title: 'Login Berhasil',
                                text: 'Selamat datang!',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    sessionStorage.setItem('auth',auth.id);
                                    return window.location = window.location.origin+'/admin';
                                }
                            });
                        }else{
                            Swal.fire({
                                title: 'Login Gagal',
                                text: 'Username atau password salah.',
                                icon: 'error',
                                confirmButtonText: 'Coba Lagi'
                            });
                            $('#username').val("");
                            $('#password').val("");
                        }
                    }
                });
            });
        });
    </script>
</html>
