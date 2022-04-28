<?php
    session_start();
    require "conn.php";
    $kurs = $_POST['kurs'];
    $id = $_SESSION['id'];
    if (isset($_POST['kurs_knapp'])) {
        $sql = $conn->prepare("SELECT * FROM person_lagret_kurs WHERE kurs_id = $kurs AND person_id = $id");
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows > 0) {
            header("Location: ../../alleKurs.php");
        } else {
            $sql = $conn->prepare("INSERT INTO person_lagret_kurs (person_id, kurs_id) VALUES (?, ?)");
            $sql->bind_param("ss", $id, $kurs);
            if ($sql->execute() === TRUE) {
                header("Location: ../../alleKurs.php");
            }
        }
    }
?>