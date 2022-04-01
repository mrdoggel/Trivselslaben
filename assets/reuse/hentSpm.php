<?php

    require "assets/connection/conn.php";
    $sql = $conn->prepare("SELECT * FROM spørsmål_i_quiz sq, quiz q WHERE sq.quiz_id = q.quiz_id AND sq.quiz_id = $quizid AND sq.spørsmål_id = $spm");
    $sql->execute();
    $result = $sql->get_result();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $spmid = $row['spørsmål_id'];
            echo '<div id="container">';
            echo '<legend><span>';
            echo $row['quiznavn'];
            echo '</span></legend>';
            echo '<div class="spm-div" id="spm-';
            echo $spmid;
            echo '">';
            echo '<label for="spm-arbeidsgiver">';
            echo $row['navn'];
            echo '</label>';
            $sql2 = $conn->prepare("SELECT * FROM alternativ_i_spørsmål WHERE spørsmål_id = $spmid");
            $sql2->execute();
            $result2 = $sql2->get_result();
            if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                    echo '<div class="svr ';
                    $sql3 = $conn->prepare("SELECT * FROM person_valgt_alternativ WHERE person_id = $id AND spørsmål_id = $spmid AND quiz_id = $quizid");
                    $sql3->execute();
                    $result3 = $sql3->get_result();
                    if ($result3->num_rows > 0) {
                        while($row3 = $result3->fetch_assoc()) {
                            if ($row3['alternativ_id'] == $row2['alternativ_id']) {
                                echo 'valgt-svar ';
                                $tekst = $row2['tekst'];
                            }
                        }
                    } else {
                        $tekst = "";
                    }
                    echo 'svr-';
                    echo $row2['alternativ_id'];
                    echo '">';
                    echo $row2['tekst'];
                    echo '</div>';
                }
            }
            echo '<form action="assets/connection/registrerValg.php" method="post">
            <input type="hidden" name="spørsmål" value="';
            echo $spmid;
            echo '">';
            echo '<input type="hidden" name="quiz" value="';
            echo $quizid;
            echo '">';
            echo '<input type="hidden" name="ant" value="';
            echo $antRett;
            echo '">';
            echo '<input type="hidden" value="';
            echo $tekst;
            echo '" name="alternativ">';

            if ($spm > 1) {
                echo '<button name="spm-btn-tilbake" type="submit">Tilbake</button>';
            }
            if ($spmid < 10) {
                echo '<button name="spm-btn-neste" type="submit">Neste</button>';
            } else {
                echo '<button name="spm-btn-fullfør" type="submit">Fullfør</button>';
            }
            echo '</form></div>';
        }
    }
    ?>

