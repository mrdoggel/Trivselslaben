<?php
require "assets/connection/conn.php";
$id = $_SESSION['id'];
$sql = $conn->prepare("SELECT * FROM kurs k, person_lagret_kurs pl WHERE k.kurs_id = pl.kurs_id AND pl.person_id = $id");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $resultat++;
        echo '<div id="kurs';
                        echo $row["kurs_id"];
                        echo '" class="kurs">';
                        echo '<a href="kurs.php?kurs=';
                        echo $row["kurs_id"];
                        echo '">';
                        echo '<div class="topp">';
                        echo '<h4>KURS</h4>';
                        echo '<img src="';
                        echo $row["bilde"];
                        echo '" alt="lightbulb"><h4 style=" text-align: center; margin-left: 4rem; padding-bottom: 0.2rem;">';
                        echo $row['varighet'];
                        echo ' minutter</h4>';
                        echo '</div>';
                        echo '<div class="bottom"';
                        echo 'style="background-color:';
                        echo $row["farge"];
                        echo '"><h3>';
                        echo $row["navn"];
                        echo '</h3></div></a></div>';
    }
}
?>