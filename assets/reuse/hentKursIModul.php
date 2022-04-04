<?php
require "assets/connection/conn.php";
$kursId = $_GET['kurs'];
$sql = $conn->prepare("SELECT m.navn, m.modul_id FROM modul m, kurs_i_modul km WHERE km.kurs_id = $kursId AND km.modul_id = m.modul_id");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo '<dd>';
    echo '<a href="../../modul.php?modul=';
    echo $row['modul_id'];
    echo '">';
    echo $row['navn'];
    echo '</a></dd>';
}