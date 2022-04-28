<?php
require "assets/connection/conn.php";
$id = $_SESSION["id"];
$sql = $conn->prepare("SELECT * FROM quiz q, person_lagret_quiz pl WHERE q.quiz_id = pl.quiz_id AND pl.person_id = $id");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        echo '<div class="quiz-div" id="quiz-';
        echo $row['quiz_id'];
        echo '">';
        echo '<a href="quiz.php?quiz=';
        echo $row['quiz_id'];
        echo '">';
        echo '<img src="';
        echo $row['bilde'];
        echo '" alt="quiz-img"></a>';
        echo '<h2> <a href="quiz.php?quiz=';
        echo $row['quiz_id'];
        echo '">';
        echo $row['quiznavn'];
        echo '</a></h2>';
        echo '<p class="mer">&vellip;</p>';
        echo '<div class="overlap hidden">';
        echo '<p>Spill</p>';
        echo '<form action="">
             <button>Lagre til senere</button>
             </form>';
        echo '</div>';
        echo '</div>';

    }
}
?>