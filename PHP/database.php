<?php
    $hostName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "kviz";

    $konekcija = mysqli_connect($hostName, $userName, $password, $dbName);

    if (!$konekcija) {
        die("Doslo je do greske prilikom konekcije;");
    }
?>