<?php
session_start();
$id = $_SESSION['id'];
require "conn.php";
$dato = date("Y-m-d");
for ($i = 2; $i <= 4; $i++) {
    $sql = $conn->prepare("INSERT INTO person_i_quiz (person_id, quiz_id, antall_rette, fullført_dato, antall_svart) VALUES (?,?,?,?,?)");
    $sql->bind_param("sssss", $id, $i, 10, $dato, 10);
    if ($sql->execute() === TRUE) {
        for ($i = 1; $i <= 4; $i++) {
            if ($i != 3) {
                $randomTall = rand(0, 10);
                $sql = $conn->prepare("INSERT INTO person_i_modul (person_id, quiz_id, fullført_dato, antall_sett) VALUES (?,?,?.?)");
                $sql->bind_param("ssss", $id, $i, $dato, 11);
                if ($sql->execute() === TRUE) {
                    header("location: ../../fullført.php");
                }
            }
        }
    }
}

?>