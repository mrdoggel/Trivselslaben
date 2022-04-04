<?php
    session_start();
    require "assets/reuse/sessionSjekk.php";
?>
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
    <link rel="stylesheet" href="assets/css/common/side-nav.css">
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
    <nav id="forside-nav">
            <h1>Utforsk</h1>
            <ul>
                <li><a href="forside.php">Utforsk alle</a></li>
                <li class="side-nav-valgt"><a href="påbegynt.php">Påbegynt</a></li>
                <li><a href="fullført.php">Fullført</a></li>
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
              <h3>Hvordan drive designtenkning?</h3>
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
            <h3>Start en bedrift fra A-Å</h3>
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
            <h3>SB, ENK eller AS - Hva er forskjellen?</h3>
          </div>
        </div>
        <p>Fortsett der du slapp</p>

        </div>
    </section>

    <section>
        <h2>Toppvalg basert på dine interesser</h2>
        <div class="scrollmenu">
          <?php
            require "assets/reuse/hentInteresser.php";
          ?>
        </div>
    </section>
    </div>
    </main>
</body>
</html>