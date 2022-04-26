<?php
session_start();
$id = $_SESSION['id'];
$quiz = $_POST['quiz'];
$spm = $_POST['spørsmål'];
$spmMinusEn = $spm - 1;
$antRett = $_POST['ant'];
$nyttSvar = 0;
$svart = $_POST['svart'];


$riktigValg = 0;
require "conn.php";

//Hvis og bare hvis noen av knappene på quiz er trykket
if (isset($_POST['spm-btn-tilbake']) || isset($_POST['spm-btn-neste']) || isset($_POST['spm-btn-fullfør']) || isset($_POST['spm-btn-senere'])) {

    //om spørsmål er svart på
    if (!empty($_POST['alternativ'])) {
        $alt = $_POST['alternativ'];
        $nyttSvar = $svart + 1;
        //Finn hvilken id alternativet har
        $sql = $conn->prepare("SELECT * FROM alternativ_i_spørsmål WHERE tekst LIKE '$alt'");
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $valg = $row['alternativ_id'];
            }
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
                    $antRett--;
                //Hvis det nye valget er riktig
                } else {
                }
            //Hvis bruker allerede har svart og det var feil
            } else {
                //Hvis det nye valget er riktig
                if ($valg == $riktigValg) {
                    $antRett++;
                //Hvis det nye valget ikke er riktig
                } else {
                    $antRett = $antRett;
                }
            }
            //Oppdater brukerens svar i database
            $sql = $conn->prepare("UPDATE person_valgt_alternativ SET alternativ_id = ? WHERE person_id = ? AND quiz_id = ? AND spørsmål_id = ?");
            $sql->bind_param("ssss", $valg, $id, $quiz, $spm);
            if ($sql->execute() === TRUE) {
                if (isset($_POST['spm-btn-tilbake'])) {
                    $newspm = $spm-1;
                    header("location: ../../quiz.php?quiz=$quiz&spm=$newspm&ant=$antRett&svart=$nyttSvar");
                }
                if (isset($_POST['spm-btn-neste'])) {
                    $newspm = $spm+1;
                    header("location: ../../quiz.php?quiz=$quiz&spm=$newspm&ant=$antRett&svart=$nyttSvar");
                }
                if (isset($_POST['spm-btn-fullfør'])) {
                    header("location: regPoeng.php?quiz=$quiz&ant=$antRett&svart=$nyttSvar");
                }
                if (isset($_POST['spm-btn-senere'])) {
                    header("location: regPoeng.php?quiz=$quiz&ant=$antRett&svart=$nyttSvar");
                }

            }
        //Hvis bruker ikke har svart på spørsmålet
        } else {
            //Hvis det nye valget er riktig
            if ($valg == $riktigValg) {
                $antRett++;
            //Hvis det nye valget ikke er riktig
            } else {
                $antRett = $antRett;
            }
            //Sett inn brukerens svar i database
            $sql = $conn->prepare("INSERT INTO person_valgt_alternativ (person_id, quiz_id, spørsmål_id, alternativ_id) VALUES (?,?,?,?)");
            $sql->bind_param("ssss", $id, $quiz, $spm, $valg);
            if ($sql->execute() === TRUE) {
                if (isset($_POST['spm-btn-tilbake'])) {
                    $newspm = $spm-1;
                    header("location: ../../quiz.php?quiz=$quiz&spm=$newspm&ant=$antRett&svart=$nyttSvar");
                }
                if (isset($_POST['spm-btn-neste'])) {
                    $newspm = $spm+1;
                    header("location: ../../quiz.php?quiz=$quiz&spm=$newspm&ant=$antRett&svart=$nyttSvar");
                }
                if (isset($_POST['spm-btn-fullfør'])) {
                    header("location: regPoeng.php?quiz=$quiz&ant=$antRett&svart=$nyttSvar");
                }
                if (isset($_POST['spm-btn-senere'])) {
                    header("location: regPoeng.php?quiz=$quiz&ant=$antRett&svart=$nyttSvar");
                }
            }
        }
    //Hvis det ikke er noe svar
    } else {
        if (isset($_POST['spm-btn-tilbake'])) {
            $newspm = $spm-1;
            header("location: ../../quiz.php?quiz=$quiz&spm=$newspm&ant=$antRett&svart=$nyttSvar");
        }
        if (isset($_POST['spm-btn-neste'])) {
            $newspm = $spm+1;
            header("location: ../../quiz.php?quiz=$quiz&spm=$newspm&ant=$antRett&svart=$nyttSvar");
        }
        if (isset($_POST['spm-btn-fullfør'])) {
            header("location: regPoeng.php?quiz=$quiz&ant=$antRett&svart=$nyttSvar");
        }
        if (isset($_POST['spm-btn-senere'])) {
            header("location: regPoeng.php?quiz=$quiz&ant=$antRett&svart=$nyttSvar");
        }
    }
//Hvis tilbake knappen er trykket
} else {
    header("location: ../../forside.php");
}

?>