<?php

    $fil = $_FILES['Bilde'];
    $filNavn = $_FILES['Bilde']['name'];
    $filTmpNavn = $_FILES['Bilde']['tmp_name'];
    $filStrl = $_FILES['Bilde']['size'];
    $filType = $_FILES['Bilde']['type'];
    $filError = $_FILES['Bilde']['error'];

    $filExt = explode('.', $filNavn);
    $filFaktiskExt = strtolower(end($filExt));

    $lovlig = array('jpg', 'jpeg', 'png');

    if (in_array($filFaktiskExt, $lovlig)) {
      if ($filError === 0) {
        if ($filStrl < 1000000) {
          $filNavnNy = uniqid('', true).".".$filFaktiskExt;
          $filDestinasjon = 'Bilder/'.$filNavnNy;
          move_uploaded_file($filTmpNavn, "../".$filDestinasjon);

          $sql = $conn->prepare("CALL oppdaterProfil(?, ?, ?, ?, ?, ?, ?)");
          $sql->bind_param("sssssss", $pnr, $filDestinasjon, $fornavn, $etternavn, $epost, $fdato, $bio);
          if ($sql->execute() === TRUE) {

            header("location: ../minside.php?Oppdatert");

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
  }

?>