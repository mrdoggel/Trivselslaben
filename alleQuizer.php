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
    <link rel="stylesheet" href="assets/css/alleQuizer.css">
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
        <form action="alleQuizer.php" method="post">
        <?php 
            require "assets/reuse/filter.php";
            if (isset($_POST['filter-knapp']))  {
                require "assets/reuse/hentFiltrertQuiz.php";
            } else {
                require "assets/reuse/hentQuiz.php";
            }

        ?>
    </main>

</body>
</html>