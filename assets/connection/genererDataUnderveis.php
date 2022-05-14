<?php
session_start();
$id = $_SESSION['id'];
require "conn.php";
for ($i = 2; $i <= 4; $i++) {
    $randomTall = rand(0, 10);
    $randomTall2 = rand(0, 10);
    $sql = $conn->prepare("INSERT INTO person_i_quiz (person_id, quiz_id, antall_rette, antall_svart) VALUES (?,?,?,?)");
    $sql->bind_param("ssss", $id, $i, $randomTall, $randomTall2);
    if ($sql->execute() === TRUE) {
        for ($i = 1; $i <= 4; $i++) {
            if ($i != 3) {
                $randomTall = rand(0, 10);
                $sql = $conn->prepare("INSERT INTO person_i_modul (person_id, quiz_id, antall_sett) VALUES (?,?,?)");
                $sql->bind_param("sss", $id, $i, $randomTall);
                if ($sql->execute() === TRUE) {
                    header("location: ../../påbegynt.php");
                }
            }
        }
    }
}


?>