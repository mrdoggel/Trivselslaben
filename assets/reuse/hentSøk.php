<?php
require "assets/connection/conn.php";
$søkeparameter = $_POST['søkeparameter'];
$currKurs = null;
$sql = $conn->prepare("SELECT * FROM kurs k WHERE k.navn LIKE '%$søkeparameter%'");
$sql->execute();
$result = $sql->get_result();
$resultat = false;
if ($result->num_rows > 0) {
    if ($resultat == false ) {
        $resultat = true;
        echo '<h2>Resultat som kan stemme overens med "';
        echo $søkeparameter;
        echo '"</h2>';
        echo '<div class="scrollmenu">';
    }

    while($row = $result->fetch_assoc()) {
        echo '<div id="kurs';
        echo $row["kurs_id"];
        echo '" class="kurs">';
        echo '<h4>KURS</h4>';
        echo '<img src="';
        if (!is_null($row["bilde"])) {
            echo $row["bilde"];
        } else {
            echo "assets/media/default-image.png";
        }
        echo '" alt="image">';
        echo '<div class="bottom"';
        echo 'style="background-color:';
        echo $row["farge"];
        echo '"><p>';
        echo $row["navn"];
        echo '</p></div></div>';
    }
}
$sql1 = $conn->prepare("SELECT * FROM modul m WHERE m.navn LIKE '%$søkeparameter%' OR m.beskrivelse LIKE '%$søkeparameter%' GROUP BY m.navn");
$sql1->execute();
$result1 = $sql1->get_result();
if ($result1->num_rows > 0) {
    if ($resultat == false ) {
        $resultat = true;
        echo '<h2>Resultat som kan stemme overens med "';
        echo $søkeparameter;
        echo '"</h2>';
    }
    while($row = $result1->fetch_assoc()) {
        echo '<div id="modul';
        echo $row["modul_id"];
        echo '" class="modul">';
        echo '<h4>MODUL</h4>';
        echo '<div class="modul-tittel">';
        echo '<h2>';
        echo $row["navn"];
        echo '</h2></div>';
        echo '<div class="bottom"';
        echo '"><p>';
        echo $row["beskrivelse"];
        echo '</p></div></div>';
    }
} else {
    if ($resultat == false) {
        echo '<h1>Fant ingenting som som stemmer med "';
        echo $søkeparameter;
        echo '"</h1></div>';
    }
}

?>