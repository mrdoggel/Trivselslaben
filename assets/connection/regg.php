<?php
session_start();

// initializing variables
$errors = array();

// connect to the database
require "conn.php";

// REGISTER USER
if (isset($_POST['reg-knapp'])) {

    // receive all input values from the form
    $fnavn = mysqli_real_escape_string($conn, $_POST['navn']);
    $epost = mysqli_real_escape_string($conn, $_POST['epost']);
    $passord = mysqli_real_escape_string($conn, $_POST['passord']);
    $bpassord = mysqli_real_escape_string($conn, $_POST['bekreft-passord']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fnavn)) { array_push($errors, "Fornavn kreves"); }
  if (empty($epost)) { array_push($errors, "Epost kreves"); }
  if (empty($passord)) { array_push($errors, "Passord kreves"); }
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

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = password_hash($passord, PASSWORD_DEFAULT); ;//encrypt the password before saving in the database
  	$query = "INSERT INTO person (navn, epost) VALUES ('$fnavn', '$epost')";
  	$query2 = "INSERT INTO innlogging (epost, passord) VALUES ('$epost', '$password')";
    if ($conn->query($query) === TRUE && $conn->query($query2) === TRUE) {
      $_SESSION['fnavn'] = $fnavn;
      $_SESSION['success'] = "Du er nå registrert";
      header('location: login.php?registrert');
    } else {
      array_push($errors, "Databasefeil");
      }

  }
}
