<?php
if (isset($_POST['submit'])) {
    require_once "connection.php";
    
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $foto = $_FILES['foto']['name'];
    $tmp_foto = $_FILES['foto']['tmp_name'];
    $error_foto = $_FILES['foto']['error'];

    if ($error_foto === 0) {
        move_uploaded_file($tmp_foto, "assets/images/" . $foto);
    } else {
        $foto = "default.jpg";
    }

    $sql = "INSERT INTO mahasiswa (nama, nim, jurusan, email, no_hp, foto) 
            VALUES ('$nama', '$nim', '$jurusan', '$email', '$no_hp', '$foto')";
            
    $exec = mysqli_query($connection, $sql);
    if ($exec) {
        echo "<script>
                alert('Data berhasil disimpan!'); 
                window.location.href='mahasiswa.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal disimpan: " . mysqli_error($connection) . "'); 
                window.location.href='inputdata.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h2>Tambah Data Mahasiswa</h2>
    
    <form action="" method="post" enctype="multipart/form-data">
        <table cellspacing="0" cellpadding="5">
            <tr>
                <td><label for="nama">Nama</label></td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" required /></td>
            </tr>
            <tr>
                <td><label for="nim">NIM</label></td>
                <td>:</td>
                <td><input type="text" name="nim" id="nim" required /></td>
            </tr>
            <tr>
                <td><label for="jurusan">Jurusan</label></td>
                <td>:</td>
                <td><input type="text" name="jurusan" id="jurusan" required /></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td>:</td>
                <td><input type="email" name="email" id="email" required /></td>
            </tr>
            <tr>
                <td><label for="no_hp">NO HP</label></td>
                <td>:</td>
                <td><input type="text" name="no_hp" id="no_hp" required /></td>
            </tr>
            <tr>
                <td><label for="foto">Foto</label></td>
                <td>:</td>
                <td><input type="file" name="foto" id="foto" /></td>
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