<?php
$host= "localhost";
$user= "root";
$pass = "";
$db = "crud_nisn";

$conn = mysqli_connect($host,$user,$pass,$db);

if(!$conn) {
    die("Koneksi gagal: ".mysqli_conncet_error());
}
?>