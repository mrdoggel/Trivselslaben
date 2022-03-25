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
    <script src="assets/js/minside.js"></script>
</head>
    <body id="body">
        <?php
            require "assets/reuse/navbar.php";
        ?>
        <main>
            <nav id="admin-nav">
                <h1>Min profil</h1>
                <ul>
                    <li id="bruker-info">Brukerinformasjon</li>
                    <li id="bruker-interesser">Mine interesser</li>
                    <li>Lagrede kurs</li>
                </ul>
            </nav>
            <section>
                <!-- Oppdater brukerinfo --> 
                <form class="personling-info" action="minside.php" method="post" enctype="multipart/form-data">
                    
                    <div id="navn-bilde">
                        <!-- #TODO Satt inn bilde/last opp nytt - fikser css senere -->
                        <?php if (isset($_SESSION['bilde'])) { ?>
                        
                        <div>
                        <a href="minside.php"><img src="<?php echo $_SESSION['bilde']; ?>"></img></a>
                            <label for="bilde" id="last-opp-btn">last opp</label>
                            <input id="bilde" type="file" name ="bilde" placeholder="Nytt bilde">
                        </div>
                        <?php } else { ?>
                        <div>
                            <a href="minside.php"><img src="assets/images/default.jpg"></img></a>
                        </div>
                        
                        <?php } ?>
                        <!-- #TODO Satt inn navn på bruker her -->
                        <h2><?php echo $_SESSION['fnavn'] . " " . $_SESSION['enavn'] ?></h2>
                    </div>

                    <div>
                        <!-- #TODO??? Sette inn fornavn, etternavn og e-post i placeholderne?? -->
                        
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
                            <textarea rows="3" name="nybesk" type="text" id="nybesk" placeholder="beskrivelse"><?php echo $_SESSION['beskrivelse'] ?></textarea>
                        </div>
                    </div>

                    <div id="oppdater-btn"> 
                        <button name="oppdater-knapp" type="submit">Oppdater profil</button>
                    </div>
                    <?php if (count($errors) > 0) : ?>
                    <div id="error">
                        <?php foreach ($errors as $error) : ?>
                        <p>* <?php echo $error ?></p>
                        <?php endforeach ?>
                    </div>
                    <?php  endif ?>
                </form>

                <!-- Se/oppdater interesser -->
                <div id="hidden" class="interesser">
                    <section>
                        <h2>Dine interesser</h2>
                        <?php
                            require "assets/reuse/hentTema.php"
                        ?>
                    </section>

                    <section id="finn-og-legg-til">
                        <!-- #TODO: SØKE ETTER INTERESSER MAN IKKE HAR OG EVENTUELT LEGGE TIL, Håper layouten funker -->
                        <form method="post" action="assets/reuse/leggTilTema.php">
                            <div class="dropdown">

                                <!--<input id="myInput" onfocus="myFunction()" onfocusout="myFunction2()" type="text" placeholder="Legg til interesser..." onkeyup="filterFunction()">-->
                                <input id="myInput" type="text" placeholder="Legg til interesser..."> 

                                <div id="myDropdown" class="dropdown-content">

                                    <?php
                                        require "assets/connection/conn.php";
                                        $sql = $conn->prepare("SELECT * FROM tema WHERE tema_id NOT IN(SELECT tema_id FROM person_i_tema WHERE person_id = $id)");
                                        $sql->execute();
                                        $result = $sql->get_result();
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo '<button name="tema-knapp" type="submit" value="';
                                                echo $row["tema_id"];
                                                echo '">';
                                                echo $row["navn"];
                                                echo '</button><br>';
                                            }
                                        }
                                    ?>

                                </div>

                            </div>
                            </form>
                    </section>
                </div>

            </section>

        </main>
    </body>
</html>