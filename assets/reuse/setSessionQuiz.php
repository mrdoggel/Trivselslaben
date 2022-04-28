<?php
require "assets/connection/conn.php";
$id = $_SESSION['id'];
$quiz = $_GET['quiz'];
$sql = $conn->prepare("SELECT antall_rette, antall_svart FROM person_i_quiz WHERE person_id = $id AND quiz_id = $quiz");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $_SESSION['antRett'] = $row['antall_rette'];
        $_SESSION['svar'] = $row['antall_svart'];
    }
} else {
    $_SESSION['antRett'] = 0;
    $_SESSION['svar'] = 0;
}
?>