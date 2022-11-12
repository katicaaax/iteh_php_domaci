<?php
include 'model/KozmetickiSalon.php';
include 'model/Usluga.php';

if (isset($_GET['kozmeticki_salon']) && $_GET['kozmeticki_salon'] == 'prikaz') {
    echo json_encode(KozmetickiSalon::vratiSvePodatkeIzBaze());
}

if (isset($_GET['usluga']) && $_GET['usluga'] == 'prikaz') {
    echo json_encode(Usluga::vratiSvePodatkeIzBaze());
}

if (isset($_GET['usluga']) && $_GET['usluga'] == 'pretraga') {
    if (isset($_GET['tekst'])) {
        echo json_encode(Usluga::vratiPoNazivu($_GET['tekst']));
    }
}

if (isset($_GET['usluga']) && $_GET['usluga'] == 'sortAsc') {
    echo json_encode(Usluga::sortAsc());
}

if (isset($_GET['usluga']) && $_GET['usluga'] == 'sortDesc') {
    echo json_encode(Usluga::sortDesc());
}

if (isset($_GET['obrisi']) && $_GET['obrisi'] == 'usluga') {
    if (Usluga::obrisi($_GET['id'])){
        echo 'OK';
    }
    else{
        echo 'ERR';
    }
}

if (isset($_GET['obrisi']) && $_GET['obrisi'] == 'kozmeticki_salon') {
    if (KozmetickiSalon::obrisi($_GET['id'])){
        echo 'OK';
    }
    else{
        echo 'ERR';
    }
}


?>