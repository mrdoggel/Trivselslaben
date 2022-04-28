<?php
require "assets/connection/conn.php";
if (isset($otId1)) {
    $sql = $conn->prepare("SELECT k.* FROM kurs k , kurs_i_tema kt, tema_i_ot tio WHERE k.kurs_id = kt.kurs_id AND kt.tema_id = tio.tema_id AND tio.ot_id = $otId1");
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
}
if (isset($otId2)) {
    $sql = $conn->prepare("SELECT k.* FROM kurs k , kurs_i_tema kt, tema_i_ot tio WHERE k.kurs_id = kt.kurs_id AND kt.tema_id = tio.tema_id AND tio.ot_id = $otId2");
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
}
if (isset($otId3)) {
    $sql = $conn->prepare("SELECT k.* FROM kurs k , kurs_i_tema kt, tema_i_ot tio WHERE k.kurs_id = kt.kurs_id AND kt.tema_id = tio.tema_id AND tio.ot_id = $otId3");
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
}
if (isset($otId4)) {
    $sql = $conn->prepare("SELECT k.* FROM kurs k , kurs_i_tema kt, tema_i_ot tio WHERE k.kurs_id = kt.kurs_id AND kt.tema_id = tio.tema_id AND tio.ot_id = $otId4");
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
}
?>