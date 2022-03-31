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
    <link rel="stylesheet" href="assets/css/forside.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="assets/js/top-nav.js"></script>
</head>

<body>
    <header>
        <?php
            require "assets/reuse/navbar.php";
            require "assets/reuse/top-nav.php";
        ?>
    </header>
       

    <main>
        <nav id="forside-nav">
            <h1>Utforsk</h1>
            <ul>
                <li class="forside-valg"><a class="forside-valgt" href="forside.php">Utforsk alle</a></li>
                <li class="forside-valg"><a href="påbegynt.php">Påbegynt</a></li>
                <li class="forside-valg"><a href="fullført.php">Fullført</a></li>
            </ul>
        </nav>


        <div id="section-container">
        <section>
            <h2>Kom i gang med kursene</h2>
            <div class="scrollmenu">
                <!--<div><a href="#home">Home</a></div>
                <div><a href="#news">News</a></div>
                <div><a href="#contact">Contact</a></div>
                <div><a href="#about">About</a></div>-->
                <?php
                require "assets/reuse/hentKurs.php";
            ?>
            </div>
            <!--<h2>Kom i gang med disse kursene</h2>-->
            <?php//require "assets/reuse/hentKurs.php";?>
        </section>
        
        <section class="moduler">
            <h2>Utforsk modulene</h2>
            <div class="scrollmenu">
                <!--<div><a href="#home">Home</a></div>
                <div><a href="#news">News</a></div>
                <div><a href="#contact">Contact</a></div>
                <div><a href="#about">About</a></div>-->
                <?php
                require "assets/reuse/hentModul.php";
                ?>
            </div>
        </section>
        </div>
    </main>

</body>
</html>