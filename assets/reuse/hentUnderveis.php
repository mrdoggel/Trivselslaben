<?php
require "assets/connection/conn.php";
$id = $_SESSION['id'];
$sql = $conn->prepare("SELECT pq.antall_rette, q.quiz_id, q.quiznavn, q.antall_spørsmål FROM person_i_quiz pq, quiz q WHERE pq.quiz_id = q.quiz_id AND pq.person_id = $id AND pq.antall_svart < q.antall_spørsmål");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    echo '<h2>Her finner du det du ikke rakk å fullføre</h2>';
    while($row = $result->fetch_assoc()) {

        $prosent = $row['antall_svart'] / $row['antall_spørsmål'] * 100;
        $prosentdesimal = $prosent/100;
        $grader = 360 * $prosentdesimal/2;
        echo '<div class="underveis-container">';
        echo '<div class="underveis">';
        echo '<h4>QUIZ</h4>';
        echo '<div class="circle-wrap">';
        echo '<div class="circle">';
        echo '<div class="mask full" style="animation: fill';
        echo $row['quiz_id'];
        echo ' ease-in-out 2s; transform: rotate(';
        echo $grader;
        echo 'deg);';
        echo '">';
        echo '<div class="fill" style=" animation: fill';
        echo $row['quiz_id'];
        echo ' ease-in-out 2s; transform: rotate(';
        echo $grader;
        echo 'deg);';
        echo '"></div></div>';
        echo '<div class="mask half">';
        echo '<div class="fill" style=" animation: fill';
        echo $row['quiz_id'];
        echo ' ease-in-out 2s; transform: rotate(';
        echo $grader;
        echo 'deg);';
        echo '"></div>';
        echo '</div><div class="inside-circle">';
        echo $prosent;
        echo '%</div>';
        echo '</div></div><div class="bottom"><h3>';
        echo $row['quiznavn'];
        echo '</h3></div></div><p><a href="quiz.php?quiz=';
        echo $row['quiz_id'];
        echo '">Fortsett der du slapp</a></p></div>';
        echo '<style>';
        echo '@keyframes fill';
        echo $row['quiz_id'];
        echo '{0% {transform: rotate(0deg);}100% {transform: rotate(';
        echo $grader;
        echo 'deg);}}';
        echo '</style>';

    }
} else {
    echo '<h2>Det ser ikke ut som du har fullført noe. Trykk nedenfor for å begynne<br><br><br><a href="alleQuizer.php" class="utfclass">Test deg selv i quiz</a><br><br><a href="alleKurs.php" class="utfclass">Finn et kurs</a><br><br><a href="alleModuler.php" class="utfclass">Utforsk moduler</a></h2>';
}