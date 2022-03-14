<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Forside - Fullført</title>
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
  
  <nav>
    <ul>
      <li><a href="forside.php">Oversikt</a></li>
      <li><a href="påbegynt.php">Påbegynt</a></li>
      <li><a class="active" href="fullført.php">Fullført</a></li>
    </ul>
  </nav>

  <section>
    <h1>Her finner du fullførte moduler, kurs og quizer - hvis du trenger en oppfriskning</h1>
    
    <div class="fullført">
      <h4>KURS</h4>
      <div class="circle-wrap1">
        <div class="circle1">
          <div class="mask1 full1">
            <div class="fill1"></div>
          </div>
          <div class="mask1 half1">
            <div class="fill1"></div>
          </div>
          <div class="inside-circle1"> 100% </div>
        </div>
      </div>
      <div class="poeng">
        <h6>Opptjente poeng: <span>25</span></h6>
        <h6>Fullført: <span>20.02</span></h6>
      </div>
      <div class="bottom">
        <p>Hvordan minimere faste utgifter</p>
      </div>
    </div>
  </section>
    
  <section>
    <h1>Toppvalg basert på dine interesser</h1>

    <div id="kurs1" class="kurs">
      <h4>KURS</h4>
      <img src="assets/media/lightbulb.jpg"></img>
      <div class="bottom">
        <p>Fra idé til konsept - vil konseptet overleve?</p>
      </div>
    </div>
    
    <div id="kurs2" class="kurs">
      <h4>KURS</h4>
      <img src="assets/media/notepad.png"></img>
      <div class="bottom">
        <p>Hvor må jeg registrere bedriften min?</p>
      </div>
    </div>
    
    <div id="modul2" class="modul">
      <h4>MODUL</h4>
      <h2>Hvordan videreutvikle et konsept?</h2>
      <div class="bottom">
        <p>Hvordan skape de beste idéene?<br>Hva skal til for et lønnsomt konsept og hvordan unngår du at konseptet dør ut?</p>
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

</body>
</html>