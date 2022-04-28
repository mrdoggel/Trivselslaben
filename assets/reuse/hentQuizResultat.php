<?php
require "assets/connection/conn.php";
$id = $_SESSION['id'];
$quiz = $_GET['quiz'];
$sql = $conn->prepare("SELECT pq.antall_rette, q.quiz_id, q.quiznavn, q.antall_spørsmål, pq.fullført_dato, q.quizpoeng FROM person_i_quiz pq, quiz q WHERE pq.quiz_id = q.quiz_id AND pq.person_id = $id AND q.quiz_id = $quiz");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $navn = $row['quiznavn'];
        $poeng = $row['quizpoeng'];
        $prosent = $row['antall_rette'] / $row['antall_spørsmål'] * 100;
        $prosentdesimal = $prosent/100;
        $grader = 360 * $prosentdesimal / 2;
        $dato = date_create($row['fullført_dato']);
        $nyDato = date_format($dato, "d.m.Y");
        echo "<h1>$navn</h1><div>";
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
        echo 'deg); background: #B6F3AB;';
        echo '"></div></div>';
        echo '<div class="mask half">';
        echo '<div class="fill" style="animation: fill';
        echo $row['quiz_id'];
        echo ' ease-in-out 2s; transform: rotate(';
        echo $grader;
        echo 'deg); background: #B6F3AB;';
        echo '"></div>';
        echo '</div><div class="inside-circle" style=" color: #B6F3AB;">';
        echo $prosent;
        echo '%</div>';
        echo '</div></div>';
        echo '<style>';
        echo '@keyframes fill';
        echo $row['quiz_id'];
        echo '{0% {transform: rotate(0deg);}100% {transform: rotate(';
        echo $grader;
        echo 'deg);}}';
        echo '</style></div>';
        echo "<p><span>Du scoret $prosent% riktig og fikk $poeng poeng!</span></p>";
        echo '<p id="prøv-igjen"><a href="quiz.php?quiz=';
        echo $quiz;
        echo'"><span>Prøv på nytt</span></a></p>';
    }
}