<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forside - Oversikt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/common/reset.css">
    <link rel="stylesheet" href="assets/css/common/global.css">
    <link rel="stylesheet" href="assets/css/common/header.css">
    <link rel="stylesheet" href="assets/css/common/top-nav.css">
    <link rel="stylesheet" href="assets/css/quiz.css">
    <script src="assets/js/quiz.js"></script>
    <script src="assets/js/top-nav.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
        <?php
            require "assets/reuse/navbar.php";
            require "assets/reuse/top-nav.php"; 
        ?>
    </header>

    <main>
        <div class="quiz-div" id="quiz-1">
            <img src="assets/images/økonomi-quiz-img.jpeg" alt="quiz-img">
            <h2> <a href="økonomiquiz.php">Inntekter, lønn, utgifter og regnskap</a></h2>
            <p class="mer">&vellip;</p>
            <div class="overlap hidden">
                <p>Spill</p>
                <p>Lagre til senere</p>
            </div>
        </div>
        <div class="quiz-div" id="quiz-2">
            <img src="assets/images/suksessfull-quiz-img.png" alt="quiz-img">
            <h2><a href="#">Hva gjør en suksessfull bedrift?</a></h2>
            <p class="mer">&vellip;</p>
            <div class="overlap hidden">
                <p>Spill</p>
                <p>Lagre til senere</p>
            </div>
        </div>
        <div class="quiz-div" id="quiz-3">
            <img src="assets/images/nettverk-quiz-img.jpg" alt="quiz-img">
            <h2><a href="#">Hvem vinner kundene?</a></h2>
            <p class="mer">&vellip;</p>
            <div class="overlap hidden">
                <p>Spill</p>
                <p>Lagre til senere</p>
            </div>
        </div>
    </main>

</body>
</html>