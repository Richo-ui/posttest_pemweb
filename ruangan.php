<?php
include 'koneksi.php';

// Tambah Barang
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_ruangan'];
    $jumlah = $_POST['kapasitas'];
    $keterangan = $_POST['keterangan'];

    $query = "INSERT INTO ruangan (nama_ruangan, kapasitas, keterangan) VALUES ('$nama', '$jumlah', '$keterangan')";
    mysqli_query($conn, $query);
    header("Location: ruangan.php");
}

// Hapus Barang
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM ruangan WHERE id_ruangan = $id");
    header("Location: ruangan.php");
}

// Edit Barang
if (isset($_POST['edit'])) {
    $id = $_POST['id_ruangan'];
    $nama = $_POST['nama_ruangan'];
    $jumlah = $_POST['kapasitas'];
    $keterangan = $_POST['keterangan'];

    mysqli_query($conn, "UPDATE ruangan SET nama_ruangan='$nama', kapasitas='$kapasitas', keterangan='$keterangan' WHERE id_ruangan=$id");
    header("Location: ruangan.php");
}

$barang = mysqli_query($conn, "SELECT * FROM ruangan");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>CRUD Ruangan - Masjid Al-Fatihah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="ruangan-menu">
        <h2>Manajemen Ruangan</h2>

        <form class="ruangan-form" method="POST">
            <input type="hidden" name="id" id="id">
            <input type="text" name="nama_ruangan" placeholder="Nama Ruangan" required>
            <input type="number" name="kapasitas" placeholder="Kapasitas Ruangan" required>
            <input type="text" name="Keterangan" placeholder="Keterangan">
            <button type="submit" name="tambah" class="btn-primary">Tambah</button>
        </form>

        <table class="ruangan-table" border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Nama Ruangan</th>
                <th>Kapasitas</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($barang)) : ?>
            <tr>
                <td><?= $row['id_ruangan']; ?></td>
                <td><?= $row['nama_ruangan']; ?></td>
                <td><?= $row['kapasitas']; ?></td>
                <td><?= $row['keterangan']; ?></td>
                <td>
                    <a href="?hapus=<?= $row['id_ruangan']; ?>" onclick="return confirm('Hapus ruangan ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

        <br>
        <button onclick="window.location.href='dashboard.php'" class="ruangan-dash">Kembali ke Dashboard</button>
    </div>
</body>
</html>