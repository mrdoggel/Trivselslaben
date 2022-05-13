<?php
require "assets/connection/conn.php";
$sql = $conn->prepare("SELECT * FROM kurs");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div>';
        echo '<a href="kurs.php?kurs=';
        echo $row["kurs_id"];
        echo '"<div id="kurs';
        echo $row["kurs_id"];
        echo '" class="kurs">';
        echo '<h4>KURS</h4>';
        echo '<img src="';
        echo $row["bilde"];
        echo '" alt="bilde"><h4 style="text-align: right; padding-right: 7px;">';
        echo $row['varighet'];
        echo ' minutter</h4><div class="bottom"';
        echo 'style="background-color:';
        echo $row["farge"];
        echo '"><h3>';
        echo $row["navn"];
        echo '</h3></div></a></div>';
    }
}
?>