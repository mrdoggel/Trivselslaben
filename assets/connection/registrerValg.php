<?php
session_start();
$id = $_SESSION['id'];
if (isset($_POST['spm-btn-tilbake']) || isset($_POST['spm-btn-neste']) || isset($_POST['spm-btn-fullfør'])) {
    $quiz = $_POST['quiz'];
    $spm = $_POST['spørsmål'];
    $antRett = $_POST['ant'];
    if (!empty($_POST['alternativ'])) {
        require "conn.php";
        $alt = $_POST['alternativ'];
        $sql = $conn->prepare("SELECT * FROM alternativ_i_spørsmål WHERE tekst LIKE '$alt'");
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $altNum = $row['alternativ_id'];
                if ($row['riktig'] == 1) {
                    $riktigAlt = $row['alternativ_id'];
                }
            }
        }
        $sql = $conn->prepare("SELECT * FROM person_valgt_alternativ WHERE person_id = $id AND quiz_id = $quiz AND spørsmål_id = $spm");
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row['alternativ_id'] == $riktigAlt) {
                    if ($altNum == $riktigAlt) {

                    } else {
                        if ($antRett > 0) {
                            $antRett--;
                        } else {
                            $antRett = 0;
                        }
                    }
                } else {
                    if ($altNum == $riktigAlt) {
                        if (isset($antRett)) {
                            $antRett++;
                        } else {
                            $antRett = 1;
                        }
                    } else {
                    }
                }
            }
            $sql = $conn->prepare("UPDATE person_valgt_alternativ SET alternativ_id = ? WHERE person_id = ? AND quiz_id = ? AND spørsmål_id = ?");
            $sql->bind_param("ssss", $altNum, $id, $quiz, $spm);
            if ($sql->execute() === TRUE) {
                if (isset($_POST['spm-btn-tilbake'])) {
                    $newspm = $spm-1;
                    header("location: ../../økonomiquiz.php?quiz=$quiz&spm=$newspm&ant=$antRett");
                }
                if (isset($_POST['spm-btn-neste'])) {
                    $newspm = $spm+1;
                    header("location: ../../økonomiquiz.php?quiz=$quiz&spm=$newspm&ant=$antRett");
                }
                if (isset($_POST['spm-btn-fullfør'])) {
                    header("location: ../../fullført.php?ant=$antRett");
                }

            }
        } else {
            if ($altNum == $riktigAlt) {
                if (isset($antRett)) {
                    $antRett++;
                } else {
                    $antRett = 1;
                }
            } else {
                $antRett = $antRett;
            }
            $sql = $conn->prepare("INSERT INTO person_valgt_alternativ (person_id, quiz_id, spørsmål_id, alternativ_id) VALUES (?,?,?,?)");
            $sql->bind_param("ssss", $id, $quiz, $spm, $altNum);
            if ($sql->execute() === TRUE) {
                if (isset($_POST['spm-btn-tilbake'])) {
                    $newspm = $spm-1;
                    header("location: ../../økonomiquiz.php?quiz=$quiz&spm=$newspm&ant=$antRett");
                }
                if (isset($_POST['spm-btn-neste'])) {
                    $newspm = $spm+1;
                    header("location: ../../økonomiquiz.php?quiz=$quiz&spm=$newspm&ant=$antRett");
                }
                if (isset($_POST['spm-btn-fullfør'])) {
                    header("location: ../../fullført.php?ant=$antRett");
                }

            }
        }
    } else {
        if (isset($_POST['spm-btn-tilbake'])) {
            $newspm = $spm-1;
            header("location: ../../økonomiquiz.php?quiz=$quiz&spm=$newspm&ant=$antRett");
        }
        if (isset($_POST['spm-btn-neste'])) {
            $newspm = $spm+1;
            header("location: ../../økonomiquiz.php?quiz=$quiz&spm=$newspm&ant=$antRett");
        }
        if (isset($_POST['spm-btn-fullfør'])) {
            header("location: ../../fullført.php?ant=$antRett");
        }
    }
}

?>