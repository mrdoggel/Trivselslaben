<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="assets/css/common/reset.css"/>
    <link rel="stylesheet" href="assets/css/common/global.css"/>
    <link rel="stylesheet" href="assets/css/common/header.css"/>
    <link rel="stylesheet" href="assets/css/common/top-nav.css">
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
                <h1>Hei <?php //echo $_SESSION['fnavn'];?>!</h1>
                <p>Du tar nå kurset:</p>

                <!--#TODO - Sette inn kursnavn, beskrivelse, poeng, varighet og hvilke moduler det hører til (hvis noen) -->
                <h2>Hvordan starte aksjeselskap</h2>
                <p>Kurset gir en kjapp innføring i aksjeselskap som organisasjonsform, fordeler, ulemper og en enkel steg for steg guide. </p>
            </div>

            <div class="om-kurset">
                <div class="kurs-info">
                    <dl>
                        <dt>Kurset inngår i følgende moduler:</dt>
                        <dd>Organisasjonsformer og deres kjennetegn </dd>
                        <dt>Repetisjonsmuligheter:</dt>
                        <dd>Aksjeselskap</dd>
                        <dd>Egenkapital og investering</dd>
                    </dl>
                </div>

                <div class="kurs-info">
                    <dl>
                        <dt>Varighet:</dt>
                        <dd>cirka 5 minutter</dd>
                        <dt>Poeng:</dt>
                        <dd>10 poeng</dd>
                    </dl> 
                </div>
            </div>
        </div>

        <div id="kurs-container">
            <h1><span>Hvordan starte et aksjeselskap</span></h1>
            <div id="beskrivelse">
                <p>Planlegger du å starte næringsvirksomhet alene eller sammen med andre? </p>
                <p>Innebærer næringsvirksomheten en økonomisk risiko?</p> 
                <p>Vil du ha rettigheter som arbeidstaker og muligheten til at andre vil investere i selskapet ditt? </p>
                <p>Da kan aksjeselskap være en hensiktsmessig organisasjonsform.</p>
            </div>
                
            <article id="intro">
                <h2 class="under-overskrift">Introduksjon: hva er et AS?</h2>
                <div class="innhold hidden" >
                    <p>Et aksjeselskap eller et AS, er et selskap med bestemt kapital* fordelt på én eller flere andeler som kalles aksjer. Dette er den vanligste selskapsformen i næringslivet, og i 2020 var det registrert drøyt 340 000 aksjeselskap i Norge.
                    Et aksjeselskap kan du se på som en egen juridisk person og du som eier er ikke ansvarlige for mer enn den aksjekapitalen* som er innbetalt. Dette innebærer at hvis du som person har innbetalt 30 000 kroner som aksjekapital så er du i utgangspunktet ikke ansvarlig for mer enn dette.
                    Det begrensede ansvaret, fleksibiliteten og omsetteligheten av aksjene gjør at et aksjeselskap er å foretrekke dersom du planlegger etablering med flere eiere og muligheten for å få investorer til å satse penger på selskapet.
                    </p>
                </div>
            </article>
            
        <article id="fordeler">
            <h2 class="under-overskrift">Fordeler og ulemper</h2>
            <div class = "innhold hidden">
            <table>
                <tr>
                <th colspan="2">Fordeler Ulemper</th>
                </tr>
                <tr>
                <td>Begrenset personlig ansvar for selskapets forpliktelser</td>
                <td>Formaliteter</td>
                </tr>
                <tr>
                    <td>Bygge egenkapital med lavere skatt enn ENK</td>
                    <td>Arbeidsgiveravgift</td>
                </tr>
                <tr>
                    <td>Tilnærmet skattefritt utbytte til selskapsaksjonærer</td>
                    <td>Krav om aksjekapital</td>
                </tr>
                <tr>
                    <td>Mulighet til å være ansatt</td>
                    <td>Utbytteregler</td>
                </tr>
            </table>
            </div>
        </article>
            
        <article id="tingÅTenkePå">
            <h2 class="under-overskrift">Viktige ting å tenke på</h2>
            <div class = "innhold hidden">
                <p>Selv om det i teorien er mulig å starte AS med 30 000 kr er det viktig å huske på at det er en rekke kostnader forbundet ved selve oppstartsprosessen.
                    Ikke nok med at du må betale 5570 kroner (i 2021) til Brønnøysundregistrene for selve registreringen, men du vil også garantert få kostnader knyttet til utstyr, lokaler og andre administrative ting som kan dukke opp.</p>
                <p>Samt huske på at hvis du skal selge varer, må du ha penger til å kjøpe dem inn også.</p>
                <p>Lag en forretningsmodell. Illustrer  i kortform hva slags tjenester du leverer, hvem kunden er, og hvem som er konkurrentene dine. Dette kan forutsi eventuelle utfordringer for virksomheten</p>
            </div>
        </article>
            
        <article id="forutsetninger">
            <h2 class="under-overskrift">Forutsetninger</h2>
            <div class ="innhold hidden">
                <ul>
                    <li>Et aksjeselskap kan stiftes av en eller flere personer. Både fysiske personer og juridiske personer (andre aksjeselskap) kan være stiftere. </li>
                    <li>For å være stifter eller ha en annen rolle i et aksjeselskap må du ha fylt 18 år.</li>
                    <li> - Selskapet må ha en norsk forretningsadresse (det vil si en norsk fysisk adresse som oppgis med gate eller vei, husnummer, postnummer og sted. Postboksadresse godtas ikke)</li>
                </ul>
            </div>
        </article>

        <article id="opprette">
            <h2 class="under-overskrift">Slik går du frem</h2>
            
            <div id="hidden" class="guide">

                <div class="steg-for-steg">
                    
                    <div class="steg fade">
                        <div class="text">
                            <p>
                                1. For å stifte et AS må du først fylle ut og signere dette skjema
                                </br>
                                <a href="https://www.altinn.no/skjemaoversikt/bronnoysundregistrene/stiftelse-av-aksjeselskap/">
                                    dette skjema 
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
        </div>
    </main>
</body>
</html>