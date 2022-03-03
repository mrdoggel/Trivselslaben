<!--Comitt-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forside - Påbegynt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/forside.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="container">
    <nav id="navbar">
        <div id="searchbar">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Hva leter du etter?">
        </div>
        <div id="profil">
            <div id ="navn_poeng">
                Veronika

                125 poeng
            </div>
            <div id="profilbilde">
                <a href=""><img src="assets/media/admin.png"></img></a>
            </div>
        </div>
    </nav>
    <nav id="menubar">
        <ul>
            <a href="forside.php"><li>Oversikt</li></a>
            <a class="active" href="påbegynt.php"><li>Påbegynt</li></a>
            <a href="fullført.php"><li>Fullført</li></a>
        </ul>
    </nav>
    <div id="kurs_container">
        <h1>Her finner du kurs, quizer, videoer og annet du ikke rakk å fullføre</h1>
        <div id="progress1">
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
                <p>Hvordan drive designtegning?<br>(Trykk for å fortsette)</p>
            </div>
        </div>
        <div id="progress2">
            <h4>QUIZ</h4>
            <div class="circle-wrap2">
                                <div class="circle2">
                                  <div class="mask2 full2">
                                    <div class="fill2"></div>
                                  </div>
                                  <div class="mask2 half2">
                                    <div class="fill2"></div>
                                  </div>
                                  <div class="inside-circle2"> 58% </div>
                                </div>
                              </div>
            <div class="bottom">
                <p>Start en bedrift fra A - Å<br>(Trykk for å fortsette)</p>
            </div>
        </div>
        <div id="progress3">
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
                <p>Studentbedrift, enkeltmannsforetak eller AS - hva er forskjellen?<br>(Trykk for å fortsette)</p>
            </div>
        </div>

    </div>
    <div id="kurs_container">
        <h1>Toppvalg basert på dine interesser</h1>
            <div id="kurs1">
                        <h4>KURS</h4>
                        <img src="assets/media/lightbulb.jpg"></img>
                        <div class="bottom">
                            <p>Fra idé til konsept - vil konseptet overleve?</p>
                        </div>
                    </div>
                    <div id="kurs2">
                        <h4>KURS</h4>
                        <img src="assets/media/notepad.png"></img>
                        <div class="bottom">
                            <p>Hvor må jeg registrere bedriften min?</p>
                        </div>
                    </div>
        <div id="modul2">
            <h4>MODUL</h4>
            <h2>Hvordan videreutvikle et konsept?</h2>
            <div class="bottom">
                <p>Hvordan skape de beste idéene?<br>Hva skal til for et lønnsomt konsept og hvordan unngår du at konseptet dør ut?</p>
            </div>
        </div>
        <div id="modul3">
            <h4>MODUL</h4>
            <h2>Inntekter, utgifter, lønn og regnskap - hva gjør jeg?</h2>
            <div class="bottom">
                <p>Økonomi kan virke som en uoverkommelig oppgave, men det behøver ikke være det. Lær hva du må gjøre og hvordan.</p>
            </div>
        </div>
    </div>
</body>
</html>