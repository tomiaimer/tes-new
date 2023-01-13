<?php 
session_start();
if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}


    require 'koneksi.php';


    // pagination
// konfigurasi
$jumlahDataPerHalaman = 2;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

$mahas = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");
 

    if ( isset($_POST["cari"])) {
         $mahas = cari($_POST["key"]);
        }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL TO PHP</title>
    <link href="fontawesome/css/all.min.css" rel="stylesheet"> 
    <style>
		#loader {
			position: absolute;
			top: 188px;
			left: 330px;
			z-index: -1;
			display: none;
		}
	</style>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/script.js"></script>
</head>
<body>

    <a href="logout.php" class="fas fa-power-off"> Log Out</a> | <a href="cetak.php" class="fas fa-print"> print!</a>
    <h1>Data Mahasiswa</h1>
    



    <!-- navigasi -->
<a href="?halaman=1">awal</a>

<?php if( $halamanAktif > 1 ) : ?>
	<a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
<?php endif; ?>

<?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
	<?php if( $i == $halamanAktif ) : ?>
		<a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
	<?php else : ?>
		<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
	<?php endif; ?>
<?php endfor; ?>

<?php if( $halamanAktif < $jumlahHalaman ) : ?>
	<a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
<?php endif; ?>

<a href="?halaman=<?= $jumlahHalaman; ?>">akhir</a>

    <h3><a href="tambah.php">Tambah data</a></h3>
    <form action="" method="post">
        <input type="text" name="key" placeholder="cari mahasiswa NAMA/NIP" autofocus size="40" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Search!</button>
        <div class="fas fa-spin fa-yin-yang" id="loader"></div>

        <div id="container">

    </form>

    <table border="1" cellspacing="1" cellpadding="10">
        <tr>
        <th>NO</th>
        <th>AKSI</th>
        <th>NAMA</th>
        <th>NIP</th>
        <th>JURUSAN</th>
        <th>EMAIL</th>
        <th>GAMBAR</th>
        </tr>
        <?php 
            foreach($mahas as $rows) :
        ?>
        <tr>
        <td><?= $rows["ID"] ?></td>
        <td><a href="ubah.php?id=<?= $rows["ID"] ?>">ubah</a> | <a href="hapus.php?ID=<?= $rows["ID"] ?>" onclick="return confirm('yakin?')">hapus</a></td>
        <td><?= $rows["NAMA"] ?></td>
        <td><?= $rows["NIP"] ?></td>
        <td><?= $rows["JURUSAN"] ?></td>
        <td><?= $rows["EMAIL"] ?></td>
        <td><img src="../img/img/<?= $rows["GAMBAR"] ?>" alt="" width="100px"></td>
        </tr>
        <?php endforeach ?>
    </table>
    </div>
    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/script2.js"></script>
</body>
</html>