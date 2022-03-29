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
    <link rel="stylesheet" href="assets/css/quiz.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
        <?php
            require "assets/reuse/navbar.php";
        ?>
    </header>

    <div id="top-nav">
        <nav>
            <ul>
                <li><a href="forside.php">Utforsk</a></li>
                <li>Kurs</li>
                <li>Moduler</li>
                <li class="active"><a href="quiz.php">Quiz</a></li>
            </ul>
        </nav>
    </div>

    <main>

    </main>
</body>
</html>