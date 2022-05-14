<?php
require "assets/connection/conn.php";
$id = $_SESSION['id'];
$quiz = $_GET['quiz'];
$sql = $conn->prepare("SELECT pq.antall_rette, pq.antall_svart, q.quiz_id, q.quiznavn, q.antall_spørsmål, pq.fullført_dato, q.quizpoeng FROM person_i_quiz pq, quiz q WHERE pq.quiz_id = q.quiz_id AND pq.person_id = $id AND q.quiz_id = $quiz");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $qid = $row['quiz_id'];
        $navn = $row['quiznavn'];
        $poeng = $row['quizpoeng'];
        $dato = $row['fullført_dato'];
        $antSvart = $row['antall_svart'];
        $antRett = $row['antall_rette'];
        $antSpm = $row['antall_spørsmål'];
        $prosent = $antRett / $antSpm * 100;
    }
    if ($prosent == 100) {
        $farge = "#B6F3AB";
        $nivå = 3;
    }
    if ($prosent < 100 && $prosent >= 50) {
        $farge = "#FFB347";
        $nivå = 2;
    }
    if ($prosent < 50 && $prosent > 0) {
        $farge = "#FF6961";
        $nivå = 1;
    }
    if ($prosent == 0) {
        $farge = "#808080";
        $nivå = 0;
    }
    if ($antSvart < $antSpm) {
        $nivå = 4;
        $farge = "white;";
    }
    if (isset($_GET['poeng']) && $_GET['poeng'] == 1) {
        $nivå = 5;
    }
    $prosentdesimal = $prosent/100;
    $grader = 360 * $prosentdesimal / 2;
    $dato = date_create($dato);
    $nyDato = date_format($dato, "d.m.Y");
    echo "<h2 class='hide'>Du har nå fullført quizen!</h2>";
    echo "<h1>$navn</h1><div>";
    echo '<div class="circle-wrap" style="padding: 1.5rem;">';
    echo '<div class="circle">';
    echo '<div class="mask full" style="animation: fill';
    echo ' ease-in-out 2s; transform: rotate(';
    echo $grader;
    echo 'deg);';
    echo '">';
    echo '<div class="fill" style="animation: fill';
    echo ' ease-in-out 2s; transform: rotate(';
    echo $grader;
    echo 'deg);';
    echo '"></div></div>';
    echo '<div class="mask half">';
    echo '<div class="fill" style="';
    echo 'animation: fill';
    echo ' ease-in-out 2s; transform: rotate(';
    echo $grader;
    echo 'deg);';
    echo '"></div>';
    echo '</div><div class="inside-circle" style=" color: ';
    echo $farge;
    echo ';">';
    echo $prosent;
    echo '% riktig</div>';
    echo '</div></div>';
    echo '<style>';
    echo '@keyframes fill';
    echo '{0% {transform: rotate(0deg);}100% {transform: rotate(';
    echo $grader;
    echo 'deg);}}';
    echo ' .mask .fill { background-color: ';
    echo $farge;
    echo ';}
    .circle-wrap {
      margin: auto;
      width: 7.9vw;
      height: 7.9vw;
      background: #fefcff;
      border-radius: 50%;
    }

    .circle-wrap .circle .mask,
    .circle-wrap .circle .fill {
      width: 7.9vw;
      height: 7.9vw;
      position: absolute;
      border-radius: 50%;
    }

    .mask .fill {
      clip: rect(0px, 3.95vw, 7.9vw, 0px);
    }

    .circle-wrap .circle .mask {
      clip: rect(0px, 7.9vw, 7.9vw, 3.95vw);
    }

    .circle-wrap .inside-circle {
      width: 6.39vw;
      height: 6.39vw;
      border-radius: 50%;
      font-family: "Leelawadee UI";
      line-height: 6.32vw;
      text-align: center;
      margin-top: 0.734vw;
      margin-left: 0.734vw;
      position: absolute;
      z-index: 100;
      background: #ffffff;
      font-weight: lighter;
      font-size: 1.25vw;
    }';
    echo '</style></div>';
    switch ($nivå) {
        case 0:
            echo "<p><span>Huff da, $antRett riktige svar... du trenger 5 eller fler for å få poeng!</span></p>";
            echo '<p id="prøv-igjen"><a href="quiz.php?quiz=';
            echo $quiz;
            echo'"><span>Prøv på nytt</span></a></p><style>.hide {display: none;}</style>';
            break;
        case 1:
            echo "<p><span>Du fikk $antRett/$antSpm riktige svar, men du trenger 5 eller fler for å få poeng!</span></p>";
            echo '<p id="prøv-igjen"><a href="quiz.php?quiz=';
            echo $quiz;
            echo'"><span>Prøv på nytt</span></a></p><style>.hide {display: none;}</style>';
            break;
        case 2:
            echo "<p><span>Du er godt på vei! Du fikk $antRett/$antSpm riktige svar, og får $poeng poeng!<br><br>(Trykk under navnet ditt øverst på siden for å finne ut hva du kan gjøre med dem)</span></p>";
            echo '<p id="prøv-igjen"><a href="quiz.php?quiz=';
            echo $quiz;
            echo'"><span>Se igjennom svar</span></a></p>';
            break;
        case 3:
            echo "<p><span>Supert! Du fikk $antRett/$antSpm riktige svar, og får $poeng velfortjente poeng!<br><br>(Trykk under navnet ditt øverst på siden for å finne ut hva du kan gjøre med dem)</span></p>";
            echo '<p id="Se igjennom svar"><a href="fullført.php"><span>Oversikt over fullførte moduler / quizer</span></a></p>';
            break;
        case 4:
            echo "<p><span>Ser ikke ut som du har fullførte quizen, men du finner dem alltid på forside->påbegynt, eller trykk <a href='påbegynt.php'>HER</a></span></p>";
            echo '<p id="prøv-igjen"><a href="quiz.php?quiz=';
            echo $quiz;
            echo'"><span>Fortsett på quizen(';
            echo $antSvart+1;
            echo '/';
            echo $antSpm;
            echo ')</span></a></p>';
            echo '<p id="prøv-igjen"><a href="forside.php"><span>Til hovedsiden</span></a></p><style> .hide {display: none;} .circle-wrap {display: none;}</style>';
            break;
        case 5:
            echo "<p><span>Ser ut som du allerede har fullført denne quizen</span></p>";
            echo '<p id="prøv-igjen"><a href="forside.php"><span>Til hovedsiden</span></a></p><style> .hide {display: none;} .circle-wrap {display: none;}</style>';
            break;
    }

} else {
    echo "<p><span>Ser ikke ut som vi klarer å finne deg, eller at noe gikk galt...</span></p>";
    echo '<p id="prøv-igjen"><a href="quiz.php?quiz=';
    echo $quiz;
    echo'"><span>Til quiz</span></a></p>';
    echo '<p id="prøv-igjen"><a href="forside.php"><span>Til hovedsiden</span></a></p><style> .hide {display: none;} .circle-wrap {display: none;}</style>';
}