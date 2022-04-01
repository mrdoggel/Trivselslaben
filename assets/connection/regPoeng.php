<?php
session_start();
require "conn.php";

$id = $_SESSION['id'];
$quiz = $_GET['quiz'];
$antRett = $_GET['ant'];

$sql = $conn->prepare("SELECT antall_spørsmål FROM quiz WHERE quiz_id = $quiz");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $antallSpørsmål = $row['antall_spørsmål'];
    $prosentKlart = $antRett / $antallSpørsmål * 100;
}
$sql = $conn->prepare("SELECT * FROM person_i_quiz WHERE person_id = $id AND quiz_id = $quiz");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    $sql = $conn->prepare("UPDATE person_i_quiz SET antall_rette = ? WHERE person_id = ? AND quiz_id = ?");
    $sql->bind_param("sss", $antRett, $id, $quiz);
    if($sql->execute()) {
        if ($prosentKlart < 100) {
            header("location: ../../påbegynt.php");
        } else {
            header("location: ../../fullført.php");
        }
    }
} else {
    $sql = $conn->prepare("INSERT INTO person_i_quiz (person_id, quiz_id, antall_rette) VALUES (?,?,?)");
    $sql->bind_param("sss", $id, $quiz, $antRett);
    if($sql->execute()) {
        if ($prosentKlart < 100) {
            header("location: ../../påbegynt.php");
        } else {
            header("location: ../../fullført.php");
        }
    }
}

?>