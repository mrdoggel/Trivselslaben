<!--Comitt-->

<!--
    HER MÅ ALT STÅ SOM DET ER 

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forside - Påbegynt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/registreringspm.css">
    <script src="assets/js/registrering.js"></script>
    <!--<script src="assets/js/sendinteresser.js"></script>-->
</head>
    <body>
        <header>
            <p class="spm spm-1">Hvilket alternativ samsvarer best med hvor du er i prosessen?</p>
            <p class="spm spm-2 hidden">Hva slags bedrift passer best for deg?</p>
            <p class="spm spm-3 hidden">Hva slags temaer er du interessert i?</p>
        </header>
        <main>
            <div id="spm-prosess" class="prossess-div">
                <button class="info-container en"><span class="valg valg1">Jeg har en idé - det er det</span></button>
                <button class="info-container to"><span class="valg valg2">Jeg er i gang med oppstarten</span></button>
                <button class="info-container tre"><span class="valg valg3">Jeg er godt i gang</span></button>
            </div>
            
            <div id="hidden" class="bedrift-div"><!-- spm-bedrift -->
                <p>Nedenfor finner du en oversikt over vanlige bedriftstyper.</p>
                <p>Hold muspekeren over for å lese beskrivelsene og velg den du tenker er mest relevant for deg.</p>
                
                <article id="bedrift1" class="bedrifttype">
                    <h1>Ansvarlig selskap (ANS/DA)</h1>
                    <div class="hidden">
                        <p>Et ansvarlig selskap er et selskap hvor to eller flere eiere (deltakere) 
                            samlet eller hver for seg har et ubegrenset personlig ansvar for 
                            virksomheten. Selskapets kreditorer forholder seg i første omgang til 
                            selskapet, men kan ikke selskapet gjøre opp, så er det deltakernes ansvar
                            å gjøre opp kravene. Drives altså for eierens egen regning og risiko og er lite
                            investorvennlig. Deltakerne (eierne) kan ikke være ansatt i selskapet, men det er mulig å ha ansatte. 
                        </p>
                        <ul>
                            <li><span>Levetid:</span> ingen begrensning</li>
                            <li><span>Antall eiere:</span> minst 2</li>
                            <li><span>Omsetningsgrense:</span> ingen</li>
                            <li><span>Kapitalkrav:</span> ingen</li>
                        </ul>
                        <button>Jeg skal starte ansvarlig selskap</button>
                    </div>
                </article>

                <article id="bedrift2" class="bedrifttype">
                    <h1>Samvirkeforetak (SA)</h1>
                    <div class="hidden">
                        <p>
                        Er dere to eller flere personer som ønsker å skape deres egen arbeidsplass? Eller er dere 
                        allerede etablerte foretak som ønsker å samarbeide, for å levere bedre varer eller 
                        tjenester? Har dere behov for å løse felles oppgaver? Da kan samvirkeforetak være 
                        organisasjonsformen for dere. Det er mulig å være ansatt i foretaket. Foretaket er lite 
                        investorvennlig og kan ikke kjøpes opp av eksterne. 
                        </p>
                        <ul>
                            <li><span>Levetid:</span> ingen begrensning</li>
                            <li><span>Antall eiere:</span> minst 2</li>
                            <li><span>Omsetningsgrense:</span> ingen</li>
                            <li><span>Kapitalkrav:</span> ingen</li>
                        </ul>
                        <button>Jeg skal starte samvirkeforetak</button>
                    </div>
                </article>

                <article id="bedrift3" class="bedrifttype">
                    <h1>Studentbedrift (SB)</h1>
                    <div class="hidden">
                        <p>Studentbedrift er et pedagogisk program som gir deg som student 
                            kunnskap og ferdigheter i bedriftsetablering. Du jobber med oppstart, 
                            drift og avvikling av egen bedrift gjennom ett semester eller ett studieår. 
                            Studentbedrift planlegges og gjennomføres i samarbeid med ditt 
                            universitet, høyskole eller fagskole som en del av ditt studieprogram.
                        </p>
                        <ul>
                            <li><span>Levetid:</span> maks 12 måneder</li>
                            <li><span>Antall eiere:</span> minst 2</li>
                            <li><span>Omsetningsgrense:</span>140 000,-</li>
                            <li><span>Kapitalkrav:</span> ingen</li>
                        </ul>
                        <a href="https://www.altinn.no/starte-og-drive/starte/valg-av-organisasjonsform/ansvarlig-selskap/">Les mer om ansvarlig selskap her</a>
                        <button>Jeg skal starte studentbedrift</button>
                    </div>
                </article>

                <article id="bedrift4" class="bedrifttype">
                    <h1>Enkeltmannsfortetak (ENK)</h1>
                    <div class="hidden">
                        <p></p>
                        <ul>
                            <li><span>Levetid:</span></li>
                            <li><span>Antall eiere:</span> 1</li>
                            <li><span>Omsetningsgrense:</span>-</li>
                            <li><span>Kapitalkrav:</span></li>
                        </ul>
                        <button>Jeg skal starte enkeltmannsfortetak</button>
                    </div>
                </article>

                <article id="bedrift5" class="bedrifttype">
                    <h1>Oppstartsbedrift</h1>
                    <div class="hidden">
                        <p></p>
                        <ul>
                            <li><span>Levetid:</span></li>
                            <li><span>Antall eiere:</span></li>
                            <li><span>Omsetningsgrense:</span>-</li>
                            <li><span>Kapitalkrav:</span></li>
                        </ul>
                        <button>Jeg skal starte oppstartsbedrift</button>
                    </div>
                </article>

                <article id="bedrift6" class="bedrifttype">
                    <h1>Aksjeselskap (AS)</h1>
                    <div class="hidden">
                        <p></p>
                        <ul>
                        <li><span>Levetid:</span></li>
                            <li><span>Antall eiere:</span></li>
                            <li><span>Omsetningsgrense:</span>-</li>
                            <li><span>Kapitalkrav:</span></li>
                        </ul>
                        <button>Jeg skal starte aksjeselskap</button>
                    </div>
                </article>
            </div> 

            <div id="hidden" class="interesse-div"> <!-- spm-interesser -->
                <aside>
                    <div>
                        <p>Nå kan du velge temaer du er spesielt interessert i.</p>
                        <p>Om ikke du har noen kan du bare gå videre, og du vil naturligvis finne all informasjon senere.</p>
                    </div>
                </aside>
                <section>
                    <div class="intvalg"> 
                        <?php 
                            require "assets/connection/conn.php";
                            $sql = $conn->prepare("SELECT * FROM tema WHERE tema_id <= 6");
                            $sql->execute();
                            $result = $sql->get_result();
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo '<p class="intvalg';
                                    echo $row["tema_id"];
                                    echo '"><span>';
                                    echo $row["navn"];
                                    echo '</span></p>';
                                }
                            }
                        ?>
                    </div>
                    
                </section>
<<<<<<< HEAD
                <form id="send-interesser" action="registrer.php" method="post"> 
                    <button type"submit" class="next"> <span><a href="registrer.php" id="interessebtn">Neste</a></span> </button>
=======
                <form action="registrer.php" method="post"> 
                    <button type="submit" class="next"> <span><a href="registrer.php" id="interessebtn">Neste</a></span> </button>
>>>>>>> 9c53ac295e25d50eebc9f159bfdc1d167b7b74d4
                </form>
            </div>
        </main>
    </body>
</html>



<!-- <input type="hidden" id="valg1" name="valg1" value="">
                    <input type="hidden" id="valg2" name="valg2" value="">
                    <input type="hidden" id="valg3" name="valg3" value="">
                    <input type="hidden" id="valg4" name="valg4" value="">
                    <input type="hidden" id="valg5" name="valg5" value="">
                    <input type="hidden" id="valg6" name="valg6" value="">-->