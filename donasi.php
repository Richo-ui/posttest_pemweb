<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php?from=donasi");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi - Masjid Al-Fatihah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Halaman Donasi</h1>
    <p>Terima kasih, <b><?= $_SESSION['username'] ?></b>, atas niat baikmu untuk berdonasi.</p>
    <p>Silakan transfer ke rekening berikut:</p>
    <ul>
        <li><b>Bank:</b> BSI</li>
        <li><b>No. Rek:</b> 1234567890</li>
        <li><b>Atas Nama:</b> Masjid Al-Fatihah</li>
    </ul>
    <a href="dashboard.php" class="btn-primary">Kembali ke Dashboard</a> |
    <a href="logout.php" class="btn-primary">Logout</a>
</body>
</html>
