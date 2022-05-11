<main>
        <nav id="admin-nav">
            <h1>Min profil</h1>
            <ul>
                <a href="minside.php?side=1"><li id="bruker-info" class="side-nav-valgt">Brukerinformasjon</li></a>
                <a href="minside.php?side=2"><li id="bruker-interesser">Mine interesser</li></a>
                <a href="minside.php?side=3"><li id="bruker-lagret">Lagret</li></a>
                <a href="assets/connection/logout.php"><li>Logg ut</li></a>
            </ul>
        </nav>
<section>
    <form class="personling-info" action="minside.php" method="post" enctype="multipart/form-data">

        <div id="navn-bilde">
            <?php if (isset($_SESSION['bilde'])) { ?>

            <div>
                <img src="<?php echo $_SESSION['bilde']; ?>"></img>
                <label for="bilde" id="last-opp-btn"><span>last opp<span></label>
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
<section>
</main>