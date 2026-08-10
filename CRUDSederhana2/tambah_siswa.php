<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

include 'config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $sql = "INSERT INTO siswa (nisn, nama, kelas) VALUES ('$nisn','$nama','$kelas')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header('Location: index.php');
        exit();
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body class="bg-light page-center">
    <main class="form-card">
        <header class="form-header">
            <h2>Tambah Siswa</h2>
        </header>

        <form action="" method="post" class="form-body">
            <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="text" name="nisn" id="nisn" placeholder="10 digit NISN" required>
            </div>

            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="form-group">
                <label for="kelas">Kelas</label>
                <input type="text" name="kelas" id="kelas" placeholder="Contoh: XII RPL 1" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </main>
</body>
</html>