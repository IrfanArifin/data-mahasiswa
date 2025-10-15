<?php
session_start();
// Jika sudah login, redirect ke dashboard
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('location: dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Sistem</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f4f6f9; }
        .login-box {
            margin-top: 100px;
            width: 360px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="login-box mx-auto">
        <div class="card">
            <div class="card-body login-card-body">
                <h3 class="login-box-msg text-center">Silakan Login</h3>

                <?php 
                // Tampilkan pesan error jika login gagal
                if(isset($_GET['error']) && $_GET['error'] == 1){
                    echo '<p class="text-danger text-center">Username atau password salah.</p>';
                }
                ?>

                <form action="proses_login.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>