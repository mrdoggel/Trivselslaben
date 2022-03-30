<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forside - Påbegynt</title>
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
          <li class="forside-valg"> <a href="forside.php">Utforsk alle</a></li>
          <li class="forside-valg"><a class="forside-valgt" href="påbegynt.php">Påbegynt</a></li>
          <li class="forside-valg"><a href="fullført.php">Fullført</a></li>
        </ul>
    </nav>

    <div id="section-container">
    <section>

        <h2>Her finner du det du ikke rakk å fullføre</h2>
        
        <div class="underveis-container">
          <div class="underveis">
            <h4>KURS</h4>
            <div class="circle-wrap">
              <div class="circle">
                <div class="mask full">
                  <div class="fill"></div>
                </div>
                <div class="mask half">
                  <div class="fill"></div>
                </div>
                <div class="inside-circle"> 26% </div>
              </div>
            </div>
            <div class="bottom">
              <p>Hvordan drive designtegning?</p>
            </div>
          </div>
          <p>Fortsett der du slapp</p>
        </div>

        <div class="underveis-container">
        
        <div class="underveis">
          <h4>QUIZ</h4>
          <div class="circle-wrap2">
            <div class="circle2">
              <div class="mask2 full2">
                <div class="fill2"></div>
              </div>
              <div class="mask2 half2">
                <div class="fill2"></div>
              </div>
              <div class="inside-circle2"> 58%</div>
            </div>
          </div>
          <div class="bottom">
            <p>Start en bedrift fra A - Å</p>
          </div>
        </div>

        <p>Fortsett der du slapp</p>

        </div>

        <div class="underveis-container">

        <div class="underveis">
          <h4>KURS</h4>
          <div class="circle-wrap3">
            <div class="circle3">
              <div class="mask3 full3">
                <div class="fill3"></div>
              </div>
              <div class="mask3 half3">
                <div class="fill3"></div>
              </div>
              <div class="inside-circle3"> 74% </div>
            </div>
          </div>
          <div class="bottom">
            <p>Studentbedrift, enkeltmannsforetak eller AS - hva er forskjellen?</p>
          </div>
        </div>
        <p>Fortsett der du slapp</p>

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