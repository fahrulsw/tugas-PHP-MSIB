<?php

require_once 'Bentuk2D.php';

class Lingkaran extends Bentuk2D{

    public $jari2 = 5;
    public $PHI = 3.14;

    public function namaBidang(){
        echo 'Lingkaran';
    }
    public function luasBidang(){
        $luas = $this->PHI*$this->jari2*$this->jari2;
        echo $luas.' cm';

    }
    public function kelilingBidang(){
        $kll = 2*$this->PHI*$this->jari2;
        echo $kll.' cm';
    }

    public function ketBidang(){
        echo 'Jari - Jari : '.$this->jari2.' cm';
        
    }

}