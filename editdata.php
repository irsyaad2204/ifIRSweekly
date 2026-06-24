<?php

    require 'connection.php';

    $id = $_GET['id'];
    $query = "SELECT * FROM mahasiswa WHERE id = $id";
    $row = query($query)[0];
    if(isset($_POST['submit']))
    if(editdata($_POST, $id) >0){
        echo "<script>
                alert('Data berhasil diubah!'); 
                window.location.href='mahasiswa.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal diubah: " . mysqli_error($connection) . "'); 
                window.location.href='mahasiswa.php';
              </script>";
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h2>Edit Data Mahasiswa</h2>
    
    <form action="" method="post" enctype="multipart/form-data">
        <table cellspacing="0" cellpadding="5">
            <tr>
                <td><label for="nama">Nama</label></td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" value ="<?= $row["nama"] ?> " required /></td>
            </tr>
            <tr>
                <td><label for="nim">NIM</label></td>
                <td>:</td>
                <td><input type="text" name="nim" id="nim" value ="<?= $row["nim"] ?> " required /></td>
            </tr>
            <tr>
                <td><label for="jurusan">Jurusan</label></td>
                <td>:</td>
                <td><input type="text" name="jurusan" id="jurusan" value ="<?= $row["jurusan"] ?> " required /></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td>:</td>
                <td><input type="email" name="email" id="email" value ="<?= $row["email"] ?> " required /></td>
            </tr>
            <tr>
                <td><label for="no_hp">NO HP</label></td>
                <td>:</td>
                <td><input type="text" name="no_hp" id="no_hp" value ="<?= $row["no_hp"] ?> " required /></td>
            </tr>
            <tr>
                <td><label for="foto">Foto</label></td>
                <td>:</td>
                <td><input type="file" name="foto" id="foto" value ="<?= $row["foto"] ?> " required/></td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <br>
                    <button type="submit" name="submit">Simpan</button>
                    <button type="reset">Reset</button>
                    <a href="mahasiswa.php"><button type="button">Kembali</button></a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>