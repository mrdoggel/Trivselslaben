<nav id="navbar">
        <div id="searchbar">
        <form action="søk.php" method="post" style="padding: 0; margin: 0; display: flex;">
            <input required type="text" name="søkeparameter" placeholder="Hva leter du etter?">
        </form>
        </div>
    <div id="profil">
        <div id ="navn_poeng">
            <?php
                //echo $_SESSION['navn'];
            ?>
            <br>
            <?php
                //echo $_SESSION['poeng'] . " Poeng";
            ?>
        </div>
        <!-- Lagt inn link til min side her -->
        <div id="profilbilde">
            <?php if (isset($_SESSION['bilde'])) { ?>
                <a href="minside.php"><img src="<?php echo $_SESSION['bilde']; ?>"></img></a>
            <?php } else { ?>
                <a href="minside.php"><img src="assets/images/default.jpg"></img></a>
            <?php } ?>
        </div>
    </div>
</nav>