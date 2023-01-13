<?php
session_start();
if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

//cek sudah di tekan  submit apa belum
require 'koneksi.php';
if (isset($_POST["submit"])) {
    if ( tambah($_POST) > 0) {
        echo "<script>
        alert ('berhasil');
        document.location.href = 'index.php'
        </script>";
    }
    else {
        echo "<script>
        alert ('data gagal');
        document.location.href = 'index.php'
        </script>";
    }
};

//cek apakah data berhasil di tambahkan


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
        <li><label for="NAMA">NAMA  :</label>
            <input type="text" name="NAMA" id="NAMA" required>
        </li>
        <li><label for="NIP">NIP    :</label>
            <input type="text" name="NIP" id="NIP" required>
        </li>
        <li><label for="JURUSAN">JURUSAN    :</label>
            <input type="text" name="JURUSAN" id="JURUSAN" required>
        </li>
        <li><label for="EMAIL">EMAIL    :</label>
            <input type="text" name="EMAIL" id="EMAIL">
        </li>
        <li><label for="GAMBAR">GAMBAR  :</label>
            <input type="file" name="GAMBAR" id="GAMBAR">
        </li>
        <li>
        <button type="submit" name="submit">Submit</button>
        </li>
    </ul>

    </form>
</body>
</html>