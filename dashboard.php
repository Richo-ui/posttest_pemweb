<?php
session_start();

// kalau belum login, kembalikan ke login
if (!isset($_SESSION["username"])) {
    header("Location: login.php?error=belum_login");
    exit();
}
<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php?error=belum_login");
    exit();
}

$pesan = "";
if (isset($_GET['login']) && $_GET['login'] == 'success') {
    $pesan = "Selamat datang, " . $_SESSION['username'] . "!";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Masjid Al-Fatihah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="dashboard">
    <div>
        <span onclick="window.location.href='index.php'" class="close-dash"> &lt; </span>
        <p onclick="window.location.href='index.php'" class="close-text">Kembali ke Landing</p>
        <h1>Dashboard Pengguna</h1>
        <p><?= $pesan ?></p>
        <p>Anda login sebagai <b><?= $_SESSION['username'] ?></b></p>
    </div>
    <div class="dashboard-btn">
        <button onclick="window.location.href='barang.php'" class="btn-primary">Kelola Barang</button>
        <button onclick="window.location.href='ruangan.php'" class="btn-primary">Kelola Ruangan</button>
        <button onclick="window.location.href='donasi.php'" class="btn-primary">Donasi</button><br><br>
        <button onclick="window.location.href='logout.php'" class="btn-primary">Logout</button>
    </div>

    <script src="script.js"></script>
</body>
</html>

// ambil query string dari login.php
$pesan = "";
if (isset($_GET['login']) && $_GET['login'] == 'success') {
    $pesan = "Selamat datang, " . $_SESSION['username'] . "!";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Masjid Al-Fatihah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="dashboard">
    <div>
        <span onclick="window.location.href='index.php'" class="close-dash"> &lt; </span>
        <p onclick="window.location.href='index.php'" class="close-text">Kembali ke Landing</p>
        <h1>Dashboard Pengguna</h1>
        <p><?= $pesan ?></p>
        <p>Anda login sebagai <b><?= $_SESSION['username'] ?></b></p>
    </div>
    <div class="dashboard-btn">
        <button onclick="window.location.href='barang.php'" class="btn-primary">Kelola Barang</button>
        <button onclick="window.location.href='ruangan.php'" class="btn-primary">Kelola Ruangan</button>
        <button onclick="window.location.href='donasi.php'" class="btn-primary">Donasi</button>
        <button onclick="window.location.href='logout.php'" class="btn-primary">Logout</button>
    </div>

    <script src="script.js"></script>
</body>
</html>