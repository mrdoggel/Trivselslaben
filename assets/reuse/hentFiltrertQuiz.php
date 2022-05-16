<?php
require "assets/connection/conn.php";
if (isset($otId1)) {
    $sql = $conn->prepare("SELECT q.* FROM quiz q, quiz_i_ot tio WHERE q.quiz_id = tio.quiz_id AND tio.ot_id = $otId1");
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
}
if (isset($otId2)) {
    $sql = $conn->prepare("SELECT q.* FROM quiz q, quiz_i_ot tio WHERE q.quiz_id = tio.quiz_id AND tio.ot_id = $otId2");
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
}
if (isset($otId3)) {
    $sql = $conn->prepare("SELECT q.* FROM quiz q, quiz_i_ot tio WHERE q.quiz_id = tio.quiz_id AND tio.ot_id = $otId3");
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
}
if (isset($otId4)) {
    $sql = $conn->prepare("SELECT q.* FROM quiz q, quiz_i_ot tio WHERE q.quiz_id = tio.quiz_id AND tio.ot_id = $otId4");
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
} if (!isset($otId1) && !isset($otId2) && !isset($otId3) && !isset($otId4)){
    $sql = $conn->prepare("SELECT q.* FROM quiz q");
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
}
?>