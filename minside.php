<?php
    require "assets/connection/oppdaterProfil.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/reset.css"/>
    <link rel="stylesheet" href="assets/css/global.css"/>
    <link rel="stylesheet" href="assets/css/minside.css">
</head>
    <body id="body">
        <?php
            require "assets/reuse/navbar.php";
        ?>
        <main>
            <nav id="admin-nav">
                <h1>Min profil</h1>
                <ul>
                    <li>Brukerinformasjon</li>
                    <li>Mine interesser</li>
                    <li>Lagrede kurs</li>
                </ul>
            </nav>
            <section>
                <!-- Oppdater brukerinfo --> 
                <form class="personling-info hidden" action="minside.php" method="post" enctype="multipart/form-data">
                    <div>
                        <!-- #TODO Satt inn bilde/last opp nytt - fikser css senere -->
                        <?php if (isset($_SESSION['bilde'])) { ?>
                        <a href="minside.php"><img src="<?php echo $_SESSION['bilde']; ?>"></img></a>
                        <?php } else { ?>
                        <a href="minside.php"><img src="assets/images/default.jpg"></img></a>
                        <?php } ?>
                        <!-- #TODO Satt inn navn på bruker her -->
                        <h2><?php echo $_SESSION['fnavn'] . " " . $_SESSION['enavn'] ?></h2>
                    </div>
                    <div>
                        <!-- #TODO??? Sette inn fornavn, etternavn og e-post i placeholderne?? -->
                        <div>
                        <input type="file" name ="bilde" placeholder="Nytt bilde">
                        </div>
                        <div>
                        <!-- #TODO??? Sette inn fornavn, etternavn og e-post i placeholderne?? -->
                        <label for="nyttfnavn">Fornavn</label>
                        <input value="<?php echo $_SESSION['fnavn'] ?>" name="nyttfnavn" type="text" id="nyttfnavn" placeholder="fornavn">
                        </div>
                        <div>
                        <label for="nyttenavn">Etternavn</label>
                        <input value="<?php echo $_SESSION['enavn'] ?>" name="nyttenavn" type="text" id="nyttenavn" placeholder="etternavn">
                        </div>
                    </div>
                    
                    <div>
                        <div>
                            <label for="nybesk">Beskrivelse</label>
                            <input value="<?php echo $_SESSION['beskrivelse'] ?>" name="nybesk" type="text" id="nybesk" placeholder="beskrivelse">
                        </div>
                    </div>

                    <div>
                        <button name="oppdater-knapp" type="submit">Oppdater profil</button>
                    </div>
                    <?php if (count($errors) > 0) : ?>
                    <div class="error">
                        <?php foreach ($errors as $error) : ?>
                        <p style="color: red;"><?php echo $error ?></p>
                        <?php endforeach ?>
                    </div>
                    <?php  endif ?>
                </form>

                <!-- #TODO: HENT UT INTERESSER OG FJERNE :-) Håper layouten funker-->
                <div class="interesser">
                    <section>
                        <h2>Dine interesser</h2>
                        <div>
                            <div>
                                <h3 class="">Regnskap</h3>
                            </div>
                            <form class="fjern" action="">
                                <button>fjern</button>
                            </form>            
                        </div>
                        <div>
                            <div>
                                <h3>Hoho</h3>
                            </div>
                            <form class="fjern" action="">
                                <button>fjern</button>
                            </form>           
                        </div>
                    </section>

                    <section id="finn-og-legg-til">
                        <!-- #TODO: SØKE ETTER INTERESSER MAN IKKE HAR OG EVENTUELT LEGGE TIL, Håper layouten funker -->
                        <form action="" method="">
                            <input type="text" name="" placeholder="Finn nye interesser..">
                        </form>

                        <div>
                            <h3>Kontrakter</h3>
                            <form action="">
                                <button>Legg til</button>
                            </form>
                        </div>
                    </section>
                </div>

            </section>

        </main>
    </body>
</html>