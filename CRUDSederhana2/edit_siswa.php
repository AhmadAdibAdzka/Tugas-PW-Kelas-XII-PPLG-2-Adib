<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

include 'config/koneksi.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM siswa WHERE nisn = '$id'";
    $result = $conn->query($sql);

    if($result && $result->num_rows > 0){
        $row = $result->fetch_assoc();
    } else {
        echo "Data siswa tidak ditemukan";
        exit();
    }
} else {
    echo "NISN tidak Ditemukan di URL!";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $sql = "UPDATE siswa SET nisn='$nisn', nama='$nama', kelas='$kelas' WHERE nisn=$id";
    $query = mysqli_query($conn, $sql);
    if($query) {
        header('location: index.php');
        exit();
    } else {
        echo "Gagal update data: ".mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <head>
        <h1>Edit Siswa</h1><br><br>
    </head>
    <main>
        <form action="" method="post">
            <label for="nisn">NISN</label><br>
            <input type="text" name="nisn" id="nisn" value="<?= $row['nisn'];?>" placeholder="10 digit" required><br><br>

            <label for="nama">Nama</label><br>
            <input type="text" name="nama" id="" value="<?= $row['nama'];?>" placeholder="Nama Lengkap" required><br><br>

            <label for="kelas">Kelas</label><br>
            <input type="text" name="kelas" id="kelas" value="<?= $row['kelas'];?>" placeholder="Kelas dan Jurusan" required><br><br>

            <input type="submit" value="Tambah"> | <a class="back-link" href="index.php">Batal</a>
        </form>
    </main>
</body>
</html>