<head>
<script src="assets/js/visPoengInfo.js"></script>
</head>
<nav id="navbar">
    <a href="forside.php">
        <img src="assets/images/logo.png" alt="logo-img"></img>
    </a>

    <div id="searchbar">
        <form action="søk.php" method="post">
            <input required type="text" name="søkeparameter" placeholder="Hva leter du etter?">
        </form>
    </div>
    
    <div id="profil">
        <div id ="navn_poeng">
            <p>
                <?php
                   echo $_SESSION['fnavn'];
                ?>
            </p>
            <p id="poeng-info">
                <?php
                    echo $_SESSION['poeng'] . " Poeng";
                ?>
            </p>

            <p class="poeng-info-txt hidden">Fullfør kurs, moduler og quizer for å opptjene poeng. </br> Poengene kan du bruke til å kjøpe kuponger på min side.</p>


        </div>
        <div id="profilbilde">
            <?php if (isset($_SESSION['bilde'])) { ?>
                <a href="minside.php"><img src="<?php echo $_SESSION['bilde']; ?>"></img></a>
            <?php } else { ?>
                <a href="minside.php"><img src="assets/images/default.jpg"></img></a>
            <?php } ?>
        </div>
    </div>
</nav>