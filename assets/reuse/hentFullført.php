<?php
require "assets/connection/conn.php";
$id = $_SESSION['id'];
$sql = $conn->prepare("SELECT * FROM person_i_quiz pq, quiz q WHERE pq.quiz_id = q.quiz_id AND pq.person_id = $id AND pq.antall_svart >= q.antall_spørsmål");
$sql->execute();
$result = $sql->get_result();
$sql1 = $conn->prepare("SELECT * FROM person_i_modul pm, modul m WHERE pm.modul_id = m.modul_id AND pm.person_id = $id");
$sql1->execute();
$result1 = $sql1->get_result();
if ($result1->num_rows > 0 || $result->num_rows > 0) {
    if (!isset($tittel)) {
        echo '<div class="top">';
        $tittel = "<h2>Her finner du alt du har fullført </h2>";
        echo $tittel;
        echo '<form method="post" action="fullført.php">';
            echo '<input style="display:none;" id="isf" type="radio" name="fullført-filter" value="1"';
            if ($filter == 1) {echo " checked";}
            echo '></input>';
            echo '<label for="isf" id="isf" name="isf_label">Ingen sortering</label>';
            echo '<input style="display:none;" id="qf" type="radio" name="fullført-filter" value="2"';
            if ($filter == 2) {echo " checked";}
            echo '></input>';
            echo '<label for="qf" id="qf" name="qf_label">Se quizer</label>';
            echo '<input style="display:none;" id="mf" type="radio" name="fullført-filter" value="3"';
            if ($filter == 3) {echo " checked";}
            echo '></input>';
            echo '<label for="mf" id="mf" name="mf_label">Se moduler</label>';
            echo '<button type="submit" name="fullført-filter-knapp">Sorter</button>';
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
} else {
    $tittel = '<h2>Det ser ikke ut som du har fullført noe. Trykk nedenfor for å begynne<br><br><br><a href="alleQuizer.php" class="utfclass">Test deg selv i quiz</a><br><br><a href="alleKurs.php" class="utfclass">Finn et kurs</a><br><br><a href="alleModuler.php" class="utfclass">Utforsk moduler</a></h2>';
    echo $tittel;
}

function skriv($filterId) {
    require "assets/connection/conn.php";
    $id = $_SESSION['id'];
    $sql = $conn->prepare("SELECT * FROM person_i_quiz pq, quiz q WHERE pq.quiz_id = q.quiz_id AND pq.person_id = $id AND pq.antall_svart >= q.antall_spørsmål");
    $sql->execute();
    $result = $sql->get_result();
    $sql1 = $conn->prepare("SELECT * FROM person_i_modul pm, modul m WHERE pm.modul_id = m.modul_id AND pm.person_id = $id");
    $sql1->execute();
    $result1 = $sql1->get_result();
    if ($filterId == 1) {
        while($row = $result->fetch_assoc()) {
            $prosent = $row['antall_rette'] / $row['antall_spørsmål'] * 100;
            if ($prosent == 100) {
                $kursfarge = "#B6F3AB";
            }
            if ($prosent < 100 && $prosent >= 50) {
                $kursfarge = "#FFB347";
            }
            if ($prosent < 50 && $prosent > 0) {
                $kursfarge = "#FF6961";
            }
            $prosentdesimal = $prosent/100;
            $grader = 360 * $prosentdesimal / 2;
            $dato = date_create($row['fullført_dato']);
            $nyDato = date_format($dato, "d.m.Y");
            echo '<div class="fullført">';
                echo '<a href="quiz.php?quiz=';
                    echo $row['quiz_id'];
                    echo '">';
                    echo '<h4>QUIZ</h4>';
                    echo '<div class="circle-wrap">';
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
                                    echo '">
                                </div>
                            </div>';
                            echo '<div class="mask half">';
                                echo '<div class="fill" style="animation: fill';
                                    echo ' ease-in-out 2s; transform: rotate(';
                                    echo $grader;
                                    echo 'deg);';
                                    echo '">
                                </div>';
                            echo '
                            </div>
                            <div class="inside-circle" style="color:';
                                echo $kursfarge;
                                echo '">';
                                echo $prosent;
                            echo '% riktig</div>';
                        echo '
                        </div>
                    </div>';
                    echo '<div class="poeng"><p>Opptjente poeng: <span>';
                        echo $row['quizpoeng'];
                        echo '</span></p><p>Fullført: <span>';
                        echo $nyDato;
                        echo '</span></p>
                    </div>
                    <div class="bottom"><h3>';
                        echo $row['quiznavn'];
                        echo '</h3>';
                        echo '<style>';
                        echo '@keyframes fill';
                        echo '{0% {transform: rotate(0deg);}100% {transform: rotate(';
                        echo $grader;
                        echo 'deg);}}';
                        echo '.mask .fill { background: ';
                        echo $kursfarge;
                        echo ';} .fullført .bottom {background-color: #B6F3AB;}';
                        echo '</style>
                    </div>
                </a>
            </div>';
            }
            while($row1 = $result1->fetch_assoc()) {
                    $prosent = 100;
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
                    echo '<div class="fullført">';
                        echo '<a href="modul.php?modul=';
                            echo $row1['modul_id'];
                            echo '">';
                            echo '<h4>MODUL</h4>';
                            echo '<div class="circle-wrap">';
                                echo '<div class="circle">';
                                    echo '<div class="mask full" style="animation: fillmodul ease-in-out 2s; transform: rotate(';
                                        echo $grader;
                                        echo 'deg);';
                                        echo '">';
                                        echo '<div class="fillmodul" style="animation: fillmodul ease-in-out 2s; transform: rotate(';
                                            echo $grader;
                                            echo 'deg);';
                                            echo '">
                                        </div>
                                    </div>';
                                    echo '<div class="mask half">';
                                        echo '<div class="fillmodul" style="animation: fillmodul ease-in-out 2s; transform: rotate(';
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
                                echo '
                                </div>
                            </div>';
                            echo '<div class="poeng"><p>Opptjente poeng: <span>';
                                echo $row1['modul_poeng'];
                                echo '</span></p><p>Fullført: <span>';
                                echo $nyDato;
                                echo '</span></p>
                            </div>
                            <div class="modulbottom"><h3>';
                                echo $row1['navn'];
                                echo '</h3>';
                                echo '<style>';
                                echo '@keyframes fillmodul{0% {transform: rotate(0deg);}100% {transform: rotate(';
                                echo $grader;
                                echo 'deg);}}';
                                echo '.mask .fillmodul { background: ';
                                echo $modulfarge;
                                echo ';}';
                                echo '</style>
                            </div>
                        </a>
                    </div>';
        }
    } else if ($filterId == 2) {
            while($row = $result->fetch_assoc()) {
                $prosent = $row['antall_rette'] / $row['antall_spørsmål'] * 100;
                if ($prosent == 100) {
                    $kursfarge = "#B6F3AB";
                }
                if ($prosent < 100 && $prosent >= 50) {
                    $kursfarge = "#FFB347";
                }
                if ($prosent < 50 && $prosent > 0) {
                    $kursfarge = "#FF6961";
                }
                $prosentdesimal = $prosent/100;
                $grader = 360 * $prosentdesimal / 2;
                $dato = date_create($row['fullført_dato']);
                $nyDato = date_format($dato, "d.m.Y");
                echo '<div class="fullført">';
                    echo '<a href="quiz.php?quiz=';
                        echo $row['quiz_id'];
                        echo '">';
                        echo '<h4>QUIZ</h4>';
                        echo '<div class="circle-wrap">';
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
                                        echo '">
                                    </div>
                                </div>';
                                echo '<div class="mask half">';
                                    echo '<div class="fill" style="animation: fill';
                                        echo ' ease-in-out 2s; transform: rotate(';
                                        echo $grader;
                                        echo 'deg);';
                                        echo '">
                                    </div>';
                                echo '
                                </div>
                                <div class="inside-circle" style="color:';
                                    echo $kursfarge;
                                    echo '">';
                                    echo $prosent;
                                echo '% riktig</div>';
                            echo '
                            </div>
                        </div>';
                        echo '<div class="poeng"><p>Opptjente poeng: <span>';
                            echo $row['quizpoeng'];
                            echo '</span></p><p>Fullført: <span>';
                            echo $nyDato;
                            echo '</span></p>
                        </div>
                        <div class="bottom"><h3>';
                            echo $row['quiznavn'];
                            echo '</h3>';
                            echo '<style>';
                            echo '@keyframes fill';
                            echo '{0% {transform: rotate(0deg);}100% {transform: rotate(';
                            echo $grader;
                            echo 'deg);}}';
                            echo '.mask .fill { background: ';
                            echo $kursfarge;
                            echo ';} .fullført .bottom {background-color: #B6F3AB;}';
                            echo '</style>
                        </div>
                    </a>
                </div>';
                }
    } else if ($filterId == 3) {
         while($row1 = $result1->fetch_assoc()) {
                             $prosent = 100;
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
                             echo '<div class="fullført">';
                                 echo '<a href="modul.php?modul=';
                                     echo $row1['modul_id'];
                                     echo '">';
                                     echo '<h4>MODUL</h4>';
                                     echo '<div class="circle-wrap">';
                                         echo '<div class="circle">';
                                             echo '<div class="mask full" style="animation: fillmodul ease-in-out 2s; transform: rotate(';
                                                 echo $grader;
                                                 echo 'deg);';
                                                 echo '">';
                                                 echo '<div class="fillmodul" style="animation: fillmodul ease-in-out 2s; transform: rotate(';
                                                     echo $grader;
                                                     echo 'deg);';
                                                     echo '">
                                                 </div>
                                             </div>';
                                             echo '<div class="mask half">';
                                                 echo '<div class="fillmodul" style="animation: fillmodul ease-in-out 2s; transform: rotate(';
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
                                         echo '
                                         </div>
                                     </div>';
                                     echo '<div class="poeng"><p>Opptjente poeng: <span>';
                                         echo $row1['modul_poeng'];
                                         echo '</span></p><p>Fullført: <span>';
                                         echo $nyDato;
                                         echo '</span></p>
                                     </div>
                                     <div class="modulbottom"><h3>';
                                         echo $row1['navn'];
                                         echo '</h3>';
                                         echo '<style>';
                                         echo '@keyframes fillmodul{0% {transform: rotate(0deg);}100% {transform: rotate(';
                                         echo $grader;
                                         echo 'deg);}}';
                                         echo '.mask .fillmodul { background: ';
                                         echo $modulfarge;
                                         echo ';}';
                                         echo '</style>
                                     </div>
                                 </a>
                             </div>';
                 }
    }
}
