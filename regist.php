<?php 
require "koneksi.php";

if(isset($_POST["submit"])) {
    if (regis ($_POST) > 0) {
        echo "<script>
        alert ('berhasil terdaftar');
        </script>"
        ;
    }
    else {
        echo "data gagal di tambahkan";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun</title>
    <style>
        label {
            display: block;
            margin: 10px;
        }
        button {
            display: block;
            margin: 10px 0px;
        }
    </style>
</head>
<body>
    <h1>Registrasi Akun</h1>
    <form action="" method="POST">
    <label for="username"> Username : </label>
    <input type="text" name="username" id="username" required placeholder="input username / email" autofocus>
    <label for="password"> Password :</label>
    <input type="password" name="password" id="password" required placeholder="silahkan isi password" size="40" autocomplete="off">
    <label for="password2"> Konfirm password :</label>
    <input type="password" name="password2" id="password2" required placeholder="silahkan isi password" size="40">
    <button type="submit" name="submit"> Registrasi!</button>
    </form>
</body>
</html>