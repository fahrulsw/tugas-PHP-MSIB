<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 4 | Function & OOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body class="m-4">
  <table class="table table-striped mt-3">
    <thead class="bg-primary text-light">
        <tr>
            <th>NIP</th>
            <th>NAMA</th>
            <th>JABATAN</th>
            <th>AGAMA</th>
            <th>STATUS</th>
            <th>GAJI POKOK</th>
            <th>TUNJANGAN JABATAN</th>
            <th>TUNJANGAN KELUARGA</th>
            <th>ZAKAT PROFESI</th>
            <th>GAJI BERSIH</th>
        </tr>
    </thead>
    <tbody>
   
<?php

class Pegawai{
    public $nip, $nama, $jabatan, $agama, $status;
    static $jml=0;

    const PEGAWAI= 'Data Pegawai Kampus Merdeka';
    public function __construct($nip, $nama,$jabatan,$agama,$status)
    {
        $this->nip=$nip;
        $this->nama=$nama;
        $this->jabatan=$jabatan;
        $this->agama=$agama;
        $this->status=$status;  
        self::$jml++;

    }
    public function setGajiPokok(){
        switch($this->jabatan){
            case 'Manager' : $this->gapok = 15000000;break;
            case 'Asisten Manager' : $this->gapok = 10000000;break;
            case 'Kabag' : $this->gapok = 7000000;break;
            case 'Staff' : $this->gapok = 4000000;break;
            default : break;
        }
        return $this->gapok;
    }

    public function setTunjab(){
       $this->tunjab = 0.2*$this->gapok;
       return $this->tunjab;
    }
    public function setTunkel(){
       $this->tunkel = $this->status == 'Menikah' ? 0.1*$this->gapok : 0;
       return $this->tunkel;
    }

    public function setZakatProfesi(){
        $this->gakot = $this->gapok + $this->tunjab + $this->tunkel;
        $this->zakat = $this->agama == "Islam" && $this->gakot >=6000000 ? 0.025*$this->gakot :0;

        return $this->zakat;
    }
    public function setGajiBersih(){
        $this->gaber = $this->gakot - $this->setZakatProfesi();
        return $this->gaber;
    }
    public function mencetak(){
        // dibikin tabel biar rapi
        echo '<tr>';
        echo '<td>'.$this->nip.'</td>';
        echo '<td>'.$this->nama.'</td>';
        echo '<td>'.$this->jabatan.'</td>';
        echo '<td>'.$this->agama.'</td>';
        echo '<td>'.$this->status.'</td>';
        echo '<td>'.number_format($this->setGajiPokok(),0,',','.').'</td>';
        echo '<td>'.number_format($this->setTunjab(),0,',','.').'</td>';
        echo '<td>'.number_format($this->setTunkel(),0,',','.').'</td>';
        echo '<td>'.number_format($this->setZakatProfesi(),0,',','.').'</td>';
        echo '<td>'.number_format($this->setGajiBersih(),0,',','.').'</td>';
        echo '</tr>';
    }
}

$objPeg1 = new Pegawai('001','Wahid','Manager','Islam','Menikah');
$objPeg2 = new Pegawai('002','Elkan Baggot','Staff','Kristen','Belum Menikah');
$objPeg3 = new Pegawai('003','Witan Sulaiman','Kabag','Islam','Menikah');
$objPeg4 = new Pegawai('004','Marc Klok','Asisten Manager','Kristen','Menikah');
$objPeg5 = new Pegawai('005','Rizky Ridho','Kabag','Islam','Belum Menikah');
$objPeg6 = new Pegawai('006','Dimas Drajad','Manager','Islam','Menikah');


echo '<h2 align="center"> '.Pegawai::PEGAWAI.'</h2>';
$objPeg1->mencetak();
$objPeg2->mencetak();
$objPeg3->mencetak();
$objPeg4->mencetak();
$objPeg5->mencetak();
$objPeg6->mencetak();

echo '<b>Jumlah Pegawai: '.Pegawai::$jml;

?>
         </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>

