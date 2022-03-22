<?php

// initializing variables
$errors = array();
session_start();
$id = $_SESSION['id'];

// connect to the database
require "conn.php";

// REGISTER USER
if (isset($_POST['oppdater-knapp'])) {

    // receive all input values from the form
    $fnavn = mysqli_real_escape_string($conn, $_POST['nyttfnavn']);
    $enavn = mysqli_real_escape_string($conn, $_POST['nyttenavn']);
    $besk = mysqli_real_escape_string($conn, $_POST['nybesk']);
    $fil = $_FILES['bilde'];
    $filNavn = $_FILES['bilde']['name'];
    $filTmpNavn = $_FILES['bilde']['tmp_name'];
    $filStrl = $_FILES['bilde']['size'];
    $filType = $_FILES['bilde']['type'];
    $filError = $_FILES['bilde']['error'];

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fnavn)) { array_push($errors, "Fornavn kreves"); }
  if (empty($enavn)) { array_push($errors, "Etternavn kreves"); }

  $filExt = explode('.', $filNavn);
      $filFaktiskExt = strtolower(end($filExt));
      $lovlig = array('jpg', 'jpeg', 'png');
    if (!empty($filNavn)) {
      if (in_array($filFaktiskExt, $lovlig)) {
        if ($filError === 0) {
          if ($filStrl < 1000000) {
            $filNavnNy = uniqid('', true).".".$filFaktiskExt;
            $filDestinasjon = 'assets/images/'.$filNavnNy;
          } else {
            array_push($errors, "Filen din er for stor!");
          }
        } else {
            array_push($errors, "Det oppstod et problem med opplastingen.");
        }
      } else {
        array_push($errors, "Du kan ikke laste opp filer av denne typen!");
      }
    } else {
        array_push($errors, "Bilde kreves");
    }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	  $sql = $conn->prepare("UPDATE person SET fornavn = ?, etternavn = ?, beskrivelse = ?, profilbilde = ? WHERE person_id = $id");
      $sql->bind_param("ssss", $fnavn, $enavn, $besk, $filDestinasjon);
      if ($sql->execute() === TRUE) {
      $_SESSION['fnavn'] = $fnavn;
      $_SESSION['enavn'] = $enavn;
      $_SESSION['beskrivelse'] = $besk;
      $_SESSION['bilde'] = $filDestinasjon;
      move_uploaded_file($filTmpNavn, $filDestinasjon);
      header('location: minside.php?oppdatert');
    } else {
      array_push($errors, "Databasefeil");
      }

  }
}
