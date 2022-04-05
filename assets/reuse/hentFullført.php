<?php
require "assets/connection/conn.php";
$id = $_SESSION['id'];
$sql = $conn->prepare("SELECT * FROM person_i_quiz pq, quiz q WHERE pq.quiz_id = q.quiz_id AND pq.person_id = $id AND pq.antall_rette = q.antall_spørsmål");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    echo '<h2>Her finner du alt du har fullført </h2>';
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
        echo $grader;
        echo 'deg);';
        echo '">';
        echo '<div class="fill" style="animation: fill';
        echo $row['quiz_id'];
        echo ' ease-in-out 2s; transform: rotate(';
        echo $grader;
        echo 'deg);';
        echo '"></div></div>';
        echo '<div class="mask half">';
        echo '<div class="fill" style="animation: fill';
        echo $row['quiz_id'];
        echo ' ease-in-out 2s; transform: rotate(';
        echo $grader;
        echo 'deg);';
        echo '"></div>';
        echo '</div><div class="inside-circle">';
        echo $prosent;
        echo '%</div>';
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
        echo $grader;
        echo 'deg);}}';
        echo '</style>';

    }
} else {
    echo '<h2>Ser ikke ut som du har fullført noe, trykk nedenfor for å begynne<br><br><a style="color:blue;" href="alleQuizer.php">Quizer</a><br><a style="color:blue;" href="alleKurs.php">Kurs</a><br><a style="color:blue;" href="alleModuler.php">Moduler</a></h2>';
}
