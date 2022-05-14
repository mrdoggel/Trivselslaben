<?php
require "assets/connection/conn.php";
$id = $_SESSION['id'];
$sql = $conn->prepare("SELECT * FROM modul m, person_lagret_modul pl WHERE m.modul_id = pl.modul_id AND pl.person_id = $id");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div id="modul';
        echo $row["modul_id"];
        echo '" class="modul">';
        echo '<h4>MODUL</h4>';
        echo '<div class="modul-tittel">';
        echo '<h3>';
        echo $row["navn"];
        echo '</h3>';
        echo '</div>';
        echo '<div class="bottom"';
        echo '"><p>';
        echo $row["beskrivelse"];
        echo '</p></div></div>';
    }
}
?>