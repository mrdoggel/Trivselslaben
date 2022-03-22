<?php
session_start();

// initializing variables
$errors = array();

// connect to the database
require "conn.php";

// REGISTER USER
if (isset($_POST['reg-knapp'])) {

    // receive all input values from the form
    $fnavn = mysqli_real_escape_string($conn, $_POST['fnavn']);
    $enavn = mysqli_real_escape_string($conn, $_POST['enavn']);
    $epost = mysqli_real_escape_string($conn, $_POST['regEpost']);
    $gepost = mysqli_real_escape_string($conn, $_POST['gjentaRegEpost']);
    $passord = mysqli_real_escape_string($conn, $_POST['regPassord']);
    $bpassord = mysqli_real_escape_string($conn, $_POST['bekreft-passord']);
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
  if (empty($epost)) { array_push($errors, "Epost kreves"); }
  if (empty($passord)) { array_push($errors, "Passord kreves"); }
  if ($epost != $gepost) {
    array_push($errors, "Epostene er ikke like");
  }
  if ($passord != $bpassord) {
	array_push($errors, "Passordene er ikke like");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM person WHERE epost='$epost' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['epost'] === $epost) {
      array_push($errors, "Epost finnes allerede");
    }
  }

  $filExt = explode('.', $filNavn);
      $filFaktiskExt = strtolower(end($filExt));

      $lovlig = array('jpg', 'jpeg', 'png');

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

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = password_hash($passord, PASSWORD_DEFAULT); ;//encrypt the password before saving in the database
  	$query = "INSERT INTO person (fornavn, etternavn, epost, profilbilde) VALUES ('$fnavn', '$enavn', '$epost', '$filDestinasjon')";
  	$query2 = "INSERT INTO innlogging (epost, passord) VALUES ('$epost', '$password')";
    if ($conn->query($query) === TRUE && $conn->query($query2) === TRUE) {
      $_SESSION['fnavn'] = $fnavn;
      $_SESSION['enavn'] = $enavn;
      $_SESSION['success'] = "Du er nå registrert";
      move_uploaded_file($filTmpNavn, $filDestinasjon);
      header('location: login.php?registrert');
    } else {
      array_push($errors, "Databasefeil");
      }

  }
}
