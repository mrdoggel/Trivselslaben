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
    <link rel="stylesheet" href="assets/css/modul.css">
    <script src="assets/js/visRepetisjonInfo.js"></script>
</head>

<body>
    <header>
      <?php
          require "assets/reuse/navbar.php";
          require "assets/reuse/top-nav.php"
      ?>
    </header>
    <main>
        <div>
            <img id="modul-bilde" src="assets/images/analytics.png" alt="modul-img">
            <h2>Modul: Inntekter, lønn, utgifter og regnskap</h2>
            <nav>
                <dl>
                    <dt class="lest">1. Inntekter og utgifter</dt>
                    <dd>1.1. Inntekter</dd>
                    <dd>1.2. Utgifter</dd>

                    <dt class="lest">2. Budsjett</dt>
                    <dd>2.1. Resultatbudsjett</dd>
                    <dd>2.2. Likviditetsbudsjett</dd>
                    
                    <dt class="ikke-lest">3. Forretningsmodell</dt>
                    
                    <dt class="ikke-lest">4. Lønn</dt>
                    
                    <dt class="ikke-lest">5. Regnskap</dt>
                </dl>
            </nav>
        </div>

        <section class="hidden">
            <h2>MODUL</h2>
            <h1>Inntekter, lønn, utgifter og regnskap</h1>

            <div id="progresjon">
                <p>Din progresjon:</p>
                <img src="assets/images/logo.png" alt="logo">
                <p id="rep-spm-info">Fullfør modul for å få tilgang til repetisjonsspørsmål</p>
                <p class="hidden rep-spm-info-txt"><span>Når du fullfører denne modulen får du tilgang til oppsummeringsspørsmål</span></p>
            </div>

            <div id="om-modulen">
                <p>Denne modulen handler om økonomi. Vi går gjennom noen sentrale begreper det kan være greit å ha kjennskap til. På venstre side der du en oversiktsmeny over temaene modulen dekker. De grønne hakene viser at du har fullført den delen. Når hele er fullført får du tilgang til oppsummeringsquizen.</p>
            </div>

            <button>Kom i gang!</button>
            
        </section>

        <article>
            <h1>1. Inntekter og utgifter </h1>
            <p>Inntekter henger ofte sammen med kostnader, ved at inntekter ved salg av en vare gjerne også inkluderer kostnader for produksjon av varen. Dersom man trekker kostnader fra inntektene, får man et overskudd eller underskudd.
                Virksomheter skal utarbeide årsregnskap som viser alle virksomhetens inntekter fratrukket kostnader. Dersom virksomheten får et overskudd, kan dette tas ut som utbytte til eierne eller reinvesteres i virksomheten.
            </p>
            <button>Neste</button>
        </article>

    </main>
</body>
</html>