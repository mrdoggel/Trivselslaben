<?php
require "assets/connection/conn.php";
$id = $_SESSION['id'];
$sql = $conn->prepare("SELECT * FROM person_i_quiz pq, quiz q WHERE pq.quiz_id = q.quiz_id AND pq.person_id = $id AND pq.antall_svart >= q.antall_spørsmål");
$sql->execute();
$result = $sql->get_result();
$sql1 = $conn->prepare("SELECT * FROM person_i_modul pm, modul m WHERE pm.modul_id = m.modul_id AND pm.person_id = $id");
$sql1->execute();
$result1 = $sql1->get_result();
if ($result1->num_rows > 0 || $result->num_rows > 0) {
    if (!isset($tittel)) {
        $tittel = "<h2>Her finner du alt du har fullført </h2>";
        echo $tittel;
    }
}
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $prosent = $row['antall_rette'] / $row['antall_spørsmål'] * 100;
            $prosentdesimal = $prosent/100;
            $grader = 360 * $prosentdesimal / 2;
            $dato = date_create($row['fullført_dato']);
            $nyDato = date_format($dato, "d.m.Y");
            echo '<div class="fullført">';
            echo '<h4>QUIZ</h4>';
            echo '<div class="circle-wrap">';
            echo '<div class="circle">';
            echo '<div class="mask full" style="animation: fill';
            echo $row['quiz_id'];
            echo ' ease-in-out 2s; transform: rotate(';
            echo '180';
            echo 'deg);';
            echo '">';
            echo '<div class="fill" style="animation: fill';
            echo $row['quiz_id'];
            echo ' ease-in-out 2s; transform: rotate(';
            echo '180';
            echo 'deg);';
            echo '"></div></div>';
            echo '<div class="mask half">';
            echo '<div class="fill" style="animation: fill';
            echo $row['quiz_id'];
            echo ' ease-in-out 2s; transform: rotate(';
            echo '180';
            echo 'deg);';
            echo '"></div>';
            echo '</div><div class="inside-circle">100%</div>';
            echo '</div></div>';
            echo '<div class="poeng"><p>Opptjente poeng: <span>';
            echo $row['quizpoeng'];
            echo '</span></p><p>Fullført: <span>';
            echo $nyDato;
            echo '</span></p></div><div class="bottom"><h3>';
            echo $row['quiznavn'];
            echo '</h3>';
            echo '<style>';
            echo '@keyframes fill';
            echo $row['quiz_id'];
            echo '{0% {transform: rotate(0deg);}100% {transform: rotate(';
            echo '180';
            echo 'deg);}}';
            echo '</style></div></div>';
        }
     while($row1 = $result1->fetch_assoc()) {
        $prosent = 100;
        $prosentdesimal = $prosent/100;
        $grader = 360 * $prosentdesimal / 2;
        $dato = date_create($row1['fullført_dato']);
        $nyDato = date_format($dato, "d.m.Y");
        echo '<div class="fullført">';
        echo '<h4>MODUL</h4>';
        echo '<div class="circle-wrap">';
        echo '<div class="circle">';
        echo '<div class="mask full" style="animation: fill';
        echo $row1['modul_id'];
        echo ' ease-in-out 2s; transform: rotate(';
        echo '180';
        echo 'deg);';
        echo '">';
        echo '<div class="fill" style="animation: fill';
        echo $row1['modul_id'];
        echo ' ease-in-out 2s; transform: rotate(';
        echo '180';
        echo 'deg);';
        echo '"></div></div>';
        echo '<div class="mask half">';
        echo '<div class="fill" style="animation: fill';
        echo $row1['modul_id'];
        echo ' ease-in-out 2s; transform: rotate(';
        echo '180';
        echo 'deg);';
        echo '"></div>';
        echo '</div><div class="inside-circle">100%</div>';
        echo '</div></div>';
        echo '<div class="poeng"><p>Opptjente poeng: <span>';
        echo $row1['modul_poeng'];
        echo '</span></p><p>Fullført: <span>';
        echo $nyDato;
        echo '</span></p></div><div class="bottom"><h3>';
        echo $row1['navn'];
        echo '</h3>';
        echo '<style>';
        echo '@keyframes fill';
        echo $row1['modul_id'];
        echo '{0% {transform: rotate(0deg);}100% {transform: rotate(';
        echo '180';
        echo 'deg);}}';
        echo '</style></div></div>';
    }
} else {
    $tittel = '<h2>Det ser ikke ut som du har fullført noe. Trykk nedenfor for å begynne<br><br><br><a href="alleQuizer.php" class="utfclass">Test deg selv i quiz</a><br><br><a href="alleKurs.php" class="utfclass">Finn et kurs</a><br><br><a href="alleModuler.php" class="utfclass">Utforsk moduler</a></h2>';
    echo $tittel;
}
