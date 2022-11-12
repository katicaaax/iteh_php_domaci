<?php

$mysql_server = "localhost:3306";
$mysql_user = "root";
$mysql_password = "";
$mysql_db = "db_kozmeticki_salon";

$mysqli = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_db);
if ($mysqli->connect_errno) {
    printf("Konekcija neuspešna: %s\n", $mysqli->connect_error);
    exit();
}

$mysqli->set_charset("utf8");


?>