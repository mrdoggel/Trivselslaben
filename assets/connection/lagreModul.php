<?php
    session_start();
    require "conn.php";
    $modul = $_POST['modul'];
    $id = $_SESSION['id'];
    if (isset($_POST['modul_knapp'])) {
        $sql = $conn->prepare("SELECT * FROM person_lagret_modul WHERE modul_id = $modul AND person_id = $id");
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows > 0) {
            header("Location: ../../alleModuler.php");
        } else {
            $sql = $conn->prepare("INSERT INTO person_lagret_modul (person_id, modul_id) VALUES (?, ?)");
            $sql->bind_param("ss", $id, $modul);
            if ($sql->execute() === TRUE) {
                header("Location: ../../alleModuler.php");
            }
        }
    }
?>