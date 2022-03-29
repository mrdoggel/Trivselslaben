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
    <link rel="stylesheet" href="assets/css/økonomiquiz.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="assets/js/økonomiquiz.js"></script>
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
        <form action="">
            <legend><span>Inntekter, lønn, utgifter og regnskap</span></legend>

            <div class="spm-div" id="spm-1">
                <label for="spm-arbeidsgiver">Når regnes du som arbeidsgiver?</label>
                <input id="spm-arbeidsgiver" type="hidden" name="spm-arbeidsgiver">
                <div class="svr svr-1">Når du betaler ut lønn eller annen godtgjørelse</div>
                <div class="svr svr-2">Når du eier et AS</div>
                <div class="svr svr-3">Når du starter en bedrift</div>
                <div class="svr svr-4">Når du selger en vare</div>
            </div>

        <div class="hidden">

            <div class="spm-div hidden">
                <label for="spm-budsjett">Hva inneholder et budsjett?</label>
            </div>

            <div class="spm-div hidden">
                <label for="spm-utgift">Hva er en utgift?</label>
            </div>

            <div class="spm-div hidden">
                <label for="spm-inntekt">Hva er en inntekt?</label>
            </div>

            <div class="spm-div hidden">
                <label for="spm-enk-ansatt">Som innehaver av et enkeltmannsforetak regnes du som en ansatt</label>   
            </div>

            <div class="spm-div hidden">
                <label for="spm-forretningsmodel">Hvilken av disse inngår ikke i forretningsmodellen?</label>
            </div>

            <div class="spm-div hidden">
                <label for="spm-ansettelse">Når du går i gang med å ansette noen kan det være lurt å</label>
            </div>

            <div class="spm-div hidden">
                <label for="spm-budsjettyper">Likviditetsbudsjett og resultatbudsjett er det samme</label>
            </div>

            <div class="spm-div hidden">
                <label for="">Hva er en fordel med å lage budsjett?</label>
            </div>

            <div class="spm-div hidden">
                <label for="spm-økonomi">Økonomi er et viktig tema for enhver bedrift</label>
            </div>

        </div>
        </form>
    </main>
</body>
</html>