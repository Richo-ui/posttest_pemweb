<?php
include 'koneksi.php';

// Tambah Barang
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $kondisi = $_POST['kondisi'];

    $query = "INSERT INTO barang (nama_barang, jumlah, kondisi) VALUES ('$nama', '$jumlah', '$kondisi')";
    mysqli_query($conn, $query);
    header("Location: barang.php");
}

// Hapus Barang
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM barang WHERE id_barang = $id");
    header("Location: barang.php");
}

// Edit Barang
if (isset($_POST['edit'])) {
    $id = $_POST['id_barang'];
    $nama = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $kondisi = $_POST['kondisi'];

    mysqli_query($conn, "UPDATE barang SET nama_barang='$nama', jumlah='$jumlah', kondisi='$kondisi' WHERE id_barang=$id");
    header("Location: crud_barang.php");
}

$barang = mysqli_query($conn, "SELECT * FROM barang");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>CRUD Barang - Masjid Al-Fatihah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="barang-menu">
        <h2>Manajemen Barang</h2>

        <form class="barang-form" method="POST">
            <input type="hidden" name="id" id="id">
            <input type="text" name="nama_barang" placeholder="Nama Barang" required>
            <input type="number" name="jumlah" placeholder="Jumlah" required>
            <input type="text" name="kondisi" placeholder="Kondisi" required>
            <button type="submit" name="tambah" class="btn-primary">Tambah</button>
        </form>

        <table class="barang-table" border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($barang)) : ?>
            <tr>
                <td><?= $row['id_barang']; ?></td>
                <td><?= $row['nama_barang']; ?></td>
                <td><?= $row['jumlah']; ?></td>
                <td><?= $row['kondisi']; ?></td>
                <td>
                    <a href="?hapus=<?php echo $row['id_barang']; ?>" onclick="return confirm('Hapus barang ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

        <br>
        <button onclick="window.location.href='dashboard.php'" class="barang-dash">Kembali ke Dashboard</button>
        </div>
</body>
</html>