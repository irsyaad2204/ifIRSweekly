<?php
require "connection.php";

// Menggunakan fungsi query() yang sudah dibuat di connection.php
// Jika memakai mysqli_query langsung: $result = mysqli_query($connection, "SELECT * FROM mahasiswa");
$mahasiswa = query("SELECT * FROM mahasiswa");
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
            <td><a href="index.php">Home</a></td>
            <td><a href="profile.php">Profile</a></td>
            <td><a href="contact.php">Contact</a></td>
            <td><a href="mahasiswa.php">Data Mahasiswa</a></td>
        </tr>
    </table>
    
    <h2>Data Mahasiswa</h2>
    <a href="inputdata.php">
        <button>Tambah Data Mahasiswa</button>
    </a>
    <br><br>
    
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nim</th>
                <th>Jurusan</th>
                <th>Email</th>
                <th>No Hp</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            // Melakukan perulangan array dari fungsi query()
            foreach ($mahasiswa as $row) : 
            ?>
            <tr>
                <td align="center"><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['nama']); ?></td>
                <td><?= htmlspecialchars($row['nim']); ?></td>
                <td><?= htmlspecialchars($row['jurusan']); ?></td>
                <td><?= htmlspecialchars($row['email']); ?></td>
                <td><?= htmlspecialchars($row['no_hp']); ?></td>
                <td align="center">
                    <?php if (!empty($row['foto'])): ?>
                        <img src="assets/images/<?= $row['foto']; ?>" width="120px" alt="Foto <?= $row['nama']; ?>">
                    <?php else: ?>
                        <img src="assets/images/default.jpg" width="120px" alt="No Image">
                    <?php endif; ?>
                </td>
                <td>
                    <a href="editdata.php?id=<?= $row['id']; ?>">
                        <button>Edit</button>
                    </a>
                    <a href="deletedata.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        <button>Delete</button>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>