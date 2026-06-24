<?php
$connection = mysqli_connect(
    "localhost", 
    "root", 
    "root", 
    "ifirsweekly"
);
function query($query){
    global $connection;
    $result = mysqli_query($connection, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function inputdata($data){
    global $connection;
    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $email = htmlspecialchars($data['email']);
    $no_hp = htmlspecialchars($data['no_hp']);
    $foto = $_FILES['foto']['name'];
    $tmp_foto = $_FILES['foto']['tmp_name'];
    $error_foto = $_FILES['foto']['error'];

    $foto = date('YmdHis') . '_' . $foto;

    if ($error_foto === 0) {
        move_uploaded_file($tmp_foto, "assets/images/" . $foto);
    } else {
        $foto = "default.jpg";
    }

    $query = "INSERT INTO mahasiswa (nama, nim, jurusan, email, no_hp, foto) 
            VALUES ('$nama', '$nim', '$jurusan', '$email', '$no_hp', '$foto')";

    mysqli_query($connection, $query);

    return mysqli_affected_rows($connection);
}
function deletedata($id){
    global $connection;
    $query = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}

function editdata($data, $id){
    global $connection;
    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $email = htmlspecialchars($data['email']);
    $no_hp = htmlspecialchars($data['no_hp']);
    $foto = $_FILES['foto']['name'];
    $tmp_foto = $_FILES['foto']['tmp_name'];
    $error_foto = $_FILES['foto']['error'];

    if ($error_foto === 0) {
        move_uploaded_file($tmp_foto, "assets/images/" . $foto);
    } else {
        $foto = "default.jpg";
    }

    $query = "UPDATE mahasiswa SET 
                nama='$nama',
                nim='$nim',
                jurusan='$jurusan',
                email='$email',
                no_hp='$no_hp',
                foto='$foto'
            where id=$id";


    mysqli_query($connection, $query);

    return mysqli_affected_rows($connection);
}
?>