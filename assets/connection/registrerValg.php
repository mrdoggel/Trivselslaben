<?php
session_start();
$id = $_SESSION['id'];
$quiz = $_POST['quiz'];
$spm = $_POST['spørsmål'];
$spmMinusEn = $spm - 1;
$antRett = $_POST['ant'];
$riktigValg = 0;
require "conn.php";

$sql = $conn->prepare("SELECT alternativ_id FROM alternativ_i_spørsmål WHERE spørsmål_id = $spmMinusEn AND riktig = 1");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $riktigForrigeValg = $row['alternativ_id'];
}

$sql = $conn->prepare("SELECT alternativ_id FROM person_valgt_alternativ WHERE person_id = $id AND quiz_id = $quiz AND spørsmål_id = $spmMinusEn");
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['alternativ_id'] == $riktigForrigeValg) {
        $forrigeVarRiktig = true;
    } else {
        $forrigeVarRiktig = false;
    }
}

//Hvis og bare hvis noen av knappene på quiz er trykket
if (isset($_POST['spm-btn-neste']) || isset($_POST['spm-btn-fullfør'])) {

    if (!empty($_POST['alternativ'])) {
        $alt = $_POST['alternativ'];
        $sql = $conn->prepare("SELECT * FROM alternativ_i_spørsmål WHERE tekst LIKE '$alt'");
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $valg = $row['alternativ_id'];
            }
        }
        $sql = $conn->prepare("SELECT * FROM alternativ_i_spørsmål WHERE spørsmål_id = $spm AND riktig = 1");
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $riktigValg = $row['alternativ_id'];
        }

        $sql = $conn->prepare("SELECT alternativ_id FROM person_valgt_alternativ WHERE person_id = $id AND quiz_id = $quiz AND spørsmål_id = $spm");
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $forrigeValg = $row['alternativ_id'];
            if ($forrigeValg == $riktigValg) {
                if ($valg != $riktigValg) {
                    $antRett = $antRett;
                } else {
                    $antRett++;
                }
            } else {
                if ($valg == $riktigValg) {
                    $antRett++;
                } else {
                    $antRett = $antRett;
                }
            }
            $sql = $conn->prepare("UPDATE person_valgt_alternativ SET alternativ_id = ? WHERE person_id = ? AND quiz_id = ? AND spørsmål_id = ?");
            $sql->bind_param("ssss", $valg, $id, $quiz, $spm);
            if ($sql->execute() === TRUE) {
                if (isset($_POST['spm-btn-neste'])) {
                    $newspm = $spm+1;
                    header("location: ../../quiz.php?quiz=$quiz&spm=$newspm&ant=$antRett");
                }
                if (isset($_POST['spm-btn-fullfør'])) {
                    header("location: regPoeng.php?quiz=$quiz&ant=$antRett");
                }

            }
        } else {
            if ($valg == $riktigValg) {
                $antRett++;
            } else {
                $antRett = $antRett;
            }
            $sql = $conn->prepare("INSERT INTO person_valgt_alternativ (person_id, quiz_id, spørsmål_id, alternativ_id) VALUES (?,?,?,?)");
            $sql->bind_param("ssss", $id, $quiz, $spm, $valg);
            if ($sql->execute() === TRUE) {
                if (isset($_POST['spm-btn-neste'])) {
                    $newspm = $spm+1;
                    header("location: ../../quiz.php?quiz=$quiz&spm=$newspm&ant=$antRett");
                }
                if (isset($_POST['spm-btn-fullfør'])) {
                    header("location: regPoeng.php?quiz=$quiz&ant=$antRett");
                }

            }
        }
    } else {
        if (isset($_POST['spm-btn-neste'])) {
            $newspm = $spm+1;
            header("location: ../../quiz.php?quiz=$quiz&spm=$newspm&ant=$antRett");
        }
        if (isset($_POST['spm-btn-fullfør'])) {
            header("location: regPoeng.php?quiz=$quiz&ant=$antRett");
        }
    }
} else {
    if ($forrigeVarRiktig) {
        if ($antRett > 0) {
            $antrett--;
        } else {
            $antRett = $antRett;
        }
    }
    $newspm = $spm-1;
    header("location: ../../quiz.php?quiz=$quiz&spm=$newspm&ant=$antRett");
}

?>