<?php
session_start();
require "conn.php";
$id = $_SESSION['id'];
$quiz = $_GET['quiz'];
$antRett = $_SESSION['antRett'];
$antSvart = $_SESSION['svar'];
$dato = date("Y-m-d");
//Hent antall spørsmål og poeng i quizen
$sql = $conn->prepare("SELECT antall_spørsmål, quizpoeng FROM quiz WHERE quiz_id = $quiz");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $antallSpørsmål = $row['antall_spørsmål'];
    $poeng = $row['quizpoeng'];
}
//Finn om brukeren allerede har svart på denne quizen
$sql = $conn->prepare("SELECT * FROM person_i_quiz WHERE person_id = $id AND quiz_id = $quiz");
$sql->execute();
$result = $sql->get_result();
//Hvis det er noen svar
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    //Hvis quizen ikke allerede har gitt poeng
    if ($row['antall_svart'] != $antallSpørsmål) {
        //Hvis brukeren fullførte quizen
        if ($antSvart == $antallSpørsmål) {
            if ($antRett > $antallSpørsmål / 2) {
                //Oppdater den allerede opprettede raden + poeng
                $sql = $conn->prepare("UPDATE person_i_quiz SET antall_rette = ?, fullført_dato = ?, antall_svart = ? WHERE person_id = ? AND quiz_id = ?");
                $sql->bind_param("sssss", $antRett, $dato, $antSvart, $id, $quiz);
                if($sql->execute()) {
                    $sql = $conn->prepare("UPDATE person SET poeng = poeng + ? WHERE person_id = $id");
                    $sql->bind_param("s", $poeng);
                    if($sql->execute()) {
                        $_SESSION['poeng'] = $_SESSION['poeng'] + $poeng;
                        header("location: ../../quiz-fullført.php?quiz=$quiz");
                    }
                }
            } else {
                //Oppdater den allerede opprettede raden
                $sql = $conn->prepare("UPDATE person_i_quiz SET antall_rette = ?, antall_svart = ? WHERE person_id = ? AND quiz_id = ?");
                $sql->bind_param("ssss", $antRett, $antSvart, $id, $quiz);
                if($sql->execute()) {
                    header("location: ../../quiz-fullført.php?quiz=$quiz");
                }
            }

        //Hvis brukeren ikke fullførte quizen
        } else {
            //Oppdater den allerede opprettede raden
            $sql = $conn->prepare("UPDATE person_i_quiz SET antall_rette = ?, antall_svart = ? WHERE person_id = ? AND quiz_id = ?");
            $sql->bind_param("ssss", $antRett, $antSvart, $id, $quiz);
            if($sql->execute()) {
                header("location: ../../quiz-fullført.php?quiz=$quiz");
            }
        }
    //Hvis quizen allerede har gitt poeng
    } else {
        //Oppdater den allerede opprettede raden uten fullført dato og uten poeng
        $sql = $conn->prepare("UPDATE person_i_quiz SET antall_rette = ?, antall_svart = ? WHERE person_id = ? AND quiz_id = ?");
        $sql->bind_param("ssss", $antRett, $antSvart, $id, $quiz);
        if($sql->execute()) {
            header("location: ../../quiz-fullført.php?quiz=$quiz");
        }
    }
//Hvis quizen ikke er svart på fra før
} else {
    //Hvis brukeren fullførte quizen
    if ($antSvart == $antallSpørsmål) {
        if ($antRett > $antallSpørsmål / 2) {
            $sql = $conn->prepare("INSERT INTO person_i_quiz (person_id, quiz_id, antall_rette, fullført_dato, antall_svart) VALUES (?,?,?,?,?)");
            $sql->bind_param("sssss", $id, $quiz, $antRett, $dato, $antSvart);
            if($sql->execute()) {
                $sql = $conn->prepare("UPDATE person SET poeng = poeng + ? WHERE person_id = $id");
                $sql->bind_param("s", $poeng);
                if($sql->execute()) {
                    $_SESSION['poeng'] = $_SESSION['poeng'] + $poeng;
                    header("location: ../../quiz-fullført.php?quiz=$quiz");
                }
            }
        } else {
            //Oppdater den allerede opprettede raden
            $sql = $conn->prepare("UPDATE person_i_quiz SET antall_rette = ?, antall_svart = ? WHERE person_id = ? AND quiz_id = ?");
            $sql->bind_param("ssss", $antRett, $antSvart, $id, $quiz);
            if($sql->execute()) {
                header("location: ../../quiz-fullført.php?quiz=$quiz");
            }
        }

    //Hvis brukeren ikke fullførte quizen
    } else {
        $sql = $conn->prepare("INSERT INTO person_i_quiz (person_id, quiz_id, antall_rette, antall_svart) VALUES (?,?,?,?)");
        $sql->bind_param("ssss", $id, $quiz, $antRett, $antSvart);
        if($sql->execute()) {
            header("location: ../../quiz-fullført.php?quiz=$quiz");
        }
    }
}

?>