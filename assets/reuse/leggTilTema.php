<?php
if (isset($_POST["tema-knapp"])) {
    require "../connection/conn.php";
    session_start();
    $tema = $_POST['tema-knapp'];
    $id = $_SESSION['id'];
    $sql = $conn->prepare("INSERT INTO person_i_tema (person_id, tema_id) VALUES (?, ?)");
    $sql->bind_param("ss", $id, $tema);
    if ($sql->execute() === TRUE) {
        header('location: ../../minside.php?side=2');
    } else {
        echo "Error inserting record: " . $conn->error;
    }
} else {
    header('location: ../../minside.php');
}
?>