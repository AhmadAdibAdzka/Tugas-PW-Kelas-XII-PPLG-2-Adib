<?php
include "config/koneksi.php";

$query = "SELECT * FROM siswa ORDER BY nama DESC";
$result_siswa = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRUD Sederhana</title>
    <link rel="stylesheet" href="style/style.css">
  </head>
  <body>
    <head>
      <h1>CRUD NISN</h1>
      <a href="tambah_siswa.php">Tambah Siswa</a>
    </head>
    <main>
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $no = 1;
            if($result_siswa && mysqli_num_rows($result_siswa) > 0){
              while($row = mysqli_fetch_assoc($result_siswa)) :?>
                <tr>
                  <td><?= $no++?></td>
                  <td><?= htmlspecialchars($row['nisn']);?></td>
                  <td><?= htmlspecialchars($row['nama']);?></td>
                  <td><?= htmlspecialchars($row['kelas']);?></td>
                  <td>
                    <a href="edit_siswa.php?id=<?=$row['nisn'];?>">Edit</a> | 
                    <a href="hapus_siswa.php?id=<?=$row['nisn'];?>">Hapus</a>
                  </td>
                </tr>
          <?php endwhile;?>
          <?php } else {?>
          <?php }?>
        </tbody>
      </table>
    </main>
    <footer></footer>
  </body>
</html>
