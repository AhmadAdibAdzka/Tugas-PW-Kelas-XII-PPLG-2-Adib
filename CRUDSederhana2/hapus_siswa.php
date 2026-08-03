<?php
include 'config/koneksi.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $conn->query("DELETE FROM siswa WHERE nisn=$id");
    header('location: index.php');
    exit();
} else {
    header('Location: index.php');
    exit();
}
?>