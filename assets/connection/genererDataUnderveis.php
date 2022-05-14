<?php
session_start();
$id = $_SESSION['id'];
require "conn.php";
$en = 1;
$to = 2;
$tre = 3;
$fire = 4;
$fem = 5;
$sju = 7;
$sql = $conn->prepare("INSERT INTO person_i_quiz (person_id, quiz_id, antall_rette, antall_svart) VALUES (?,?,?,?)");
$sql->bind_param("ssss", $id, $fem, $tre, $fire);
if ($sql->execute() === TRUE) {
    $sql = $conn->prepare("INSERT INTO person_i_quiz (person_id, quiz_id, antall_rette, antall_svart) VALUES (?,?,?,?)");
    $sql->bind_param("ssss", $id, $to, $tre, $sju);
    if ($sql->execute() === TRUE) {
        $sql = $conn->prepare("INSERT INTO person_i_modul (person_id, modul_id, antall_sett) VALUES (?,?,?)");
        $sql->bind_param("sss", $id, $en, $tre);
        if ($sql->execute() === TRUE) {
            $sql = $conn->prepare("INSERT INTO person_i_modul (person_id, modul_id, antall_sett) VALUES (?,?,?)");
            $sql->bind_param("sss", $id, $to, $sju);
            if ($sql->execute() === TRUE) {
                header("location: ../../påbegynt.php");
            }
        }
    }
}


?>