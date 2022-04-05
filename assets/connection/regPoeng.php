<?php
session_start();
require "conn.php";

$id = $_SESSION['id'];
$quiz = $_GET['quiz'];
$antRett = $_GET['ant'];
$dato = date("Y-m-d");

$sql = $conn->prepare("SELECT antall_spørsmål, quizpoeng FROM quiz WHERE quiz_id = $quiz");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $antallSpørsmål = $row['antall_spørsmål'];
    $prosentKlart = $antRett / $antallSpørsmål * 100;
    $poeng = $row['quizpoeng'];
}
$sql = $conn->prepare("SELECT * FROM person_i_quiz WHERE person_id = $id AND quiz_id = $quiz");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    $sql = $conn->prepare("UPDATE person_i_quiz SET antall_rette = ? WHERE person_id = ? AND quiz_id = ? AND fullført_dato = ?");
    $sql->bind_param("ssss", $antRett, $id, $quiz, $dato);
    if($sql->execute()) {
        if ($prosentKlart < 100) {
            header("location: ../../påbegynt.php");
        } else {
            $sql = $conn->prepare("UPDATE person SET poeng = poeng + ? WHERE person_id = $id");
            $sql->bind_param("s", $poeng);
            if($sql->execute()) {
                $_SESSION['poeng'] = $_SESSION['poeng'] + $poeng;
                header("location: ../../fullført.php");
            }
        }
    }
} else {
    $sql = $conn->prepare("INSERT INTO person_i_quiz (person_id, quiz_id, antall_rette, fullført_dato) VALUES (?,?,?,?)");
    $sql->bind_param("ssss", $id, $quiz, $antRett, $dato);
    if($sql->execute()) {
        if ($prosentKlart < 100) {
            header("location: ../../påbegynt.php");
        } else {
            $sql = $conn->prepare("UPDATE person SET poeng = poeng + ? WHERE person_id = $id");
            $sql->bind_param("s", $poeng);
            if($sql->execute()) {
                $_SESSION['poeng'] = $_SESSION['poeng'] + $poeng;
                header("location: ../../fullført.php");
            }
        }
    }
}

?>