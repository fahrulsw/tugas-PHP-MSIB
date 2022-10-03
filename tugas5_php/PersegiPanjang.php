<?php

require_once 'Bentuk2D.php';

class PersegiPanjang extends Bentuk2D{

    public $panjang = 5;
    public $lebar = 3;

    public function namaBidang(){
        echo 'Persegi Panjang';
    }
    public function luasBidang(){
        $luas = $this->panjang*$this->lebar;
        echo $luas.' cm';

    }
    public function kelilingBidang(){
        $kll = 2*($this->panjang+$this->lebar);
        echo $kll.' cm';
    }

    public function ketBidang(){
        echo 'Panjang : '.$this->panjang.' cm';
        echo '<br>Lebar : '.$this->lebar.' cm';
    }

}