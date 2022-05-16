<?php
require "assets/connection/conn.php";
if (isset($otId1)) {
    $sql = $conn->prepare("SELECT m.* FROM modul m , modul_i_ot tio WHERE m.modul_id = tio.modul_id AND tio.ot_id = $otId1");
    $sql->execute();
    $result = $sql->get_result();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div id="modul';
            echo $row["modul_id"];
            echo '" class="modul">';
            echo '<h4>MODUL</h4>';
            echo '<div class="modul-tittel">';
            echo '<h3>';
            echo $row["navn"];
            echo '</h3>';
            echo '</div>';
            echo '<div class="bottom"';
            echo '"><p>';
            echo $row["beskrivelse"];
            echo '</p></div></div>';
        }
    }
}
if (isset($otId2)) {
    $sql = $conn->prepare("SELECT m.* FROM modul m , modul_i_ot tio WHERE m.modul_id = tio.modul_id AND tio.ot_id = $otId2");
    $sql->execute();
    $result = $sql->get_result();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div id="modul';
            echo $row["modul_id"];
            echo '" class="modul">';
            echo '<h4>MODUL</h4>';
            echo '<div class="modul-tittel">';
            echo '<h3>';
            echo $row["navn"];
            echo '</h3>';
            echo '</div>';
            echo '<div class="bottom"';
            echo '"><p>';
            echo $row["beskrivelse"];
            echo '</p></div></div>';
        }
    }
}
if (isset($otId3)) {
    $sql = $conn->prepare("SELECT m.* FROM modul m , modul_i_ot tio WHERE m.modul_id = tio.modul_id AND tio.ot_id = $otId3");
    $sql->execute();
    $result = $sql->get_result();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div id="modul';
            echo $row["modul_id"];
            echo '" class="modul">';
            echo '<h4>MODUL</h4>';
            echo '<div class="modul-tittel">';
            echo '<h3>';
            echo $row["navn"];
            echo '</h3>';
            echo '</div>';
            echo '<div class="bottom"';
            echo '"><p>';
            echo $row["beskrivelse"];
            echo '</p></div></div>';
        }
    }
}
if (isset($otId4)) {
    $sql = $conn->prepare("SELECT m.* FROM modul m , modul_i_ot tio WHERE m.modul_id = tio.modul_id AND tio.ot_id = $otId4");
    $sql->execute();
    $result = $sql->get_result();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div id="modul';
            echo $row["modul_id"];
            echo '" class="modul">';
            echo '<h4>MODUL</h4>';
            echo '<div class="modul-tittel">';
            echo '<h3>';
            echo $row["navn"];
            echo '</h3>';
            echo '</div>';
            echo '<div class="bottom"';
            echo '"><p>';
            echo $row["beskrivelse"];
            echo '</p></div></div>';
        }
    }
} if (!isset($otId1) && !isset($otId2) && !isset($otId3) && !isset($otId4)) {
    $sql = $conn->prepare("SELECT m.* FROM modul m");
    $sql->execute();
    $result = $sql->get_result();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div id="modul';
            echo $row["modul_id"];
            echo '" class="modul">';
            echo '<h4>MODUL</h4>';
            echo '<div class="modul-tittel">';
            echo '<h3>';
            echo $row["navn"];
            echo '</h3>';
            echo '</div>';
            echo '<div class="bottom"';
            echo '"><p>';
            echo $row["beskrivelse"];
            echo '</p></div></div>';
        }
    }
}
?>