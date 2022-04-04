<?php
    require "assets/connection/oppdaterProfil.php";
    require "assets/reuse/sessionSjekk.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/common/reset.css"/>
    <link rel="stylesheet" href="assets/css/common/global.css"/>
    <link rel="stylesheet" href="assets/css/common/header.css"/>
    <link rel="stylesheet" href="assets/css/common/top-nav.css"/>
    <link rel="stylesheet" href="assets/css/minside.css">
    <link rel="stylesheet" href="assets/css/common/side-nav.css">
    <script src="assets/js/minside.js"></script>
    <script src="assets/js/top-nav.js"></script>
</head>
    <!-- hva skal jeg med den id-en -->
    <body id="body">
        <?php
            require "assets/reuse/navbar.php";
            require "assets/reuse/top-nav.php"; 
        ?>
        
        <main>
            <nav id="admin-nav">
                <h1>Min profil</h1>
                <ul>
                    <li id="bruker-info" class="side-nav-valgt">Brukerinformasjon</li>
                    <li id="bruker-interesser">Mine interesser</li>
                    <li>Lagrede kurs</li>
                    <a href="assets/connection/logout.php"><li>Logg ut</li></a>
                </ul>
            </nav>

            <section>
                <form class="personling-info" action="minside.php" method="post" enctype="multipart/form-data">
                    
                    <div id="navn-bilde">
                        <?php if (isset($_SESSION['bilde'])) { ?>
                        
                        <div>
                            <img src="<?php echo $_SESSION['bilde']; ?>"></img>
                            <label for="bilde" id="last-opp-btn">last opp</label>
                            <input id="bilde" type="file" name ="bilde" placeholder="Nytt bilde">
                        </div>
                        <?php } else { ?>
                        <div>
                            <img src="assets/images/default.jpg"></img>
                            <label for="bilde" id="last-opp-btn">last opp</label>
                            <input id="bilde" type="file" name ="bilde" placeholder="Nytt bilde">
                        </div>
                        
                        <?php } ?>
                        <h2><?php echo $_SESSION['fnavn'] . " " . $_SESSION['enavn'] ?></h2>
                    </div>

                    <div>
                        
                        <div>
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
                                <input id="myInput" type="text" placeholder="Søk og finn interesser ..."> 

                                <div id="myDropdown" class="dropdown-content">

                                <?php
                                        require "assets/connection/conn.php";
                                        $sql = $conn->prepare("SELECT * FROM tema WHERE tema_id NOT IN(SELECT tema_id FROM person_i_tema WHERE person_id = $id)");
                                        $sql->execute();
                                        $result = $sql->get_result();
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo '<button id="bruker-interesser" name="tema-knapp" type="submit" value="';
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