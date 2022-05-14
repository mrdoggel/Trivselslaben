<?php
session_start();
$id = $_SESSION['id'];
require "conn.php";
$dato = date("Y-m-d");
$null = 0;
$tre = 3;
$fire = 4;
$seks = 6;
$ti = 10;
$elve = 11;
$sql = $conn->prepare("INSERT INTO person_i_quiz (person_id, quiz_id, antall_rette, fullført_dato, antall_svart) VALUES (?,?,?,?,?)");
$sql->bind_param("sssss", $id, $tre, $seks, $dato, $ti);
if ($sql->execute() === TRUE) {
    $sql = $conn->prepare("INSERT INTO person_i_quiz (person_id, quiz_id, antall_rette, fullført_dato, antall_svart) VALUES (?,?,?,?,?)");
    $sql->bind_param("sssss", $id, $fire, $ti, $dato, $ti);
    if ($sql->execute() === TRUE) {
        $sql = $conn->prepare("INSERT INTO person_i_modul (person_id, modul_id, fullført_dato, antall_sett) VALUES (?,?,?,?)");
        $sql->bind_param("ssss", $id, $fire, $dato, $elve);
        if ($sql->execute() === TRUE) {
            header("location: ../../fullført.php");
        }
    }
}

?>