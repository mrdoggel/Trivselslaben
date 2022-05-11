<?php
    require "assets/connection/conn.php";
    $sql6 = $conn->prepare("SELECT MAX(spørsmål_id) FROM person_valgt_alternativ WHERE person_id = $id AND quiz_id = $quizid");
        $sql6->execute();
        $result6 = $sql6->get_result();
        if ($result6->num_rows > 0) {
            $row6 = $result6->fetch_assoc();
            $spm = $row6['MAX(spørsmål_id)'] + 1;
            if ($spm > 10) {
                $spm = 10;
            }
            if ($spm == NULL) {
                $spm = 1;
            }
        }
?>