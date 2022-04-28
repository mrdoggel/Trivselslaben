<?php
require "assets/connection/conn.php";
$id = $_SESSION['id'];
$sql = $conn->prepare("SELECT * FROM kurs k, person_lagret_kurs pl WHERE k.kurs_id = pl.kurs_id AND pl.person_id = $id");
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
        echo '" alt="bilde">';
        echo '<div class="bottom"';
        echo 'style="background-color:';
        echo $row["farge"];
        echo '"><h3>';
        echo $row["navn"];
        echo '</h3></div></div></a>';
    }
}
?>