<?php
require "assets/connection/conn.php";
$sql = $conn->prepare("SELECT * FROM quiz WHERE quiz_id != 5");
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
        echo '<p><a href="quiz.php?quiz=';
        echo $row['quiz_id'];
        echo '">Ta quizen</a></p>';
        echo '<form action="assets/connection/lagreQuiz.php" method="post">
             <input type="hidden" name="quiz" value="';
        echo $row['quiz_id'];
        echo '"</input>
             <button name="quiz_knapp" type="submit">Lagre til senere</button>
             </form>';
        echo '</div>';
        echo '</div>';

    }
}
?>