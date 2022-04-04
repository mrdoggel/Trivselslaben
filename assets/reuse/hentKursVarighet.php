<?php
require "assets/connection/conn.php";
$kursId = $_GET['kurs'];
$sql = $conn->prepare("SELECT varighet FROM kurs WHERE kurs_id = $kursId");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo '<dd>cirka ';
    echo $row['varighet'];
    echo ' minutter</dd>';
}