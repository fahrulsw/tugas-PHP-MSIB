<?php

    $m1 = ['nim'=>'A211190104','nama'=>'Fahrul','nilai'=>'90'];
    $m2 = ['nim'=>'B211190105','nama'=>'Wahid','nilai'=>'75'];
    $m3 = ['nim'=>'C211190106','nama'=>'Haaland','nilai'=>'45'];
    $m4 = ['nim'=>'D211190107','nama'=>'Pratama Arhan','nilai'=>'76'];
    $m5 = ['nim'=>'E211190108','nama'=>'Dewangga','nilai'=>'89'];
    $m6 = ['nim'=>'F211190109','nama'=>'Marukawa','nilai'=>'34'];
    $m7 = ['nim'=>'G211190110','nama'=>'Carlos Fortes','nilai'=>'55'];
    $m8 = ['nim'=>'H211190111','nama'=>'Fredyan Wahyu','nilai'=>'20'];
    $m9 = ['nim'=>'K211190112','nama'=>'Rahmat Irianto','nilai'=>'70'];
    $m10 = ['nim'=>'L211190113','nama'=>'Dimas Drajad','nilai'=>'25'];

    $ar_judul = ['No','NIM','Nama','Nilai','Keterangan','Grade','Predikat'];
    $no=1;
    $mahasiswa=[$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9,$m10];

    //aggregate function in array
    $jml_mahasiswa = count($mahasiswa);
    $jml_nilai = array_column($mahasiswa,'nilai');
    $total_nilai = array_sum($jml_nilai);
    $max_nilai = max($jml_nilai);
    $min_nilai = min($jml_nilai);
    $rata2 = $total_nilai / $jml_mahasiswa;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 3 | Looping & Array</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body class="m-4">
    <h3 class="text-center mb-4 mt-4">Daftar Mahasiswa</h3>
    <table class="table table-striped table-hover me-5">
        <thead class="bg-warning">
            <tr>
                <?php 
                foreach ($ar_judul as $judul) {
                
                ?>
                <th><?= $judul?></th>
                <?php }?>
            </tr>
        </thead>
        <tbody>
            <?php
             foreach ($mahasiswa as $mhs) {
                //Keterangan
                $ket = $mhs['nilai'] >=60 ? "Lulus" : "Gagal";
                
                //Grade
                if($mhs['nilai']>=85 && $mhs['nilai']<=100) $grade = 'A';
                else if($mhs['nilai']>=65 && $mhs['nilai']< 85) $grade = 'B';
                else if($mhs['nilai']>=50 && $mhs['nilai']< 65) $grade = 'C';
                else if($mhs['nilai']>=40 && $mhs['nilai']< 50) $grade = 'D';
                else if($mhs['nilai']>=0 && $mhs['nilai']< 40) $grade = 'E';
                else $grade = '';

                //predikat
                switch($grade){
                    case 'A' : $predikat = 'Memuaskan';break;
                    case 'B' : $predikat = 'Baik';break;
                    case 'C' : $predikat = 'Cukup';break;
                    case 'D' : $predikat = 'Kurang';break;
                    case 'E' : $predikat = 'Buruk';break;
                    default :$predikat='';
                } 
                
            
            ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $mhs['nim']?></td>
                <td><?= $mhs['nama']?></td>
                <td><?= $mhs['nilai']?></td>
                <td><?= $ket?></td>
                <td><?= $grade?></td>
                <td><?= $predikat?></td>
               
            </tr>

            <?php }?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Nilai Tertinggi</th>
                <th colspan="5"><?= $max_nilai?></th>
            </tr>
            <tr>
                <th colspan="2">Nilai Terendah</th>
                <th colspan="5"><?= $min_nilai?></th>
            </tr>
            <tr>
                <th colspan="2">Rata - rata</th>
                <th colspan="5"><?= $rata2?></th>
            </tr>
            <tr>
                <th colspan="2">Jumlah Mahasiswa</th>
                <th colspan="5"><?= $jml_mahasiswa?></th>
            </tr>
        </tfoot>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>