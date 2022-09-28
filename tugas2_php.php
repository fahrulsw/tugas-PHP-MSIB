<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 2 PHP | Struktur Kendali </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body class="bg-light">
    
    <div class="row p-5">
        <div class="col-2 shadow p-3 mb-5 bg-body rounded">
        <h3 class="text-center mb-4 mt-3">Form Pegawai</h3>
            <form  method="POST">
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Pegawai</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="mb-3">
                    <label  class="form-label fw-bold">Agama</label>
                    <select class="form-select" aria-label="Default select example" name="agama">
                            <option selected disabled>-- Pilih Agama --</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="mb-3" >
                <label class="form-label fw-bold">Jabatan</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jabatan"  value="Manager">
                        <label class="form-check-label" for="exampleRadios1">
                            Manager
                        </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="jabatan"  value="Asisten">
                        <label class="form-check-label" for="exampleRadios2">
                            Asisten
                        </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="jabatan"  value="Kabag">
                        <label class="form-check-label" for="exampleRadios3">
                            Kabag
                        </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="jabatan" value="Staff">
                        <label class="form-check-label" for="exampleRadios3">
                            Staff
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                <label class="form-label fw-bold">Status</label></br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="Menikah" >
                        <label class="form-check-label" for="inlineRadio1">Menikah</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="Belum Menikah">
                        <label class="form-check-label" for="inlineRadio2">Belum Menikah</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Jumlah Anak</label>
                    <input type="number" class="form-control" name="jml_anak">
                </div>
                <button type="submit" class="btn btn-primary mb-3" name="proses">Simpan</button>
            </form>
        </div>
        <div class="col ms-4 shadow p-3 mb-5 bg-body rounded">
        <h3 class="text-center mb-4 mt-3">Data Pegawai</h3>
        <table class="table table-bordered">
            <thead class="table-primary text-center">
                <th>NAMA</th>
                <th>AGAMA</th>
                <th>JABATAN</th>
                <th>STATUS</th>
                <th>JUMLAH ANAK</th>
                <th>GAJI POKOK</th>
                <th>TUNJANGAN JABATAN</th>
                <th>TUNJANGAN KELUARGA</th>
                <th>GAJI KOTOR</th>
                <th>ZAKAT PROFESI</th>
                <th>TAKE HOME PAY</th>
            </thead>
            <tbody>
            <?php
                    
                    $nama = $_POST['nama'];
                    $agama = $_POST['agama'];
                    $jbtn = $_POST['jabatan'];
                    $status = $_POST['status'];
                    $jmlAnak = $_POST['jml_anak'];
                    $tombol = $_POST['proses'];

                 //Gaji pokok berdasarkan Jabatan
                    switch($jbtn){
                        case 'Manager' : $gapok = 20000000; break;
                        case 'Asisten' : $gapok = 15000000; break;
                        case 'Kabag' : $gapok = 10000000; break;
                        case 'Staff' : $gapok = 7000000; break;
                        default : $gapok = 0; break;
                    }
                 //Tunjangan Jabatan   
                    $tunjab = 0.20*$gapok;
                 
                 //Tunjangan Keluarga
                    if($status == 'Menikah' && $jmlAnak >=0 && $jmlAnak <=2) $tunkel = 0.05 * $gapok;
                    else if($status == 'Menikah' && $jmlAnak >=3 && $jmlAnak <=5 ) $tunkel = 0.10* $gapok;
                    else if($status == 'Menikah' && $jmlAnak >5 ) $tunkel = 0.15* $gapok;
                    else $tunkel = 0;
                 
                //Gaji Kotor
                    $gakot= $gapok + $tunjab + $tunkel;

                 //Zakat Profesi
                    $agama == 'Islam' && $gakot >= 6000000 ? $zakat = $gakot * 0.025: $zakat = 0;

                 //Take Home Pay

                    $thp = $gakot - $zakat;

                    if(isset($tombol)){
                        // if(empty($nama) || empty($agama) || empty($jmlAnak)){
                        //     $message = "Data Tidak Lengkap!";
                        //     echo "<script type='text/javascript'>alert('$message');</script>";
                        // }else {?>
                        <tr>
                            <td><?=$nama?></td>
                            <td><?=$agama?></td>
                            <td><?=$jbtn?></td>
                            <td><?=$status?></td>
                            <td><?=$jmlAnak?></td>
                            <td>Rp.<?=number_format($gapok, 0,',','.')?></td>
                            <td>Rp.<?=number_format($tunjab, 0,',','.')?></td>
                            <td>Rp.<?=number_format($tunkel, 0,',','.')?></td>
                            <td>Rp.<?=number_format($gakot, 0,',','.')?></td>
                            <td>Rp.<?=number_format($zakat, 0,',','.')?></td>
                            <td>Rp.<?=number_format($thp, 0,',','.')?></td>
                            
                            
                        </tr>

                        <?php  } ?>
            </tbody>
        </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>