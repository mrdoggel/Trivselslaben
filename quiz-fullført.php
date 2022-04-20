<?php
    require "assets/connection/regg.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fullført quiz</title>
    <link rel="stylesheet" href="assets/css/common/reset.css"/>
    <link rel="stylesheet" href="assets/css/common/global.css"/>
    <link rel="stylesheet" href="assets/css/common/header.css">
    <link rel="stylesheet" href="assets/css/common/top-nav.css">
    <link rel="stylesheet" href="assets/css/common/quiz-fullført.css">
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
            <h2>Du har nå fullført quizen</h2> 
            <!-- #TODO Sett inn navn på quiz her -->
            <h1>Inntekter, utgifter, lønn og regnskap</h1>

            <div>
                <!-- #TODO Sett inn animasjon her, bildet skal vekk -->
                <img src="assets/images/logo.png" alt="">
            </div>
            
            <!-- #TODO Sett inn riktig prosent og antall poeng man får for quizen -->
            <p><span>Du scoret 90% riktig og fikk 15 poeng!</span></p>
            <p id="prøv-igjen"><span>Prøv på nytt</span></p>

        </div>

        <p><span><a href="alleQuizer.php">Utforsk flere quizer</a></span></p>
        
    </main>
</body>
</html>