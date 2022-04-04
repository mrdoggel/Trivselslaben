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
    <link rel="stylesheet" href="assets/css/common/header.css">
    <link rel="stylesheet" href="assets/css/common/top-nav.css">
    <link rel="stylesheet" href="assets/css/forside.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
        require "assets/reuse/navbar.php";
        require "assets/reuse/top-nav.php";
    ?>

    <main>
        <div id="section-container-search">
        <section>
                <?php
                    require "assets/reuse/hentSøk.php";
                ?>
        </section>

        <section class="moduler">
            <h2>Toppvalg basert på dine interesser</h2>
            <div class="scrollmenu">
                <?php
                    require "assets/reuse/hentInteresser.php";
                ?>
            </div>
        </section>
        </div>
    </main>

</body>
</html>