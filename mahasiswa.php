<?php
require_once "connection.php";
$query = mysqli_query($connection, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
        <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
     <h1>INFORMATIKA</h1>
    <hr>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>
                <a href="index.php">Home</a>
            </td>
            <td>
                <a href="profile.php">Profile</a>
            </td>
            <td>
                <a href="contact.php">Contact</a>
            </td>
            <td>
                <a href="mahasiswa.php">Data Mahasiswa</a>
            </td>
        </tr>
    </table>
    <h2>Data Mahasiswa</h2>
    <a href="inputdata.php">
        <button>Tambah Data Mahasiswa</button></a>
        <br><br>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th >No</th>
            <th >Nama</th>
            <th >Nim</th>
            <th >Jurusan</th>
            <th >Email</th>
            <th >No Hp</th>
            <th >Foto</th>
            <th >Aksi</th>
        </tr>
        <tr>
        <?php
        $no = 1;

        while ($row = mysqli_fetch_assoc($query)):
            ?>
            <tr>
                <td align="center">
                    <?= $no++; ?>
                </td>

                <td>
                    <?= $row['nama']; ?>
                </td>

                <td>
                    <?= $row['nim']; ?>
                </td>

                <td>
                    <?= $row['jurusan']; ?>
                </td>

                <td>
                    <?= $row['email']; ?>
                </td>

                <td>
                    <?= $row['no_hp']; ?>
                </td>

                <td align="center">
                    <img src="assets/images/<?= $row['foto']; ?>" width="120px">
                </td>

                 <td><a href="editdata.php">
                <button>Edit</button></a>
                <a href="deletedata.php">
                <button>delete</button></a>
            </tr>

        <?php endwhile; 
        ?>
</html>