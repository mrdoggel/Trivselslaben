<?php
require "assets/connection/conn.php";
$søkeparameter = $_POST['søkeparameter'];
$resultat = false;
$sql = $conn->prepare("SELECT k.* FROM kurs k, kurs_i_ot kt, ot ot WHERE k.navn LIKE '%$søkeparameter%' OR k.kurs_id = kt.kurs_id AND kt.ot_id = ot.ot_id AND ot.navn = '$søkeparameter' GROUP BY k.navn");
$sql->execute();
$result = $sql->get_result();
$sql1 = $conn->prepare("SELECT m.* FROM modul m, modul_i_ot mt, ot ot WHERE m.navn LIKE '%$søkeparameter%' OR m.beskrivelse LIKE '%$søkeparameter%' OR m.modul_id = mt.modul_id AND mt.ot_id = ot.ot_id AND ot.navn = '$søkeparameter' GROUP BY m.navn");
$sql1->execute();
$result1 = $sql1->get_result();
$sql2 = $conn->prepare("SELECT q.* FROM quiz q, quiz_i_ot qt, ot ot WHERE q.quiznavn LIKE '%$søkeparameter%' OR q.quiz_id = qt.quiz_id AND qt.ot_id = ot.ot_id AND ot.navn = '$søkeparameter' GROUP BY q.quiznavn");
$sql2->execute();
$result2 = $sql2->get_result();
if ($result2->num_rows > 0 || $result1->num_rows > 0 || $result->num_rows > 0) {
    if ($resultat == false ) {
        $resultat = true;
        echo '<h2 style="">Resultat som kan stemme overens med "';
        echo $søkeparameter;
        echo '"</h2>';
        echo '<div class="scrollmenu">';
    }

    while($row = $result->fetch_assoc()) {
        echo '<div id="kurs';
        echo $row["kurs_id"];
        echo '" class="kurs">';
        echo '<a href="kurs.php?kurs=';
        echo $row["kurs_id"];
        echo '">';
        echo '<div class="topp">';
        echo '<h4>KURS</h4>';
        echo '<img src="';
        echo $row["bilde"];
        echo '" alt="lightbulb"><h7>';
        echo $row['varighet'];
        echo ' minutter</h7>';
        echo '</div>';
        echo '<div class="bottom"';
        echo 'style="background-color:';
        echo $row["farge"];
        echo '"><h3>';
        echo $row["navn"];
        echo '</h3></div></a></div>';
    }
    while($row = $result1->fetch_assoc()) {
        echo '<div id="modul';
            echo $row["modul_id"];
            echo '" class="modul">';
            echo '<a href="modul.php?modul=';
                echo $row['modul_id'];
                echo '">';
                echo '<h4>MODUL</h4>';
                echo '<div class="modul-tittel">';
                    echo '<h3>';
                    echo $row["navn"];
                    echo '</h3>
                </div>';
                echo '<div class="bottom"';
                    echo '"><p>';
                    echo $row["beskrivelse"];
                    echo '</p>
                </div>
            </a>
        </div>';
    }
    while($row2 = $result2->fetch_assoc()) {
        echo '<div class="quiz-div" id="quiz-';
            echo $row2['quiz_id'];
            echo '">';
            echo '<a href="quiz.php?quiz=';
                echo $row2['quiz_id'];
                echo '">';
                echo '<img src="';
                echo $row2['bilde'];
                echo '" alt="quiz-img">
            </a>';
            echo '<h5>';
            echo $row2['quiznavn'];
            echo '</h5><h4>QUIZ</H4>';
            echo '<p id="mer" class="mer">&vellip;</p>';
            echo '<div id="overlap" class="overlap hidden">';
                echo '<p>';
                echo '<a href="quiz.php?quiz=';
                echo $row2['quiz_id'];
                echo '">Ta quizen</a></p>';
                echo '<form action="assets/connection/lagreQuiz.php" method="post">
                    <input type="hidden" name="quiz" value="';
                    echo $row2['quiz_id'];
                    echo '"</input>
                    <button name="quiz_knapp" type="submit">Lagre til senere</button>
                </form>';
            echo '</div>
        </div>';
    }
} else {
    if ($resultat == false) {
        echo '<h1 style="padding-bottom: 2rem; padding-left: 1rem;">Fant ingenting som som stemmer med "';
        echo $søkeparameter;
        echo '"</h1>';
    }
}

?>