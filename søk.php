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
    <link rel="stylesheet" href="assets/css/forside.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
        require "assets/reuse/navbar.php";
    ?>

    <main>
        <nav>
            <ul>
                <li><a href="forside.php">Oversikt</a></li>
                <li><a href="påbegynt.php">Påbegynt</a></li>
                <li><a href="fullført.php">Fullført</a></li>
            </ul>
        </nav>

        <section>
            <?php
                require "assets/reuse/hentSøk.php";
            ?>
        </section>

        <section class="moduler">
            <h1>Toppvalg basert på dine interesser</h1>
            <?php
                require "assets/reuse/hentInteresser.php";
            ?>
        </section>
    </main>

</body>
</html>