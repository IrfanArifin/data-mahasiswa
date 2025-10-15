<?php
session_start();

// Jika belum login, redirect ke halaman login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="jumbotron">
        <h1 class="display-4">Selamat Datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p class="lead">Anda berhasil login ke dalam sistem.</p>
        <hr class="my-4">
        <p>Peran Anda adalah sebagai: <strong><?php echo htmlspecialchars($_SESSION['role']); ?></strong></p>
        <p>Sekarang Anda bisa melanjutkan ke halaman manajemen data mahasiswa atau melakukan aksi lainnya.</p>
        <a class="btn btn-danger" href="logout.php" role="button">Logout</a>
    </div>
</div>

</body>
</html>