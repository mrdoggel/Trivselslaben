<?php
session_start();
$id = $_SESSION['id'];

//Hvis og bare hvis noen av knappene på quiz er trykket
if (isset($_POST['spm-btn-tilbake']) || isset($_POST['spm-btn-neste']) || isset($_POST['spm-btn-fullfør'])) {
    $quiz = $_POST['quiz'];
    $spm = $_POST['spørsmål'];
    $antRett = $_POST['ant'];
    $riktigValg = 0;
    if (!empty($_POST['alternativ'])) {
        require "conn.php";
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

        $sql = $conn->prepare("SELECT antall_rette FROM person_i_quiz WHERE person_id = $id AND quiz_id = $quiz");
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $antRett = $row['antall_rette'];
        } else {
            $antRett = $antRett;
        }
        $sql = $conn->prepare("SELECT * FROM person_valgt_alternativ WHERE person_id = $id AND quiz_id = $quiz AND spørsmål_id = $spm");
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $forrigeValg = $row['alternativ_id'];
            if ($forrigeValg == $riktigValg) {
                if ($valg != $riktigValg) {
                    if ($antRett > 0) {
                        $antRett--;
                    } else {
                        $antRett = 0;
                    }
                } else {

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
                if (isset($_POST['spm-btn-tilbake'])) {
                    $newspm = $spm-1;
                    header("location: ../../quiz.php?quiz=$quiz&spm=$newspm&ant=$antRett");
                }
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
                if (isset($_POST['spm-btn-tilbake'])) {
                    $newspm = $spm-1;
                    header("location: ../../quiz.php?quiz=$quiz&spm=$newspm&ant=$antRett");
                }
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
        if (isset($_POST['spm-btn-tilbake'])) {
            $newspm = $spm-1;
            header("location: ../../quiz.php?quiz=$quiz&spm=$newspm&ant=$antRett");
        }
        if (isset($_POST['spm-btn-neste'])) {
            $newspm = $spm+1;
            header("location: ../../quiz.php?quiz=$quiz&spm=$newspm&ant=$antRett");
        }
        if (isset($_POST['spm-btn-fullfør'])) {
            header("location: regPoeng.php?quiz=$quiz&ant=$antRett");
        }
    }
}

?>