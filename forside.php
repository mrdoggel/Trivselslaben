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
    <link rel="stylesheet" href="assets/css/forside.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="assets/js/oversiktssider.js"></script>
</head>

<body>
    <header>
        <?php
            require "assets/reuse/navbar.php";
        ?>
    </header>

    <main>
        <nav>
            <ul>
                <li><a class="active" href="forside.php">Alle</a></li>
                <li><a href="påbegynt.php">Påbegynt</a></li>
                <li><a href="fullført.php">Fullført</a></li>
            </ul>
        </nav>
        
        <div id="top-nav">
        <nav>
                <ul>
                    <li class="active">Utforsk</li>
                    <li>Kurs</li>
                    <li>Moduler</li>
                    <li>Quiz</li>
                </ul>
            </nav>
        </div>
        
        <section>

            <h1>Kom i gang med disse kursene</h1>
            <?php
                require "assets/reuse/hentKurs.php";
            ?>
        </section>
        
        <section class="moduler">
            <h1>Utforsk modulene</h1>
            <?php
                require "assets/reuse/hentModul.php";
            ?>
        </section>
    </main>

</body>
</html>