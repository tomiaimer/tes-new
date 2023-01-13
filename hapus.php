<?php 
session_start();
if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'koneksi.php';

$id = $_GET['ID'];

if ( hapus ($id) > 0) {
    echo "<script>
    alert ('berhasil di hapus');
    document.location.href = 'index.php'
    </script>"
    ;
}
else {
    echo "<script>
    alert ('gagal di hapus');
    document.location.href = 'index.php'
    </script>";
}

?>