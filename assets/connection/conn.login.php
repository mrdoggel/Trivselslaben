<?php
$errors = array();

require "conn.php";

if (isset($_POST['logginn-knapp'])) {
  $username = mysqli_real_escape_string($conn, $_POST['epost']);
  $password = mysqli_real_escape_string($conn, $_POST['passord']);

  if (empty($username)) {
  	array_push($errors, "Epost kreves");
  }
  if (empty($password)) {
  	array_push($errors, "Passord kreves");
  }

  if (count($errors) == 0) {
    $sql = $conn->prepare("SELECT * FROM innlogging i, person p WHERE i.epost = ? AND i.epost = p.epost");
    $sql->bind_param("s", $username);
    $sql->execute();
    $result = $sql->get_result();
  	if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $hash = $row['passord'];
        if (password_verify($password, $hash)) {
            session_start();
            $_SESSION['fnavn'] = $row['fornavn'];
            $_SESSION['enavn'] = $row['etternavn'];
            $_SESSION['beskrivelse'] = $row['beskrivelse'];
            $_SESSION['poeng'] = $row['poeng'];
            $_SESSION['bilde'] = $row['profilbilde'];
            $_SESSION['email'] = $row['epost'];
            $_SESSION['id'] = $row['person_id'];
            $_SESSION['success'] = "Du er nå logget inn";
            header('location: forside.php');
        }else {
            array_push($errors, "Feil passord");
        }
      }
  	}else {
  		array_push($errors, "Databasefeil");
  	}
  }
}

?>