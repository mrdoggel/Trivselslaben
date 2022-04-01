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
    <link rel="stylesheet" href="assets/css/common/side-nav.css">
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
                <!-- class="forside-valg"-->
                <li class="side-nav-valgt"><a class="" href="forside.php">Utforsk alle</a></li>
                <li><a href="påbegynt.php">Påbegynt</a></li>
                <li><a href="fullført.php">Fullført</a></li>
            </ul>
        </nav>

        <div id="section-container">
        <section>
            <h2>Mest populære kurs denne uken</h2>
            <div class="scrollmenu">
                <?php
                require "assets/reuse/hentKurs.php";
            ?>
            </div>
        </section>
        
        <section class="moduler">
            <h2>Mest populære moduler i dag</h2>
            <div class="scrollmenu">
                <?php
                require "assets/reuse/hentModul.php";
                ?>
            </div>
        </section>
        </div>
    </main>

</body>
</html>