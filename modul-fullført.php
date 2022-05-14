<?php session_start(); ?>
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
            <h2>Du har nå fullført Modulen</h2>
            <?php
                $modul = $_GET['modul'];
                require "assets/reuse/hentModulResultat.php";
            ?>

        </div>

        <p><span><a href="alleModuler.php">Utforsk flere moduler</a></span></p>

    </main>
</body>
</html>