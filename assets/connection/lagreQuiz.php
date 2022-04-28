<?php
    session_start();
    require "conn.php";
    $quiz = $_POST['quiz'];
    $id = $_SESSION['id'];
    if (isset($_POST['quiz_knapp'])) {
        $sql = $conn->prepare("SELECT * FROM person_lagret_quiz WHERE quiz_id = $quiz AND person_id = $id");
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows > 0) {
            header("Location: ../../alleQuizer.php");
        } else {
            $sql = $conn->prepare("INSERT INTO person_lagret_quiz (person_id, quiz_id) VALUES (?, ?)");
            $sql->bind_param("ss", $id, $quiz);
            if ($sql->execute() === TRUE) {
                header("Location: ../../alleQuizer.php");
            }
        }
    }
?>