<?php
require "assets/connection/conn.php";
$sql = $conn->prepare("SELECT * FROM kurs");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div>';
        echo '<div id="kurs';
        echo $row["kurs_id"];
        echo '" class="kurs">';
        echo '<h4>KURS</h4>';
        echo '<img src="';
        echo $row["bilde"];
        echo '" alt="bilde">';
        echo '<div class="bottom"';
        echo 'style="background-color:';
        echo $row["farge"];
        echo '"><p>';
        echo $row["navn"];
        echo '</p></div></div></div>';
    }
}
?>