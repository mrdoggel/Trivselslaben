<?php
require "../connection/conn.php";
session_start();
$tema = $_POST['tema'];
$id = $_SESSION['id'];
$sql = $conn->prepare("DELETE FROM person_i_tema WHERE tema_id = $tema AND person_id = $id");
$sql->execute();
if ($sql->execute() === TRUE) {
    header('location: ../../minside.php');
} else {
    echo "Error deleting record: " . $conn->error;
}
?>