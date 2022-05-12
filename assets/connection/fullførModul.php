<?php
session_start();
require "conn.php";
$id = $_SESSION['id'];
$modul = $_POST['modulId'];
$dato = date("Y-m-d");

//Finn ut hvor mye poeng modulen gir
$sql = $conn->prepare("SELECT modul_poeng FROM modul WHERE modul_id = $modul");
$sql->execute();
$result = $sql->get_result();
//Hvis det er noen svar
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $poeng = $row['modul_poeng'];
}

//Finn om brukeren allerede har fullført modulen
$sql = $conn->prepare("SELECT * FROM person_i_modul WHERE person_id = $id AND modul_id = $modul");
$sql->execute();
$result = $sql->get_result();
//Hvis det er noen svar
if ($result->num_rows > 0) {
    header("Location: ../../alleModuler.php");
} else {
    $sql = $conn->prepare("INSERT INTO person_i_modul (person_id, modul_id, fullført_dato, antall_sett) VALUES (?,?,?,?)");
    $sql->bind_param("ssss", $id, $modul, $dato, 11);
    if ($sql->execute() === TRUE) {
        $sql = $conn->prepare("UPDATE person SET poeng = poeng + ? WHERE person_id = ?");
        $sql->bind_param("ss", $poeng, $id);
        if($sql->execute()) {
            $_SESSION['poeng'] = $_SESSION['poeng'] + $poeng;
            header("Location: ../../modul-fullført.php?modul=$modul");
        }
    }
}

?>