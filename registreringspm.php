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
            <p class="spm spm-2 hidden">Hva slags organisasjonsform passer best for deg?</p>
            <p class="spm spm-3 hidden">Hva slags temaer er du interessert i?</p>
        </header>
        <main>
            <div id="spm-prosess" class="prossess-div">
                <button class="info-container en"><span class="valg valg1">Jeg har en idé - det er det</span></button>
                <button class="info-container to"><span class="valg valg2">Jeg er i gang med oppstarten</span></button>
                <button class="info-container tre"><span class="valg valg3">Jeg er godt i gang</span></button>
            </div>
            
            <div id="hidden" class="bedrift-div"><!-- spm-bedrift -->
                <p><span>Hold muspekeren over for å lese beskrivelsene og velg den du tenker er mest relevant for deg.</span></p>
                
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
                        <button>Jeg skal starte ANS</button>
                        <a href="https://www.altinn.no/starte-og-drive/starte/valg-av-organisasjonsform/ansvarlig-selskap/">Les mer om ansvarlig selskap her</a>
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
                        <button>Jeg skal starte SA</button>
                        <a href="https://www.altinn.no/starte-og-drive/starte/valg-av-organisasjonsform/samvirkeforetak/">Les mer om ansvarlig selskap her</a>
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
                        <button>Jeg skal starte SB</button>
                        <a href="https://www.ue.no/program/studentbedrift">Les mer om ansvarlig selskap her</a>
                    </div>
                </article>

                <article id="bedrift4" class="bedrifttype">
                    <h1>Enkeltmannsfortetak (ENK)</h1>
                    <div class="hidden">
                        <p>
                        Skal du drive for deg selv, ha muligheten til å komme raskt opp og vil ha en selskapsform som er enkelt å etablere? 
                        Enkeltmannsforetak er en selskapsform med lite formaliteter og gir deg fri mulighet til å bruke pengene i selskapet som du vil. 
                        Selskapet ditt og deg sees under ett.
                        </p>
                        <ul>
                            <li><span>Levetid:</span> Ingen begrensning</li>
                            <li><span>Antall eiere:</span> 1</li>
                            <li><span>Omsetningsgrense:</span> Ingen grense</li>
                            <li><span>Kapitalkrav:</span> Ingen</li>
                        </ul>
                        <button>Jeg skal starte ENK</button>
                        <a href="https://www.altinn.no/starte-og-drive/starte/valg-av-organisasjonsform/enkeltpersonforetak/">Les mer om ansvarlig selskap her</a>
                    </div>
                </article>

                <!--<article id="bedrift5" class="bedrifttype">
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
                        <a href="https://www.altinn.no/starte-og-drive/starte/valg-av-organisasjonsform/ansvarlig-selskap/">Les mer om ansvarlig selskap her</a>
                    </div>
                </article>-->

                <article id="bedrift6" class="bedrifttype">
                    <h1>Aksjeselskap (AS)</h1>
                    <div class="hidden">
                        <p>
                            Planlegger du å starte næringsvirksomhet alene eller sammen med andre? 
                            Innebærer næringsvirksomheten en økonomisk risiko? Vil du ha rettigheter som arbeidstaker og muligheten til at andre vil investere i selskapet ditt? 
                            Da kan aksjeselskap være en hensiktsmessig organisasjonsform. 
                        </p>
                        <ul>
                        <li><span>Levetid:</span> Ingen begrensning</li>
                            <li><span>Antall eiere:</span> Ingen begrensning, både juridiske og fysiske personer</li>
                            <li><span>Omsetningsgrense:</span> Ingen grense</li>
                            <li><span>Kapitalkrav:</span> Ingen begrensning</li>
                        </ul>
                        <button>Jeg skal starte AS</button>
                        <a href="https://www.altinn.no/starte-og-drive/starte/valg-av-organisasjonsform/aksjeselskap/">Les mer om ansvarlig selskap her</a>
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
                <form id="send-interesser" action="registrer.php" method="post"> 
                    <?php
                                for ($i = 1; $i <= 6; $i++) {
                                    $valg = "valg";
                                    $valg .= $i;
                                    echo '<input id="';
                                    echo $valg;
                                    echo '" type="hidden" name="';
                                    echo $valg;
                                    echo '" value=""></input>';
                                }
                                ?>
                    <button type="submit" class="next"> <span>Neste</span> </button>
                </form>
            </div>
        </main>
    </body>
</html>