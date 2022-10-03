<?php

require_once 'Lingkaran.php';
require_once 'PersegiPanjang.php';
require_once 'Segitiga.php';

$lingkaran = new Lingkaran();
$persPanjang = new PersegiPanjang();
$segitiga = new Segitiga();

$bidang = [$lingkaran, $persPanjang,$segitiga];
$no =1;
$ar_judul = ['NO','Nama Bidang','Keterangan','Luas Bidang','Keliling Bidang'];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 5 | Inheritence & Abstract Class </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body class="m-5">
    <h3 class="text-center mb-4">Bidang Bangun Datar</h3>
    <table class="table table-striped table-hover table-bordered">
        <thead style="background-color:tomato;">
            <tr>
            <?php 
            foreach ($ar_judul as $judul) {
            
            ?>
                <th>
                    <?= $judul?>
                </th>
                <?php }?>
            </tr>
        </thead>
        <tbody>
                <?php 
                foreach ($bidang as $bd){
                ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$bd->namaBidang()?></td>
                <td><?=$bd->ketBidang()?></td>
                <td><?=$bd->luasBidang()?></td>
                <td><?=$bd->kelilingBidang()?></td>
                
            </tr>
            <?php } ?>
        </tbody>
        
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>