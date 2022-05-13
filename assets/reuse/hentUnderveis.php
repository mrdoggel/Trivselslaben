<?php
require "assets/connection/conn.php";
$id = $_SESSION['id'];
$sql = $conn->prepare("SELECT pq.antall_svart, pq.antall_rette, q.quiz_id, q.quiznavn, q.antall_spørsmål FROM person_i_quiz pq, quiz q WHERE pq.quiz_id = q.quiz_id AND pq.person_id = $id AND pq.antall_svart < q.antall_spørsmål");
$sql->execute();
$result = $sql->get_result();
$sql1 = $conn->prepare("SELECT pm.antall_sett, pm.modul_id, m.antall_sider, m.navn, pm.fullført_dato FROM person_i_modul pm, modul m WHERE pm.modul_id = m.modul_id AND pm.person_id = $id");
$sql1->execute();
$result1 = $sql1->get_result();
if ($result1->num_rows > 0 || $result->num_rows > 0) {
    if (!isset($tittel)) {
        echo '<div class="top">';
        $tittel = "<h2>Her finner du det du ikke rakk å fullføre</h2>";
        echo $tittel;
        echo '<form method="post" action="påbegynt.php">';
            echo '<input style="display:none;" id="is" type="radio" name="påbegynt-filter" value="1"';
            if ($filter == 1) {echo " checked";}
            echo '></input>';
            echo '<label for="is" id="is" name="is_label">Ingen sortering</label>';
            echo '<input style="display:none;" id="q" type="radio" name="påbegynt-filter" value="2"';
            if ($filter == 2) {echo " checked";}
            echo '></input>';
            echo '<label for="q" id="q" name="q_label">Se quizer</label>';
            echo '<input style="display:none;" id="m" type="radio" name="påbegynt-filter" value="3"';
            if ($filter == 3) {echo " checked";}
            echo '></input>';
            echo '<label for="m" id="m" name="m_label">Se moduler</label>';
            echo '<button type="submit" name="påbegynt-filter-knapp">Sorter</button>';
        echo '</form></div>';
    }
}
if ($result1->num_rows > 0 || $result->num_rows > 0) {
    if ($filter == 1 ) {
        skriv(1);
    } else if ($filter == 2) {
        skriv(2);
    } else if ($filter == 3) {
        skriv(3);
    }
}else {
    $tittel = '<h2>Det ser ikke ut som du har begynt på noe. Trykk nedenfor for å begynne<br><br><br><a href="alleQuizer.php" class="utfclass">Test deg selv i quiz</a><br><br><a href="alleKurs.php" class="utfclass">Finn et kurs</a><br><br><a href="alleModuler.php" class="utfclass">Utforsk moduler</a></h2>';
    echo $tittel;
}

function skriv($filterId) {
    require "assets/connection/conn.php";
    $id = $_SESSION['id'];
    $sql = $conn->prepare("SELECT pq.antall_svart, pq.antall_rette, q.quiz_id, q.quiznavn, q.antall_spørsmål FROM person_i_quiz pq, quiz q WHERE pq.quiz_id = q.quiz_id AND pq.person_id = $id AND pq.antall_svart < q.antall_spørsmål");
    $sql->execute();
    $result = $sql->get_result();
    $sql1 = $conn->prepare("SELECT pm.antall_sett, pm.modul_id, m.antall_sider, m.navn, pm.fullført_dato FROM person_i_modul pm, modul m WHERE pm.modul_id = m.modul_id AND pm.person_id = $id");
    $sql1->execute();
    $result1 = $sql1->get_result();
    if ($filterId == 1) {
        while($row = $result->fetch_assoc()) {
            $prosent = $row['antall_svart'] / $row['antall_spørsmål'] * 100;
            if ($prosent == 100) {
                $farge = "#B6F3AB";
            }
            if ($prosent < 100 && $prosent >= 50) {
                $farge = "#FFB347";
            }
            if ($prosent < 50 && $prosent > 0) {
                $farge = "#FF6961";
            }
            $prosentdesimal = $prosent/100;
            $grader = 360 * $prosentdesimal/2;
            echo '<div class="underveis-container">';
            echo '<a href="quiz.php?quiz=';
            echo $row['quiz_id'];
            echo '">';
            echo '<div class="underveis">';
            echo '<h4>QUIZ</h4>';
            echo '<div class="circle-wrap">';
            echo '<div class="circle">';
            echo '<div class="mask full" style="animation: fill ease-in-out 2s; transform: rotate(';
            echo $grader;
            echo 'deg);';
            echo '">';
            echo '<div class="fill" style=" animation: fill ease-in-out 2s; transform: rotate(';
            echo $grader;
            echo 'deg);';
            echo '"></div></div>';
            echo '<div class="mask half">';
            echo '<div class="fill" style=" animation: fill ease-in-out 2s; transform: rotate(';
            echo $grader;
            echo 'deg);';
            echo '"></div>';
            echo '</div><div class="inside-circle" style="color:';
            echo $farge;
            echo '">';
            echo $prosent;
            echo '% ferdig</div>';
            echo '</div></div><div class="bottom"><h3>';
            echo $row['quiznavn'];
            echo '</h3></div></div><p>Fortsett der du slapp</p></a>';
            echo '<style>';
            echo '@keyframes fill';
            echo '{0% {transform: rotate(0deg);}100% {transform: rotate(';
            echo $grader;
            echo 'deg);}}';
            echo '.mask .fill { background: ';
            echo $farge;
            echo ';}';
            echo '</style></div>';
        }
        while($row1 = $result1->fetch_assoc()) {
            $prosent = $row1['antall_sett'] / $row1['antall_sider'] * 100;
            if ($prosent == 100) {
                $modulfarge = "#B6F3AB";
            }
            if ($prosent < 100 && $prosent >= 50) {
                $modulfarge = "#FFB347";
            }
            if ($prosent < 50 && $prosent > 0) {
                $modulfarge = "#FF6961";
            }
            $prosentdesimal = $prosent/100;
            $grader = 360 * $prosentdesimal / 2;
            $dato = date_create($row1['fullført_dato']);
            $nyDato = date_format($dato, "d.m.Y");
            echo '<div class="underveis-container">';
            echo '<a href="modul.php?modul=';
            echo $row1['modul_id'];
            echo '">';
            echo '<div class="underveis">';
            echo '<h4>MODUL</h4>';
            echo '<div class="circle-wrap">';
            echo '<div class="circle">';
            echo '<div class="mask full" style="animation: modulfill';
            echo ' ease-in-out 2s; transform: rotate(';
            echo $grader;
            echo 'deg);';
            echo '">';
            echo '<div class="fillmodul" style=" animation: modulfill';
            echo ' ease-in-out 2s; transform: rotate(';
            echo $grader;
            echo 'deg);';
            echo '"></div></div>';
            echo '<div class="mask half">';
            echo '<div class="fillmodul" style=" animation: modulfill';
            echo ' ease-in-out 2s; transform: rotate(';
            echo $grader;
            echo 'deg);';
            echo '"></div>';
            echo '</div><div class="inside-circle" style="color:';
            echo $modulfarge;
            echo '">';
            echo $prosent;
            echo '% ferdig</div>';
            echo '</div></div><div class="bottom"><h3>';
            echo $row1['navn'];
            echo '</h3></div></div><p>Fortsett der du slapp</p></a>';
            echo '<style>';
            echo '@keyframes modulfill{0% {transform: rotate(0deg);}100% {transform: rotate(';
            echo $grader;
            echo 'deg);}}';
            echo '.mask .fillmodul { background: ';
            echo $modulfarge;
            echo ';}';
            echo '</style></div>';
        }
    } else if ($filterId == 2) {
        while($row = $result->fetch_assoc()) {
            $prosent = $row['antall_svart'] / $row['antall_spørsmål'] * 100;
            if ($prosent == 100) {
                $farge = "#B6F3AB";
            }
            if ($prosent < 100 && $prosent >= 50) {
                $farge = "#FFB347";
            }
            if ($prosent < 50 && $prosent > 0) {
                $farge = "#FF6961";
            }
            $prosentdesimal = $prosent/100;
            $grader = 360 * $prosentdesimal/2;
            echo '<div class="underveis-container">';
            echo '<a href="quiz.php?quiz=';
            echo $row['quiz_id'];
            echo '">';
            echo '<div class="underveis">';
            echo '<h4>QUIZ</h4>';
            echo '<div class="circle-wrap">';
            echo '<div class="circle">';
            echo '<div class="mask full" style="animation: fill ease-in-out 2s; transform: rotate(';
            echo $grader;
            echo 'deg);';
            echo '">';
            echo '<div class="fill" style=" animation: fill ease-in-out 2s; transform: rotate(';
            echo $grader;
            echo 'deg);';
            echo '"></div></div>';
            echo '<div class="mask half">';
            echo '<div class="fill" style=" animation: fill ease-in-out 2s; transform: rotate(';
            echo $grader;
            echo 'deg);';
            echo '"></div>';
            echo '</div><div class="inside-circle" style="color:';
            echo $farge;
            echo '">';
            echo $prosent;
            echo '% ferdig</div>';
            echo '</div></div><div class="bottom"><h3>';
            echo $row['quiznavn'];
            echo '</h3></div></div><p>Fortsett der du slapp</p></a>';
            echo '<style>';
            echo '@keyframes fill';
            echo '{0% {transform: rotate(0deg);}100% {transform: rotate(';
            echo $grader;
            echo 'deg);}}';
            echo '.mask .fill { background: ';
            echo $farge;
            echo ';}';
            echo '</style></div>';
        }
    } else if ($filterId == 3) {
        while($row1 = $result1->fetch_assoc()) {
            $prosent = $row1['antall_sett'] / $row1['antall_sider'] * 100;
            if ($prosent == 100) {
                $modulfarge = "#B6F3AB";
            }
            if ($prosent < 100 && $prosent >= 50) {
                $modulfarge = "#FFB347";
            }
            if ($prosent < 50 && $prosent > 0) {
                $modulfarge = "#FF6961";
            }
            $prosentdesimal = $prosent/100;
            $grader = 360 * $prosentdesimal / 2;
            $dato = date_create($row1['fullført_dato']);
            $nyDato = date_format($dato, "d.m.Y");
            echo '<div class="underveis-container">';
            echo '<a href="modul.php?modul=';
            echo $row1['modul_id'];
            echo '">';
            echo '<div class="underveis">';
            echo '<h4>MODUL</h4>';
            echo '<div class="circle-wrap">';
            echo '<div class="circle">';
            echo '<div class="mask full" style="animation: modulfill';
            echo ' ease-in-out 2s; transform: rotate(';
            echo $grader;
            echo 'deg);';
            echo '">';
            echo '<div class="fillmodul" style=" animation: modulfill';
            echo ' ease-in-out 2s; transform: rotate(';
            echo $grader;
            echo 'deg);';
            echo '"></div></div>';
            echo '<div class="mask half">';
            echo '<div class="fillmodul" style=" animation: modulfill';
            echo ' ease-in-out 2s; transform: rotate(';
            echo $grader;
            echo 'deg);';
            echo '"></div>';
            echo '</div><div class="inside-circle" style="color:';
            echo $modulfarge;
            echo '">';
            echo $prosent;
            echo '% ferdig</div>';
            echo '</div></div><div class="bottom"><h3>';
            echo $row1['navn'];
            echo '</h3></div></div><p>Fortsett der du slapp</p></a>';
            echo '<style>';
            echo '@keyframes modulfill{0% {transform: rotate(0deg);}100% {transform: rotate(';
            echo $grader;
            echo 'deg);}}';
            echo '.mask .fillmodul { background: ';
            echo $modulfarge;
            echo ';}';
            echo '</style></div>';
        }
    }
}