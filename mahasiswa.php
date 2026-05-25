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
            <td align="center">1</td>
            <td>JOKOWI</td>
            <td>239576276</td>
            <td><img src="assets/images/presiden_jokowi.jpg" alt="JOKOWI" width="100px"/></td>
            <td align="center">80</td>
            <td align="center">85</td>
            <td align="center">90</td>
            <td><a href="editdata.php">
                <button>Edit</button></a>
                <a href="deletedata.php">
                <button>delete</button></a>
</body>
</html>