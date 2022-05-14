<?php
require "assets/connection/conn.php";
$id = $_SESSION['id'];
$sql = $conn->prepare("SELECT pq.antall_svart, pq.antall_rette, q.quiz_id, q.quiznavn, q.antall_spørsmål FROM person_i_quiz pq, quiz q WHERE pq.quiz_id = q.quiz_id AND pq.person_id = $id AND pq.antall_svart < q.antall_spørsmål");
$sql->execute();
$result = $sql->get_result();
$sql1 = $conn->prepare("SELECT pm.antall_sett, m.modul_poeng, pm.modul_id, m.antall_sider, m.navn, pm.fullført_dato FROM person_i_modul pm, modul m WHERE pm.modul_id = m.modul_id AND pm.person_id = $id AND pm.antall_sett < m.antall_sider");
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
    $tittel = '<h2>Det ser ikke ut som du har begynt på noe. Trykk nedenfor for å be<a href="assets/connection/genererDataUnderveis.php">g</a>ynne<br><br><br><a class="link1" href="alleQuizer.php" class="utfclass">Test deg selv i quiz</a><br><br><a class="link2" href="alleKurs.php" class="utfclass">Finn et kurs</a><br><br><a class="link3" href="alleModuler.php" class="utfclass">Utforsk moduler</a></h2>';
    echo $tittel;
}

function skriv($filterId) {
    require "assets/connection/conn.php";
    $id = $_SESSION['id'];
    $sql = $conn->prepare("SELECT pq.antall_svart, pq.antall_rette, q.quiz_id, q.quiznavn, q.antall_spørsmål FROM person_i_quiz pq, quiz q WHERE pq.quiz_id = q.quiz_id AND pq.person_id = $id AND pq.antall_svart < q.antall_spørsmål");
    $sql->execute();
    $result = $sql->get_result();
    $sql1 = $conn->prepare("SELECT pm.antall_sett, m.modul_poeng, pm.modul_id, m.antall_sider, m.navn, pm.fullført_dato FROM person_i_modul pm, modul m WHERE pm.modul_id = m.modul_id AND pm.person_id = $id AND pm.antall_sett < m.antall_sider");
    $sql1->execute();
    $result1 = $sql1->get_result();
    if ($filterId == 1) {
        while($row = $result->fetch_assoc()) {
            $prosent = round($row['antall_svart'] / $row['antall_spørsmål'] * 100);
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
            $grader = round(360 * $prosentdesimal/2);
            echo '<div class="underveis-container">';
            echo '<a href="quiz.php?quiz=';
            echo $row['quiz_id'];
            echo '">';
            echo '<div class="underveis">';
            echo '<h4>QUIZ</h4>';
            echo '<div class="circle-wrap">';
            echo '<div class="circle">';
            echo '<div class="mask';
            echo $row['quiz_id'];
            echo ' full" style="animation: fill';
            echo $row['quiz_id'];
            echo ' ease-in-out 2s; transform: rotate(';
            echo $grader;
            echo 'deg);';
            echo '">';
            echo '<div class="fill';
            echo $row['quiz_id'];
            echo '"style="background-color:';
            echo $farge;
            echo '; animation: fill';
            echo $row['quiz_id'];
            echo ' ease-in-out 2s; transform: rotate(';
            echo $grader;
            echo 'deg);';
            echo '"></div></div>';
            echo '<div class="mask';
            echo $row['quiz_id'];
            echo ' half">';
            echo '<div class="fill';
            echo $row['quiz_id'];
            echo '" style="background-color:';
            echo $farge;
            echo '; animation: fill';
            echo $row['quiz_id'];
            echo ' ease-in-out 2s; transform: rotate(';
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
            echo $row['quiz_id'];
            echo '{0% {transform: rotate(0deg);}100% {transform: rotate(';
            echo $grader;
            echo 'deg);}}';
            echo '.mask';
            echo $row['quiz_id'];
            echo ' .fill';
            echo $row['quiz_id'];
            echo '{ background: ';
            echo $farge;
            echo ';}
            .circle-wrap {
              margin: auto;
              width: 7.9vw;
              height: 7.9vw;
              background: #fefcff;
              border-radius: 50%;
            }

            .circle-wrap .circle .mask';echo $row['quiz_id'];echo ',
            .circle-wrap .circle .fill';echo $row['quiz_id'];echo ' {
              width: 7.9vw;
              height: 7.9vw;
              position: absolute;
              border-radius: 50%;
            }

            .mask';echo $row['quiz_id'];echo ' .fill';echo $row['quiz_id'];echo ' {
              clip: rect(0px, 3.95vw, 7.9vw, 0px);
            }

            .circle-wrap .circle .mask';echo $row['quiz_id'];echo ' {
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
        }
        while($row1 = $result1->fetch_assoc()) {
            $prosent = round($row1['antall_sett'] / $row1['antall_sider'] * 100);
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
                            echo '<div class="maskmodul';
                                echo $row1['modul_id'];
                                echo ' full" style="animation: fillmodul';
                                echo $row1['modul_id'];
                                echo ' ease-in-out 2s; transform: rotate(';
                                echo $grader;
                                echo 'deg);';
                                echo '">';
                                echo '<div class="fillmodul';
                                    echo $row1['modul_id'];
                                    echo '" style="animation: fillmodul';
                                    echo $row1['modul_id'];
                                    echo ' ease-in-out 2s; transform: rotate(';
                                    echo $grader;
                                    echo 'deg);';
                                    echo '">
                                </div>
                            </div>';
                            echo '<div class="maskmodul';
                                echo $row1['modul_id'];
                                echo ' half">';
                                echo '<div class="fillmodul';
                                    echo $row1['modul_id'];
                                    echo '" style="animation: fillmodul';
                                    echo $row1['modul_id'];
                                    echo ' ease-in-out 2s; transform: rotate(';
                                    echo $grader;
                                    echo 'deg);';
                                    echo '">
                                </div>';
                            echo '
                            </div>
                            <div class="inside-circle" style="color:';
                            echo $modulfarge;
                            echo '">';
                                echo $prosent;
                            echo '% riktig</div>';
                        echo '</div></div><div class="modulbottom"><h3>';
                    echo $row1['navn'];
                    echo '</h3></div></div><p>Fortsett der du slapp</p></a>';
                    echo '<style>';
                    echo '@keyframes fillmodul';
                    echo $row1['modul_id'];
                    echo '{0% {transform: rotate(0deg);}100% {transform: rotate(';
                    echo $grader;
                    echo 'deg);}}';
                    echo '.maskmodul';
                    echo $row1['modul_id'];
                    echo ' .fillmodul';
                    echo $row1['modul_id'];
                    echo '{ background: ';
                    echo $modulfarge;
                    echo ';}
                    .circle-wrap {
                      margin: auto;
                      width: 7.9vw;
                      height: 7.9vw;
                      background: #fefcff;
                      border-radius: 50%;
                    }

                    .circle-wrap .circle .maskmodul';echo $row1['modul_id'];echo ',
                    .circle-wrap .circle .fillmodul';echo $row1['modul_id'];echo ' {
                      width: 7.9vw;
                      height: 7.9vw;
                      position: absolute;
                      border-radius: 50%;
                    }

                    .maskmodul';echo $row1['modul_id'];;echo ' .fillmodul';echo $row1['modul_id'];;echo ' {
                      clip: rect(0px, 3.95vw, 7.9vw, 0px);
                    }

                    .circle-wrap .circle .maskmodul';echo $row1['modul_id'];;echo ' {
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
                    echo '</style>
                </a>
            </div>';
        }
    } else if ($filterId == 2) {
        while($row = $result->fetch_assoc()) {
            $prosent = round($row['antall_svart'] / $row['antall_spørsmål'] * 100);
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
            $grader = round(360 * $prosentdesimal/2);
            echo '<div class="underveis-container">';
            echo '<a href="quiz.php?quiz=';
            echo $row['quiz_id'];
            echo '">';
            echo '<div class="underveis">';
            echo '<h4>QUIZ</h4>';
            echo '<div class="circle-wrap">';
            echo '<div class="circle">';
            echo '<div class="mask';
            echo $row['quiz_id'];
            echo ' full" style="animation: fill';
            echo $row['quiz_id'];
            echo ' ease-in-out 2s; transform: rotate(';
            echo $grader;
            echo 'deg);';
            echo '">';
            echo '<div class="fill';
            echo $row['quiz_id'];
            echo '"style="background-color:';
            echo $farge;
            echo '; animation: fill';
            echo $row['quiz_id'];
            echo ' ease-in-out 2s; transform: rotate(';
            echo $grader;
            echo 'deg);';
            echo '"></div></div>';
            echo '<div class="mask';
            echo $row['quiz_id'];
            echo ' half">';
            echo '<div class="fill';
            echo $row['quiz_id'];
            echo '" style="background-color:';
            echo $farge;
            echo '; animation: fill';
            echo $row['quiz_id'];
            echo ' ease-in-out 2s; transform: rotate(';
            echo $grader;
            echo 'deg);';
            echo '"></div>';
            echo '</div><div class="inside-circle" style=" color:';
            echo $farge;
            echo '">';
            echo $prosent;
            echo '% ferdig</div>';
            echo '</div></div><div class="bottom"><h3>';
            echo $row['quiznavn'];
            echo '</h3></div></div><p>Fortsett der du slapp</p></a>';
            echo '<style>';
            echo '@keyframes fill';
            echo $row['quiz_id'];
            echo '{0% {transform: rotate(0deg);}100% {transform: rotate(';
            echo $grader;
            echo 'deg);}}';
            echo '.mask';
            echo $row['quiz_id'];
            echo ' .fill';
            echo $row['quiz_id'];
            echo '{ background: ';
            echo $farge;
            echo ';}
            .circle-wrap {
              margin: auto;
              width: 7.9vw;
              height: 7.9vw;
              background: #fefcff;
              border-radius: 50%;
            }

            .circle-wrap .circle .mask';echo $row['quiz_id'];echo ',
            .circle-wrap .circle .fill';echo $row['quiz_id'];echo ' {
              width: 7.9vw;
              height: 7.9vw;
              position: absolute;
              border-radius: 50%;
            }

            .mask';echo $row['quiz_id'];echo ' .fill';echo $row['quiz_id'];echo ' {
              clip: rect(0px, 3.95vw, 7.9vw, 0px);
            }

            .circle-wrap .circle .mask';echo $row['quiz_id'];echo ' {
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
        }
    } else if ($filterId == 3) {
        while($row1 = $result1->fetch_assoc()) {
            $prosent = round($row1['antall_sett'] / $row1['antall_sider'] * 100);
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
                            echo '<div class="maskmodul';
                                echo $row1['modul_id'];
                                echo ' full" style="animation: fillmodul';
                                echo $row1['modul_id'];
                                echo ' ease-in-out 2s; transform: rotate(';
                                echo $grader;
                                echo 'deg);';
                                echo '">';
                                echo '<div class="fillmodul';
                                    echo $row1['modul_id'];
                                    echo '" style="animation: fillmodul';
                                    echo $row1['modul_id'];
                                    echo ' ease-in-out 2s; transform: rotate(';
                                    echo $grader;
                                    echo 'deg);';
                                    echo '">
                                </div>
                            </div>';
                            echo '<div class="maskmodul';
                                echo $row1['modul_id'];
                                echo ' half">';
                                echo '<div class="fillmodul';
                                    echo $row1['modul_id'];
                                    echo '" style="animation: fillmodul';
                                    echo $row1['modul_id'];
                                    echo ' ease-in-out 2s; transform: rotate(';
                                    echo $grader;
                                    echo 'deg);';
                                    echo '">
                                </div>';
                            echo '
                            </div>
                            <div class="inside-circle" style="color:';
                            echo $modulfarge;
                            echo '">';
                                echo $prosent;
                            echo '% riktig</div>';
                        echo '</div></div><div class="modulbottom"><h3>';
                    echo $row1['navn'];
                    echo '</h3></div></div><p>Fortsett der du slapp</p></a>';
                    echo '<style>';
                    echo '@keyframes fillmodul';
                    echo $row1['modul_id'];
                    echo '{0% {transform: rotate(0deg);}100% {transform: rotate(';
                    echo $grader;
                    echo 'deg);}}';
                    echo '.maskmodul';
                    echo $row1['modul_id'];
                    echo ' .fillmodul';
                    echo $row1['modul_id'];
                    echo '{ background: ';
                    echo $modulfarge;
                    echo ';}
                    .circle-wrap {
                      margin: auto;
                      width: 7.9vw;
                      height: 7.9vw;
                      background: #fefcff;
                      border-radius: 50%;
                    }

                    .circle-wrap .circle .maskmodul';echo $row1['modul_id'];echo ',
                    .circle-wrap .circle .fillmodul';echo $row1['modul_id'];echo ' {
                      width: 7.9vw;
                      height: 7.9vw;
                      position: absolute;
                      border-radius: 50%;
                    }

                    .maskmodul';echo $row1['modul_id'];;echo ' .fillmodul';echo $row1['modul_id'];;echo ' {
                      clip: rect(0px, 3.95vw, 7.9vw, 0px);
                    }

                    .circle-wrap .circle .maskmodul';echo $row1['modul_id'];;echo ' {
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
                    echo '</style>
                </a>
            </div>';
        }
    }
}