<?php
$id = $_SESSION['id'];

$sql = $conn->prepare("SELECT t.* FROM tema t, person_i_tema pt WHERE t.tema_id = pt.tema_id AND pt.person_id = $id");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
  echo '<div>
        <div>
        <h3 class="">';echo $row['navn'];echo '</h3>
        </div>
        <form class="fjern" action="assets/reuse/fjernTema.php" method="post">
        <input type="hidden" name="tema" value="';echo $row['tema_id']; echo '"></input>
        <button>fjern</button>
        </form>
        </div>';
    }
}
?>