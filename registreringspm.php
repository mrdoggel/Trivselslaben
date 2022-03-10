<!--Comitt-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forside - Påbegynt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/registreringspm.css">
    <script src="assets/js/effects.js"></script>
</head>
    <body>
        <header>
            <p class="spm hidden">Hvilket alternativ samsvarer best med hvor du er i prosessen?</p>
            <p class="spm">Hva slags bedrift passer best for deg?</p>
            <p class="spm hidden">Hva slags temaer er du interessert i?</p>
        </header>
        <main>
            <div id="spm-prosess hidden">
                <button class="info-container en hidden"><p class="valg valg1">Jeg har en idé - det er det</p></button>
                <button class="info-container to hidden"><p class="valg valg2">Jeg er i gang med oppstarten</p></button>
                <button class="info-container tre hidden"><p class="valg valg3">Jeg er godt i gang med bedriften min </p></button>
            </div>

            <div id="spm-bedrift hidden">
                
            </div>

            <div id="spm-interesser">
                <aside>
                    <div>
                        <p>Nå kan du velge temaer du er spesielt interessert i.</p>
                        <p>Om ikke du har noen kan du bare gå videre, og du vil naturligvis finne all informasjon senere.</p>
                    </div>
                </aside>
                <section>
                    <div>
                        <?php
                            require "assets/connection/conn.php";
                            $sql = $conn->prepare("SELECT * FROM tema");
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
                <button> <span><a href="registreringspm.php">Neste</a></span> </button>
            </div>

        </main>
    </body>
</html>