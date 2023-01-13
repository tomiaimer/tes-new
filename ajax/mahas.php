<?php 
require '../koneksi.php';

$keyword = $_GET["key"];

$query = "SELECT * FROM mahasiswa
            WHERE
          NAMA LIKE '%$keyword%' OR
          NIP LIKE '%$keyword%' OR
          EMAIL LIKE '%$keyword%' OR
          JURUSAN LIKE '%$keyword%'
        ";
$mahasiswa = query($query);
?>
<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach( $mahasiswa as $row ) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td>
            <a href="ubah.php?id=<?= $row["ID"]; ?>">ubah</a> |
            <a href="hapus.php?id=<?= $row["ID"]; ?>" onclick="return confirm('yakin?');">hapus</a>
        </td>
        <td><img src="../img/img/<?= $row["GAMBAR"]; ?>" width="50"></td>
        <td><?= $row["NIP"]; ?></td>
        <td><?= $row["NAMA"]; ?></td>
        <td><?= $row["EMAIL"]; ?></td>
        <td><?= $row["JURUSAN"]; ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
    
</table>