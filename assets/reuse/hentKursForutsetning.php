<?php
require "assets/connection/conn.php";
$kursId = $_GET['kurs'];
$sql = $conn->prepare("SELECT tekst_forutsetning FROM forutsetning_i_kurs WHERE kurs_id = $kursId");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<li>';
        echo $row['tekst_forutsetning'];
        echo '</li>';
    }
}