<?php
    session_start();
    require "assets/reuse/sessionSjekk.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fullført quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/common/reset.css"/>
    <link rel="stylesheet" href="assets/css/common/global.css"/>
    <link rel="stylesheet" href="assets/css/common/quiz-fullført.css">
    <link rel="stylesheet" href="assets/css/forside.css">
</head>
<body> 
    <header>
    <?php
        require "assets/reuse/navbar.php";
        require "assets/reuse/top-nav.php";
    ?>
    </header>

    <main>
        <div class="quiz-res-container">
           <?php require "assets/reuse/hentQuizResultat.php"; ?>
        </div>
        <p><span><a href="alleQuizer.php">Utforsk flere quizer</a></span></p>
    </main>
</body>
</html>