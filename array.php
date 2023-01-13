<?php
$Karya = [
    ["nama" => "untitel",
     "gender" => "cwk",
     "umur" => 18 ,
     "gambar" => "prof.jpg"] , 
    ["nama" => "untitled",
     "gender" => "cwk",
     "umur" => 20 ,
     "gambar" => "oppa.jpg"] ,
     ["nama" => "om om ",
     "gender" => "cwk",
     "umur" => 30 ,
     "gambar" => "kumis.jpg"] ,
] ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Data Karyawin</h1>
    <ul>
        <?php
        foreach($Karya as $karto) : ?>
        <li><?php echo $karto["nama"] ?></li>
        <li><?php echo $karto["gender"] ?></li>
        <li><?php echo $karto["umur"] ?></li>
        <li> <img src="../img/img/<?php echo $karto["gambar"] ?>" alt=""></li>
        <br><br>
         <?php endforeach; ?>
    </ul>
</body>
</html>