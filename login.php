<?php
session_start();

// langsung ke dashboard kalau sudah pernah login
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

// cek user datang dari mana
$from = isset($_GET['from']) ? $_GET['from'] : 'index';

// proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // harusnya login gini
    if ($username === "Richo" && $password === "062") {
        $_SESSION["username"] = $username;

        // Kalau datang dari tombol Donasi, arahkan ke halaman donasi
        if (!empty($_POST['from']) && $_POST['from'] === 'donasi') {
            header("Location: donasi.php");
        } else {
            header("Location: dashboard.php");
        }
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Masjid Al-Fatihah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login">
    <div class="login-container">
        <h2>Login</h2>
        <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST" action="login.php">
            <input type="hidden" name="from" value="<?= htmlspecialchars($from) ?>">
            <label for="">Username</label><br>
            <input type="text" name="username" placeholder="Richo" required><br>
            <label for="">Password</label><br>
            <input type="password" name="password" placeholder="062" required><br>
            <button type="submit" class="btn-login">Login</button>
        </form>
    </div>
</body>
</html>
