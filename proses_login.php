<?php
// proses_login.php

require_once 'config.php'; // Panggil file koneksi
session_start(); // Wajib untuk memulai session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cari user di database
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifikasi user dan password
    if ($user && password_verify($password, $user['password'])) {
        // Jika berhasil, simpan informasi penting ke session
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Arahkan ke halaman utama/dashboard
        header("location: dashboard.php");
        exit;
    } else {
        // Jika gagal, kembalikan ke halaman login dengan pesan error
        header("location: login.php?error=1");
        exit;
    }
}
?>