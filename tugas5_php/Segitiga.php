<?php

require_once 'Bentuk2D.php';

class Segitiga extends Bentuk2D{

    public $alas = 5;
    public $tinggi = 4;

    public function namaBidang(){
        echo 'Segitiga Sama Sisi';
    }
    public function luasBidang(){
        $luas = 0.5 * $this->alas * $this->tinggi;
        echo $luas.' cm';

    }
    public function kelilingBidang(){
        $kll = $this->alas * $this->alas * $this->alas;
        echo $kll.' cm';
    }

    public function ketBidang(){
        echo 'Alas : '.$this->alas.' cm';
        echo '<br>Tinggi : '.$this->tinggi.' cm';
        
    }

}