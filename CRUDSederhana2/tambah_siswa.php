<?php
include 'config/koneksi.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $sql = "INSERT INTO siswa (nisn, nama, kelas) VALUES ('$nisn','$nama','$kelas')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header('Location: index.php');
        exit();
    } else {
        echo "Gagal menambahkan data: ".mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <head>
        <h1>Tambah Siswa</h1><br><br>
    </head>
    <main>
        <form action="" method="post">
            <label for="nisn">NISN</label><br>
            <input type="text" name="nisn" id="nisn" placeholder="10 digit" required><br><br>

            <label for="nama">Nama</label><br>
            <input type="text" name="nama" id="" placeholder="Nama Lengkap" required><br><br>

            <label for="kelas">Kelas</label><br>
            <input type="text" name="kelas" id="kelas" placeholder="Kelas dan Jurusan" required><br><br>

            <input type="submit" value="Tambah"> | <a class="back-link" href="index.php">Batal</a>
        </form>
    </main>
</body>
</html>