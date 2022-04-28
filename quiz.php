<?php
    session_start();
    require "assets/reuse/sessionSjekk.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forside - Oversikt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/common/reset.css">
    <link rel="stylesheet" href="assets/css/common/global.css">
    <link rel="stylesheet" href="assets/css/quiz.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="assets/js/økonomiquiz.js"></script>
</head>

<body>
    <header>
        <?php
            require "assets/reuse/navbar.php";
            require "assets/reuse/top-nav.php";
            $id = $_SESSION["id"];

            if (isset($_GET['ant'])) {
                $antRett = $_GET['ant'];
            } else {
                $antRett = 0;
            }
            if (isset($_GET['quiz'])) {
                $quizid = $_GET['quiz'];
            }
            if (isset($_GET['spm'])) {
                $spm = $_GET['spm'];
            }
        ?>
    </header>

    <main class="main-quiz">
        <?php
        if (!isset($spm)) {
            $spm = 1;
            require "assets/reuse/hentSpm.php";
        } else {
            require "assets/reuse/hentSpm.php";
        }
        ?>
    </main>
</body>
</html>