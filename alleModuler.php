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
    <link rel="stylesheet" href="assets/css/forside.css">
    <link rel="stylesheet" href="assets/css/common/alle-kurs-moduler.css">
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
        <?php
            $side = 2;
            require "assets/reuse/filter.php";
        ?>
        
        <div id="alle-moduler">
        <?php
            if (isset($_POST['filter-knapp']))  {
                if (isset($_POST['filterInput1'])) {
                    $otId1 = $_POST['filterInput1'];
                }
                if (isset($_POST['filterInput2'])) {
                    $otId2 = $_POST['filterInput2'];
                }
                if (isset($_POST['filterInput3'])) {
                    $otId3 = $_POST['filterInput3'];
                }
                if (isset($_POST['filterInput4'])) {
                    $otId4 = $_POST['filterInput4'];
                }
                require "assets/reuse/hentFiltrertModul.php";
            } else {
                require "assets/reuse/hentModul.php";
            }
        ?>
        </div>
    </main>

</body>
</html>