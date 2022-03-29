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
    <link rel="stylesheet" href="assets/css/forside.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
      <?php
          require "assets/reuse/navbar.php";
      ?>
    </header>
    <main>
    <nav>
        <ul>
          <li> <a href="forside.php">Alle</a></li>
          <li><a class="active" href="påbegynt.php">Påbegynt</a></li>
          <li><a href="fullført.php">Fullført</a></li>
        </ul>
    </nav>

    <section>

        <h1>Her finner du kurs, quizer, videoer og annet du ikke rakk å fullføre</h1>
        
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
        <h1>Toppvalg basert på dine interesser</h1>
        <?php
            require "assets/reuse/hentInteresser.php";
        ?>
    </section>
    </main>
</body>
</html>