<?php
require "assets/connection/conn.php";
$id = $_SESSION['id'];
if (isset($_GET['poeng'])) {
    $poeng = $_GET['poeng'];
}
$sql = $conn->prepare("SELECT m.modul_id, m.navn, pm.fullført_dato, m.modul_poeng FROM person_i_modul pm, modul m WHERE pm.modul_id = m.modul_id AND pm.person_id = $id AND m.modul_id = $modul");
$sql->execute();
$result = $sql->get_result();
if (!isset($poeng)) {
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $navn = $row['navn'];
            $poeng = $row['modul_poeng'];
            $prosent = 100;
            $prosentdesimal = $prosent/100;
            $grader = 360 * $prosentdesimal / 2;
            $dato = date_create($row['fullført_dato']);
            $nyDato = date_format($dato, "d.m.Y");
            echo '<h2>Du har nå fullført Modulen</h2>';
            echo "<h1>$navn</h1><div>";
            echo '<div class="circle-wrap">';
            echo '<div class="circle">';
            echo '<div class="mask full" style="animation: fill';
            echo $row['modul_id'];
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
            echo "<p><span>Du fullførte modulen og fikk $poeng poeng!</span></p>";
            echo '<p id="prøv-igjen"><a href="forside.php';
            echo'"><span>Til hovedside</span></a></p>';
        }
    }
} else {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $navn = $row['navn'];
        echo "<h1>$navn</h1><div>";
        echo "<p><span>Ser ut som du allerede har fullført modulen!</span></p>";
        echo '<p id="prøv-igjen"><a href="forside.php';
        echo'"><span>Til hovedside</span></a></p>';
    }
}