<?php
require "assets/connection/conn.php";
$id = $_SESSION['id'];
$sql = $conn->prepare("SELECT t.tema_id FROM tema t, person_i_tema pt, person p WHERE t.tema_id = pt.tema_id AND p.person_id = pt.person_id AND pt.person_id = $id");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $currKurs = 0;
        $temaId = $row['tema_id'];
        $sql1 = $conn->prepare("SELECT k.* FROM kurs k, kurs_i_tema kt WHERE k.kurs_id = kt.kurs_id AND kt.tema_id = $temaId AND k.kurs_id;");
        $sql1->execute();
        $result1 = $sql1->get_result();
        if ($result1->num_rows > 0) {
            while ($row1 = $result1->fetch_assoc()) {
                echo '<div id="kurs';
                echo $row1["kurs_id"];
                echo '" class="kurs">';
                echo '<h4>KURS</h4>';
                echo '<img src="';
                echo $row1["bilde"];
                echo '" alt="lightbulb">';
                echo '<div class="bottom"';
                echo 'style="background-color:';
                echo $row1["farge"];
                echo '"><h3>';
                echo $row1["navn"];
                echo '</h3></div></div>';
            }
        }

        $sql2 = $conn->prepare("SELECT distinct m.* FROM modul m, modul_i_tema mt, tema t WHERE m.modul_id = mt.modul_id AND mt.tema_id = $temaId");
        $sql2->execute();
        $result2 = $sql2->get_result();
        if ($result2->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) {
                echo '<div id="modul';
                echo $row2["modul_id"];
                echo '" class="modul">';
                echo '<h4>MODUL</h4>';
                echo '<div class="modul-tittel">';
                echo '<h3>';
                echo $row2["navn"];
                echo '</h3></div>';
                echo '<div class="bottom"';
                echo '"><p>';
                echo $row2["beskrivelse"];
                echo '</p></div></div>';
            }
        }

    }
}

?>