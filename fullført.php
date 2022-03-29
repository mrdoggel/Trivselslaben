<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Forside - Fullført</title>
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
      require "assets/reuse/top-nav.php"
    ?>
  </header>

  <main>
  <nav>
    <h1>Utforsk</h1>
    <ul>
      <li class="forside-valg"><a href="forside.php">Utforsk alle</a></li>
      <li class="forside-valg"><a href="påbegynt.php">Påbegynt</a></li>
      <li class="forside-valg"><a class="forside-valgt" href="fullført.php">Fullført</a></li>
    </ul>
  </nav>

  <div id="section-container">
  <section>
    <h2>Her finner du alt fullført </h2>
    
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
    <h2>Toppvalg basert på dine interesser</h2>
    <?php
        require "assets/reuse/hentInteresser.php";
    ?>
  </section>
</div>
  </main>

</body>
</html>