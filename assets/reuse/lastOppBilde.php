<?php
    require "../connection/conn.php";
    session_start();
    $id = $_SESSION['id'];
    $fil = $_FILES['bilde'];
    $filNavn = $_FILES['bilde']['name'];
    $filTmpNavn = $_FILES['bilde']['tmp_name'];
    $filStrl = $_FILES['bilde']['size'];
    $filType = $_FILES['bilde']['type'];
    $filError = $_FILES['bilde']['error'];

    $filExt = explode('.', $filNavn);
    $filFaktiskExt = strtolower(end($filExt));

    $lovlig = array('jpg', 'jpeg', 'png');

    if (in_array($filFaktiskExt, $lovlig)) {
      if ($filError === 0) {
        if ($filStrl < 1000000) {
          $filNavnNy = uniqid('', true).".".$filFaktiskExt;
          $filDestinasjon = 'assets/images/'.$filNavnNy;


          $sql = $conn->prepare("UPDATE person SET profilbilde = ? WHERE person_id = $id");
          $sql->bind_param("s", $filDestinasjon);
          if ($sql->execute() === TRUE) {
            move_uploaded_file($filTmpNavn, "../../".$filDestinasjon);
            header("location: ../../minside.php?Oppdatert");
            $_SESSION['bilde'] = $filDestinasjon;

          } else {
            echo $conn->error;
          }

        } else {
          echo "Filen din er for stor!";
        }
      } else {
        echo "Det oppstod et problem med opplastingen.";
      }
    } else {
      echo "Du kan ikke laste opp filer av denne typen!";
    }

?>