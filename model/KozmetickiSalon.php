<?php

class KozmetickiSalon {

    public $kozmeticki_salon_id = 0;
    public $kozmeticki_salon_naziv = '';

    public function getKozmeticki_salon_id() {
        return $this->kozmeticki_salon_id;
    }

    public function getKozmeticki_salon_naziv() {
        return $this->Kozmeticki_salon_naziv;
    }

    public function setKozmeticki_salon_id($kozmeticki_salon_id) {
        $this->kozmeticki_salon_id = $kozmeticki_salon_id;
    }

    public function setKozmeticki_salon_id($kozmeticki_salon_naziv) {
        $this->kozmeticki_salon_naziv= $kozmeticki_salon_naziv;
    }

    public static function vratiSvePodatkeIzBaze() {
        include 'konekcija.php';
        $podaciIzBaze = $mysqli->query('SELECT * FROM kozmeticki_salon');
        $kozmetickiSalonNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $kozmeticki_salon = new KozmetickiSalon();
            $kozmeticki_salon->setKozmeticki_salon_id($red['kozmeticki_salon_id']);
            $kozmeticki_salon->setKozmeticki_salon_naziv($red['kozmeticki_salon_naziv']);
            array_push($kozmetickiSalonNiz, $kozmeticki_salon);
        }
        return $kozmetickiSalonNiz;
    }

    public function save() {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("INSERT INTO kozmeticki_salon (kozmeticki_salon_naziv)
            VALUES ('$this->kozmeticki_salon_naziv')");
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }

    public static function obrisi($kozmeticki_salon_id) {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query('DELETE FROM kozmeticki_salon WHERE kozmeticki_salon_id=' . $kozmeticki_salon_id);
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }

}