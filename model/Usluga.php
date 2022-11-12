<?php

class Usluga {

    public $usluga_id;
    public $usluga_naziv;
    public $usluga_opis;
    public $usluga_cena;
    public $kozmeticki_salon_id;

    public function getUsluga_id() {
        return $this->usluga_id;
    }

    public function getUsluga_naziv() {
        return $this->usluga_naziv;
    }

    public function getUsluga_opis() {
        return $this->usluga_opis;
    }

    public function getUsluga_cena() {
        return $this->usluga_cena;
    }

    public function getKozmeicki_salon_id() {
        return $this->kozmeticki_salon_id;
    }

    public function setUsluga_id($usluga_id) {
        $this->usluga_id = $usluga_id;
    }

    public function setUsluga_naziv($usluga_naziv) {
        $this->usluga_naziv = $usluga_naziv;
    }

    public function setUsluga_opis($usluga_opis) {
        $this->usluga_opis = $usluga_opis;
    }

    public function setUsluga_cena($usluga_cena) {
        $this->usluga_cena = $usluga_cena;
    }

    public function setKozmeticki_salon_id($kozmeticki_salon_id) {
        $this->kozmeticki_salon_id = $kozmeticki_salon_id;
    }

    public static function vratiSvePodatkeIzBaze() {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query('SELECT usluga_id, usluga_naziv, usluga_opis, usluga_cena, kozmeticki_salon_naziv 
                                        FROM kozmeticki_salon, usluga 
                                        WHERE kozmeticki_salon.kozmeticki_salon_id=usluga.kozmeticki_salon_id');
        $uslugaNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $usluga = new usluga();
            $usluga->setUsluga_id($red['usluga_id']);
            $usluga->setUsluga_naziv($red['usluga_naziv']);
            $usluga->setUsluga_opis($red['usluga_opis']);
            $usluga->setUsluga_cena($red['usluga_cena']);
            $usluga->setKozmeticki_salon_id($red['kozmeticki_salon_naziv']);
            array_push($uslugaNiz, $usluga);
        }
        return $uslugaNiz;
    }

    public static function sortAsc() {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("SELECT usluga_id, usluga_naziv, usluga_opis, usluga_cena, kozmeticki_salon_naziv 
                                        FROM kozmeticki_salon, usluga 
                                        WHERE kozmeticki_salon.kozmeticki_salon_id=usluga.kozmeticki_salon_id
                                        ORDER BY usluga_naziv ASC");
        $uslugaNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $usluga = new usluga();
            $usluga->setUsluga_id($red['usluga_id']);
            $usluga->setUsluga_naziv($red['usluga_naziv']);
            $usluga->setUsluga_opis($red['usluga_opis']);
            $usluga->setUsluga_cena($red['usluga_cena']);
            $usluga->setKozmeticki_salon_id($red['kozmeticki_salon_naziv']);

            array_push($uslugaNiz, $usluga);
        }
        return $uslugaNiz;
    }

    public static function sortDesc() {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("SELECT usluga_id, usluga_naziv, usluga_opis, usluga_cena, kozmeticki_salon_naziv 
                                        FROM kozmeticki_salon, usluga 
                                        WHERE kozmeticki_salon.kozmeticki_salon_id=usluga.kozmeticki_salon_id
                                        ORDER BY usluga_naziv DESC");
        $uslugaNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $usluga = new usluga();
            $usluga->setUsluga_id($red['usluga_id']);
            $usluga->setUsluga_naziv($red['usluga_naziv']);
            $usluga->setUsluga_opis($red['usluga_opis']);
            $usluga->setUsluga_cena($red['usluga_cena']);
            $usluga->setKozmeticki_salon_id($red['kozmeticki_salon_naziv']);

            array_push($uslugaNiz, $usluga);
        }
        return $uslugaNiz;
    }

    public static function vratiPoNazivu($pretraga) {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("SELECT usluga_id, usluga_naziv, usluga_opis, usluga_cena, kozmeticki_salon_naziv
                                        FROM kozmeticki_salon, usluga 
                                        WHERE kozmeticki_salon.kozmeticki_salon_id=usluga.kozmeticki_salon_id and usluga_naziv LIKE '%$pretraga%'");
        $uslugaNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $usluga = new usluga();
            $usluga->setUsluga_id($red['usluga_id']);
            $usluga->setUsluga_naziv($red['usluga_naziv']);
            $usluga->setUsluga_opis($red['usluga_opis']);
            $usluga->setUsluga_cena($red['usluga_cena']);
            $usluga->setKozmeticki_salon_id($red['kozmeticki_salon_naziv']);

            array_push($uslugaNiz, $usluga);
        }
        return $uslugaNiz;
    }

    public function save() {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("INSERT INTO usluga (usluga_naziv, usluga_opis, usluga_cena, kozmeticki_salon_id)
            VALUES ('$this->usluga_naziv', '$this->usluga_opis', '$this->usluga_cena', '$this->kozmeticki_salon_id')");
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }

    public static function obrisi($usluga_id) {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query('DELETE FROM usluga WHERE usluga_id=' . $usluga_id);
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }



}