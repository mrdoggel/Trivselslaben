<?php
session_start();
$id = $_SESSION['id'];
$quiz = $_POST['quiz'];
$spm = $_POST['spørsmål'];
$riktigValg = 0;
require "conn.php";
$svar = $_SESSION['svar'];
$antRett = $_SESSION['antRett'];

//Hvis og bare hvis noen av knappene på quiz er trykket
if (isset($_POST['spm-btn-tilbake']) || isset($_POST['spm-btn-neste']) || isset($_POST['spm-btn-fullfør']) || isset($_POST['spm-btn-senere'])) {

    //om spørsmål er svart på
    if (!empty($_POST['alternativ'])) {
        $alt = $_POST['alternativ'];
        //Finn hvilken id alternativet har
        $sql = $conn->prepare("SELECT * FROM alternativ_i_spørsmål WHERE tekst LIKE '$alt'");
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $valg = $row['alternativ_id'];
        }
        //Finn riktig alternativ på nåværende spørsmål
        $sql = $conn->prepare("SELECT * FROM alternativ_i_spørsmål WHERE spørsmål_id = $spm AND riktig = 1");
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $riktigValg = $row['alternativ_id'];
        }
        //Sjekk om bruker allerede har svart på spørsmålet
        $sql = $conn->prepare("SELECT alternativ_id FROM person_valgt_alternativ WHERE person_id = $id AND quiz_id = $quiz AND spørsmål_id = $spm");
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $forrigeValg = $row['alternativ_id'];
            //Hvis bruker allerede har svart og det var riktig
            if ($forrigeValg == $riktigValg) {
                //Hvis det nye valget ikke er riktig
                if ($valg != $riktigValg) {
                    $_SESSION['antRett']--;
                //Hvis det nye valget er riktig
                } else {
                }
            //Hvis bruker allerede har svart og det var feil
            } else {
                //Hvis det nye valget er riktig
                if ($valg == $riktigValg) {
                    $_SESSION['antRett']++;
                //Hvis det nye valget ikke er riktig
                } else {
                }
            }
            //Oppdater brukerens svar i database
            $sql = $conn->prepare("UPDATE person_valgt_alternativ SET alternativ_id = ? WHERE person_id = ? AND quiz_id = ? AND spørsmål_id = ?");
            $sql->bind_param("ssss", $valg, $id, $quiz, $spm);
            if ($sql->execute() === TRUE) {
                if (isset($_POST['spm-btn-tilbake'])) {
                    $newspm = $spm-1;
                    header("location: ../../quiz.php?quiz=$quiz&spm=$newspm&ant=$antRett&svar=$svar");
                }
                if (isset($_POST['spm-btn-neste'])) {
                    $newspm = $spm+1;
                    header("location: ../../quiz.php?quiz=$quiz&spm=$newspm&ant=$antRett&svar=$svar");
                }
                if (isset($_POST['spm-btn-fullfør'])) {
                    header("location: regPoeng.php?quiz=$quiz&ant=$antRett&svar=$svar");
                }
                if (isset($_POST['spm-btn-senere'])) {
                    header("location: regPoeng.php?quiz=$quiz&ant=$antRett&svar=$svar");
                }

            }
        //Hvis bruker ikke har svart på spørsmålet
        } else {
            $_SESSION['svar']++;
            //Hvis det nye valget er riktig
            if ($valg == $riktigValg) {
                $_SESSION['antRett']++;
            //Hvis det nye valget ikke er riktig
            } else {
            }
            //Sett inn brukerens svar i database
            $sql = $conn->prepare("INSERT INTO person_valgt_alternativ (person_id, quiz_id, spørsmål_id, alternativ_id) VALUES (?,?,?,?)");
            $sql->bind_param("ssss", $id, $quiz, $spm, $valg);
            if ($sql->execute() === TRUE) {
                if (isset($_POST['spm-btn-tilbake'])) {
                    $newspm = $spm-1;
                    header("location: ../../quiz.php?quiz=$quiz&spm=$newspm&ant=$antRett&svar=$svar");
                }
                if (isset($_POST['spm-btn-neste'])) {
                    $newspm = $spm+1;
                    header("location: ../../quiz.php?quiz=$quiz&spm=$newspm&ant=$antRett&svar=$svar");
                }
                if (isset($_POST['spm-btn-fullfør'])) {
                    header("location: regPoeng.php?quiz=$quiz&ant=$antRett&svar=$svar");
                }
                if (isset($_POST['spm-btn-senere'])) {
                    header("location: regPoeng.php?quiz=$quiz&ant=$antRett&svar=$svar");
                }
            }
        }
    //Hvis det ikke er noe svar
    } else {
        if (isset($_POST['spm-btn-tilbake'])) {
            $newspm = $spm-1;
            header("location: ../../quiz.php?quiz=$quiz&spm=$newspm&ant=$antRett&svar=$svar");
        }
        if (isset($_POST['spm-btn-neste'])) {
            $newspm = $spm+1;
            header("location: ../../quiz.php?quiz=$quiz&spm=$newspm&ant=$antRett&svar=$svar");
        }
        if (isset($_POST['spm-btn-fullfør'])) {
            header("location: regPoeng.php?quiz=$quiz&ant=$antRett&svar=$svar");
        }
        if (isset($_POST['spm-btn-senere'])) {
            header("location: regPoeng.php?quiz=$quiz&ant=$antRett&svar=$svar");
        }
    }
//Hvis tilbake knappen er trykket
} else {
    header("location: ../../forside.php");
}

?>