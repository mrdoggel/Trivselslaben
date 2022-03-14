<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forside - Oversikt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/global.css">
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
                <li><a class="active" href="forside.php">Oversikt</a></li>
                <li><a href="påbegynt.php">Påbegynt</a></li>
                <li><a href="fullført.php">Fullført</a></li>
            </ul>
        </nav>

        <section>
            <h1>Kom i gang med disse kursene</h1>
            
            <div id="kurs1" class="kurs">
                <h4>KURS</h4>
                <img src="assets/media/lightbulb.jpg" alt="lightbulb">
                <div class="bottom"><p>Fra idé til konsept - vil konseptet overleve?</p></div>
            </div>

            <div id="kurs2" class="kurs">
                <h4>KURS</h4>
                <img src="assets/media/notepad.png" alt="notepad">
                <div class="bottom"><p>Hvor må jeg registrere bedriften min?</p></div>
            </div>

            <div id="kurs3" class="kurs">
                <h4>KURS</h4>
                <img src="assets/media/internett.png" alt="internet">
                <div class="bottom"><p>Domene - hva er det?</p></div>
            </div>

            <div id="kurs4" class="kurs">
                <h4>KURS</h4>
                <img src="assets/media/calc.png" alt="calc">
                <div class="bottom"><p>Egenkapital, investorer og regnskap - kjapt om økonomi</p></div>
            </div>
        </section>
        
        <section class="moduler">
            <h1>Utforsk modulene</h1>
            
            <div id="modul1" class="modul">
                <h4>MODUL</h4>
                <h2>Kom i gang med din egen bedrift!</h2>
                <div class="bottom">
                    <p>Alt du trenger å vite for å komme i gang med din bedrift. Er idéen mulig å utføre? Hvor starter man Hvem må vite hva?</p>
                </div>
            </div>
                
            <div id="modul2" class="modul">
                <h4>MODUL</h4>
                <h2>Hvordan videreutvikle et konsept?</h2>
                <div class="bottom">
                    <p>Hvordan skape de beste idéene? Hva skal til for et lønnsomt konsept og hvordan unngår du at konseptet dør ut?</p>
                </div>
            </div>
                
            <div id="modul3" class="modul">
                <h4>MODUL</h4>
                <h2>Inntekter, utgifter, lønn og regnskap - hva gjør jeg?</h2>
                <div class="bottom">
                    <p>Økonomi kan virke som en uoverkommelig oppgave, men det behøver ikke være det. Lær hva du må gjøre og hvordan.</p>
                </div>
            </div>
        </section>
    </main>

</body>
</html>