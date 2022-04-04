<?php
    session_start();
    require "assets/reuse/sessionSjekk.php";
?>
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
  <link rel="stylesheet" href="assets/css/common/side-nav.css">
  <link rel="stylesheet" href="assets/css/forside.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="assets/js/top-nav.js"></script>
  <script src="assets/js/utforsk-nav.js"></script>
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
                <li><a href="påbegynt.php">Påbegynt</a></li>
                <li class="side-nav-valgt"><a href="fullført.php">Fullført</a></li>
            </ul>
        </nav>

  <div id="section-container">
  <section>
    <?php require "assets/reuse/hentFullført.php"; ?>
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