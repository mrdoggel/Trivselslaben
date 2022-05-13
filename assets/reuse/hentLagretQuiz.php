<?php
require "assets/connection/conn.php";
$id = $_SESSION["id"];
$sql = $conn->prepare("SELECT * FROM quiz q, person_lagret_quiz pl WHERE q.quiz_id = pl.quiz_id AND pl.person_id = $id");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $resultat++;
        echo '<div class="quiz-div" id="quiz-';
            echo $row['quiz_id'];
            echo '">';
            echo '<a href="quiz.php?quiz=';
                echo $row['quiz_id'];
                echo '">';
                echo '<img src="';
                echo $row['bilde'];
                echo '" alt="quiz-img">
            </a>';
            echo '<h5>';
            echo $row['quiznavn'];
            echo '</h5><h4>QUIZ</H4>';
            echo '<p id="mer" class="mer">&vellip;</p>';
            echo '<div id="overlap" class="overlap hidden">';
                echo '<p>Ta quizen</p>';
                echo '<form action="assets/connection/lagreQuiz.php" method="post">
                    <input type="hidden" name="quiz" value="';
                    echo $row['quiz_id'];
                    echo '"</input>
                    <button name="quiz_knapp" type="submit">Lagre til senere</button>
                </form>';
            echo '</div>
        </div>';
    }
}
?>