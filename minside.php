<?php
    require "assets/connection/oppdaterProfil.php";
    require "assets/reuse/sessionSjekk.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Min side</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/common/reset.css"/>
    <link rel="stylesheet" href="assets/css/common/global.css"/>
    <link rel="stylesheet" href="assets/css/minside.css">
    <link rel="stylesheet" href="assets/css/common/side-nav.css">
    <link rel="stylesheet" href="assets/css/lagret.css">
    <script src="assets/js/quiz.js"></script>
    <script src="assets/js/top-nav.js"></script>
    <script src="assets/js/minside.js"></script>
</head>
    <!-- Hvis noe slutter å funke her tok jeg bort id="body" på body-tag -->
    <body id="body">
        <?php
            require "assets/reuse/navbar.php";
            require "assets/reuse/top-nav.php";
        ?>

        <?php
            if (isset($_GET['side'])) {
                if ($_GET['side'] == 1) {
                    require "assets/reuse/hentProfilSide.php";
                }
                if ($_GET['side'] == 2) {
                    require "assets/reuse/hentInteresseSide.php";
                }
                if ($_GET['side'] == 3) {
                    require "assets/reuse/hentLagretSide.php";
                }
            } else {
                require "assets/reuse/hentProfilSide.php";
            }



        ?>



            </section>

        </main>
    </body>
</html>