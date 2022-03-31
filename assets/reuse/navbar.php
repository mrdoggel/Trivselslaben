<nav id="navbar">
    <img src="assets/images/logo.png" alt="logo-img"></img>
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
            <p>
                <?php
                    echo $_SESSION['poeng'] . " Poeng";
                ?>
            </p>
        </div>

        <div id="profilbilde">
            <?php if (isset($_SESSION['bilde'])) { ?>
                <img src="<?php echo $_SESSION['bilde']; ?>"></img>
            <?php } else { ?>
                <img src="assets/images/default.jpg"></img>
            <?php } ?>
        </div>
    </div>
</nav>