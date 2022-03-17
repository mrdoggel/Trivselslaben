<?php
require "assets/connection/conn.php";
$sql = $conn->prepare("SELECT * FROM modul WHERE modul_id <= 3");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div id="modul';
        echo $row["modul_id"];
        echo '" class="modul">';
        echo '<h4>MODUL</h4>';
        echo '<h2>';
        echo $row["navn"];
        echo '</h2>';
        echo '<div class="bottom"';
        echo '"><p>';
        echo $row["beskrivelse"];
        echo '</p></div></div>';
    }
}
?>