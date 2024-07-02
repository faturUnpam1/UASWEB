<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="tambah_group.php">Tambah Group</a></li>
            <li><a href="tambah_negara.php">Tambah Negara</a></li>
            <li><a href="laporan.php">Laporan</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="container">
        <h2>Dashboard</h2>
        <p>Selamat datang di sistem klasemen UEFA 2024.</p>
    </div>
</body>
</html>
