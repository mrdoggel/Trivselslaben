<?php
require "assets/connection/conn.php";
$id = $_SESSION['id'];
$sql = $conn->prepare("SELECT t.tema_id FROM tema t, person_i_tema pt, person p WHERE t.tema_id = pt.tema_id AND p.person_id = pt.person_id AND pt.person_id = $id");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $currKurs = 0;
        $temaId = $row['tema_id'];
        $sql1 = $conn->prepare("SELECT k.* FROM kurs k, kurs_i_tema kt WHERE k.kurs_id = kt.kurs_id AND kt.tema_id = $temaId");
        $sql1->execute();
        $result1 = $sql1->get_result();
        if ($result1->num_rows > 0) {
            while ($row1 = $result1->fetch_assoc()) {
                echo '<div>';
                echo '<a href="kurs.php?kurs=';
                echo $row1["kurs_id"];
                echo '"<div id="kurs';
                echo $row1["kurs_id"];
                echo '" class="kurs">';
                echo '<h4>KURS</h4>';
                echo '<img src="';
                echo $row1["bilde"];
                echo '" alt="bilde"><h4 style="text-align: right; padding-right: 7px;">';
                echo $row1['varighet'];
                echo ' minutter</h4><div class="bottom"';
                echo 'style="background-color:';
                echo $row1["farge"];
                echo '"><h3>';
                echo $row1["navn"];
                echo '</h3></div></div></a>';
            }
        }

        $sql2 = $conn->prepare("SELECT distinct m.* FROM modul m, modul_i_tema mt, tema t WHERE m.modul_id = mt.modul_id AND mt.tema_id = $temaId");
        $sql2->execute();
        $result2 = $sql2->get_result();
        if ($result2->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) {
                echo'<div id="modul';
                echo $row2["modul_id"];
                echo '" class="modul">';
                echo '<a href="modul.php?modul=';
                echo $row2["modul_id"];
                echo '">';
                echo '<h4>MODUL</h4>';
                echo '<div class="modul-tittel">';
                echo '<h3>';
                echo $row2["navn"];
                echo '</h3></div>';
                echo '<div class="bottom"';
                echo '"><p>';
                echo $row2["beskrivelse"];
                echo '</p></div></a></div>';
            }
        }
        $sql3 = $conn->prepare("SELECT distinct q.* FROM quiz q, quiz_i_tema qt, tema t WHERE q.quiz_id = qt.quiz_id AND qt.tema_id = $temaId AND q.quiz_id != 5");
        $sql3->execute();
        $result3 = $sql3->get_result();
        if ($result3->num_rows > 0) {
            while($row3 = $result3->fetch_assoc()) {
                //Lagt til quiz-div her så blir den lik.. 
                echo '<div class="quiz-enkel" id="quiz-';
                    echo $row3['quiz_id'];
                    echo '">';
                    echo '<a href="quiz.php?quiz=';
                        echo $row3['quiz_id'];
                        echo '">';
                        echo '<img src="';
                        echo $row3['bilde'];
                        echo '" alt="quiz-img">
                    </a>';
                    echo '<h5>';
                    echo $row3['quiznavn'];
                    echo '</h5><h4>QUIZ</H4>';
                    echo '<p id="mer" class="mer">&vellip;</p>';
                    echo '<div id="overlap" class="overlap hidden">';
                        echo '<p>';
                        echo '<a href="quiz.php?quiz=';
                        echo $row3['quiz_id'];
                        echo '">Ta quizen</a></p>';
                        echo '<form action="assets/connection/lagreQuiz.php" method="post">
                            <input type="hidden" name="quiz" value="';
                            echo $row3['quiz_id'];
                            echo '"</input>
                            <button name="quiz_knapp" type="submit">Lagre til senere</button>
                        </form>';
                    echo '</div>
                </div>';
            }
        }

    }
}

?>