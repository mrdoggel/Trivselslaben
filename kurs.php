<?php
    session_start();
    require "assets/reuse/sessionSjekk.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="assets/css/common/reset.css"/>
    <link rel="stylesheet" href="assets/css/common/global.css"/>
    <link rel="stylesheet" href="assets/css/ASKurs.css"/>
    <script src="assets/js/ASKurs.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hvordan starte aksjeselskap</title>
</head>
<body>
    <?php
        require "assets/reuse/navbar.php";
        require "assets/reuse/top-nav.php"; 
    ?>
        
    <main> 
    <div id="kurs-startside">
        <div class="kurs-velkommen">
            <h1>Hei <?php echo $_SESSION['fnavn'];?>!</h1>
            <h3>Du starter nå kurset</h3>
            <!--#TODO - Sette inn kursnavn, beskrivelse, poeng, varighet og hvilke moduler det hører til (hvis noen) -->
            <?php
                echo "<h2>";
                    require "assets/reuse/hentKursNavn.php";
                echo "</h2>";
                require "assets/reuse/hentKursBesk.php";
            ?>

        </div>

        <div class="om-kurset">
            <div class="kurs-info">
                <dl>
                    <dt>Kurset inngår i følgende moduler:</dt>
                    <?php require "assets/reuse/hentKursIModul.php"; ?>
                    <dt>Repetisjonsmuligheter:</dt>
                    <dd>Aksjeselskap</dd>
                    <dd>Egenkapital og investering</dd>
                </dl>
            </div>

            <div class="kurs-info">
                <dl>
                    <dt>Varighet:</dt>
                    <?php require "assets/reuse/hentKursVarighet.php"; ?>
                    <dt>Poeng:</dt>
                    <?php require "assets/reuse/hentKursPoeng.php"; ?>
                </dl> 
            </div>
        </div>
        <button id="start-kurs">Start kurset</button>
        <form method ="post" action="assets/connection/lagreKurs.php">
            <?php echo '<input type="hidden" name="kurs" value="'; echo $_GET['kurs']; echo '"></input>'; ?>
            <button type="submit" name="kurs_knapp" id="lagre-btn">- Lagre til senere -</button>
        </form>
    </div>

    <div id="kurs-container">
        <div id="info-div">
            <h1><span>
                <?php require "assets/reuse/hentKursNavn.php" ?>
            </span></h1>
            <div id="beskrivelse">
                <div>
                    <?php require "assets/reuse/hentKursBeskrivelse.php" ?>
                </div>
                <ul>
                    <li class="naviger">Introduksjon</li>
                    <li class="naviger">Fordeler og ulemper</li>
                    <li class="naviger">Ting å tenke på</li>
                    <li class="naviger">Forutsetninger</li>
                    <li class="naviger">Slik oppretter du AS</li>
                </ul>
            </div>
        </div>
            
        <article id="intro">
            <h2 class="under-overskrift" id="introduksjon">Introduksjon</h2>
            <div class="innhold" >
                <?php require "assets/reuse/hentKursIntro.php"; ?>
            </div>
        </article>
            
        <article id="fordeler">
            <h2 class="under-overskrift" id="fordeler-ulemper">Fordeler og ulemper</h2>
            <div class = "innhold">
                <div class="tabell">
                    <table>
                    <tr id="span">
                    <th>Fordeler</th>
                    <th>Ulemper</th>
                    <?php require "assets/reuse/hentKursFordelUlempe.php" ?>
                </table>
                </div>
            </div>
        </article>
            
        <article id="tingÅTenkePå">
            <h2 class="under-overskrift" id="tenk-på">Viktige ting å tenke på</h2>
            <div class = "innhold">
                <?php require "assets/reuse/hentKursTenk.php"; ?>
            </div>
        </article>
            
        <article id="forutsetninger">
            <h2 class="under-overskrift" id="forutsetninger">Forutsetninger</h2>
            <div class ="innhold">
                <ul>
                    <?php require "assets/reuse/hentKursForutsetning.php"; ?>
                </ul>
            </div>
        </article>
        <?php //if ($_GET['kurs'] == 29) { ?>
        <article id="opprette">
                <h2 class="under-overskrift" id="opprette">Slik oppretter du AS</h2>
            
                <div class="guide">

                <div class="steg-for-steg">
                    
                    <div class="steg fade" id="første-slide">
                        <div class="text">
                            <p>
                                1. For å stifte et AS må du først fylle ut og signere
                                </br>
                                <a target="_blank" href="https://www.altinn.no/skjemaoversikt/bronnoysundregistrene/stiftelse-av-aksjeselskap/">
                                    dette skjemaet
                                </a>
                                hos Altinn
                            </p>
                        </div>
                    </div>

                    <div class="steg fade">
                        <div class="text">
                            <p>
                                2. <span>Opprett aksjekapitalkonto</span> i banken og  <span>betal aksjekapitalen</span> på minimum 30 000 NOK
                                </br>
                                Husk å be om bekreftelse fra banken!
                            </p>
                        </div>
                    </div>

                    <div class="steg fade">
                        <div class="text">
                            <p>
                                3. <span>Send melding til signering.</span>
                                </br>
                                Hele styret, samt den som har avgitt bekreftelse på at aksjekapitalen er innbetalt og eventuell revisor, må signere meldingen elektronisk.</p>
                        </div>
                    </div>

                    <div class="steg fade">
                        <div class="text">
                            <p>
                                4. Du vil nå <span>motta en melding</span> på Altinn 
                                </br>
                                Følg lenken <span>"Gå til registrering i Foretaksregisteret"</span>. Følgende må vedlegges:
                                <ul class="vedlegg-liste">
                                    <li><span>Bekreftelse på innbetalt aksjekapital</span></li>
                                    <li><span>Eventuell redegjørelse ved tingsinnskudd</span></li>
                                    <li><span>Revisors bekreftelse</span></li>
                                </ul>
                                </p>
                            </div>
                        </div>
                        <div class="steg fade">
                            <div class="text">
                                <p>
                                    5. <span>Du har nå registrert ditt AS!</span>
                                    </br>
                                    <p>
                                        Når alt er godkjent og selskapet offisielt er registrert får du melding i Altinn
                                    <p>
                            </div>
                        </div>

                        
                    </div>
                    <a class="forrige">&#8592;</a>
                        
                        <a class="neste">&#8594;</a>
                    <div class="dotter">
                        <span class="dot" id="slide-en"></span>
                        <span class="dot" id="slide-to"></span>
                        <span class="dot" id="slide-tre"></span>
                        <span class="dot" id="slide-fire"></span>
                        <span class="dot" id="slide-fem"></span>
                    </div>
                </div>
            </article>
            <button id="til-toppen">Til toppen</button>
        <?php //} ?>
        </div>
    </main>
</body>
</html>