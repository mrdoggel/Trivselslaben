<?php
$sql = $conn->prepare("SELECT * FROM person_i_quiz WHERE person_id = $id AND quiz_id = $quiz");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    if ($riktigAlt == $alt) {
        $sql = $conn->prepare("UPDATE person_i_quiz SET antall_rette = antall_rette + 1 WHERE person_id = ? AND quiz_id = ?");
        $sql->bind_param("ss", $id, $quiz);
        $sql->execute();
    } else {
        $sql = $conn->prepare("UPDATE person_i_quiz SET antall_rette = antall_rette - 1 WHERE person_id = ? AND quiz_id = ?");
        $sql->bind_param("ss", $id, $quiz);
        $sql->execute();
    }
} else {
    if ($riktigAlt == $alt) {
        $sql = $conn->prepare("INSERT INTO person_i_quiz (person_id, quiz_id, antall_rette) VALUES (?,?,?)");
        $sql->bind_param("sss", $id, $quiz, 1);
        $sql->execute();
    } else {
        //oppdater
    }
}
?>