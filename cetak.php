<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'koneksi.php';
$mahasiswa = query("SELECT * FROM mahasiswa");


$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL TO PHP</title>
    <link href="fontawesome/css/all.min.css" rel="stylesheet">
    <body> 
<h1>Data Mahasiswa</h1>
<table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>';
        $i = 1;
        foreach( $mahasiswa as $row ) {
           $html .= '<tr>
               <td>'. $i++ .'</td>
               <td><img src="../img/img/'. $row["GAMBAR"] .'" width="50"></td>
               <td>'. $row["NAMA"] .'</td>
               <td>'. $row["NIP"] .'</td>
               <td>'. $row["JURUSAN"] .'</td>
               <td>'. $row["EMAIL"] .'</td>
           </tr>';
        }   
        $html .= '</table>    
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('daftar - mahasiswa' , 'D');
