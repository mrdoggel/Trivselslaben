<?php
require "assets/connection/conn.php";
$kursId = $_GET['kurs'];
$sql = $conn->prepare("SELECT fk.tekst_fordel, uk.tekst_ulempe FROM fordel_i_kurs fk, ulempe_i_kurs uk WHERE fk.fordel_id = uk.ulempe_id AND fk.kurs_id = $kursId");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<tr><td>';
        echo $row['tekst_fordel'];
        echo '</td><td>';
        echo $row['tekst_ulempe'];
        echo '</td></tr>';
    }
}