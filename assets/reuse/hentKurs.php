<?php
require "assets/connection/conn.php";
$sql = $conn->prepare("SELECT * FROM kurs");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div id="kurs';
        echo $row["kurs_id"];
        echo '" class="kurs">';
        echo '<a href="kurs.php?kurs=';
        echo $row["kurs_id"];
        echo '">';
        echo '<div class="topp">';
        echo '<h4>KURS</h4>';
        echo '<img src="';
        echo $row["bilde"];
        echo '" alt="lightbulb"><h7 class="tid">';
        echo $row['varighet'];
        echo ' minutter</h7>';
        echo '</div>';
        echo '<div class="bottom"';
        echo 'style="background-color:';
        echo $row["farge"];
        echo '"><h3>';
        echo $row["navn"];
        echo '</h3></div></a></div>';
    }
}
?>