<?php
session_start();
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
//cek sudah di tekan  submit apa belum
require 'koneksi.php';
$id = $_GET["id"];
$mhs = query("SELECT * FROM mahasiswa where id = $id")[0];

if (isset($_POST["submit"])) {
    if ( ubah
     ($_POST) > 0) {
        echo "<script>
        alert ('berhasil di ubah');
        document.location.href = 'index.php'
        </script>"
        ;
    }
    else {
        echo "<script>
        alert ('data gagal di ubah');
        document.location.href = 'index.php'
        </script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data Karyawan</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
    <ul>
    <input type="hidden" name="ID" id="ID" value="<?= $id ?>">
    <input type="hidden" name="GAMBARLAMA" value="<?= $mhs["GAMBAR"] ?>">
        <li><label for="NAMA">NAMA  :</label>
            <input type="text" name="NAMA" id="NAMA" required value="<?= $mhs["NAMA"] ?>">
        </li>
        <li><label for="NIP">NIP    :</label>
            <input type="text" name="NIP" id="NIP" required value="<?= $mhs["NIP"] ?>">
        </li>
        <li><label for="JURUSAN">JURUSAN    :</label>
            <input type="text" name="JURUSAN" id="JURUSAN" required value="<?= $mhs["JURUSAN"] ?>">
        </li>
        <li><label for="EMAIL">EMAIL    :</label>
            <input type="text" name="EMAIL" id="EMAIL" value="<?= $mhs["EMAIL"] ?>">
        </li>
        <li><label for="GAMBAR"><img src="../img/img/<?= $mhs["GAMBAR"] ?>" width="100px" height="100px"></label>
            <input type="file" name="GAMBAR" id="GAMBAR">
        </li>
        <li>
        <button type="submit" name="submit">Submit</button>
        </li>
    </ul>

    </form>
</body>
</html>