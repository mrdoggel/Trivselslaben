<?php
require "assets/connection/conn.php";
$kursId = $_GET['kurs'];
$sql = $conn->prepare("SELECT tekst_tenk FROM tenk_i_kurs WHERE kurs_id = $kursId");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<p>';
        echo $row['tekst_tenk'];
        echo '</p>';
    }
}