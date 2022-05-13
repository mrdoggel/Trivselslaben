<main>
<nav id="admin-nav">
    <h1>Min profil</h1>
    <ul>
        <a href="minside.php?side=1"><li id="bruker-info">Brukerinformasjon</li></a>
        <a href="minside.php?side=2"><li id="bruker-interesser">Mine interesser</li></a>
        <a href="minside.php?side=3"><li id="bruker-lagret" class="side-nav-valgt">Lagret</li></a>
        <a href="assets/connection/logout.php"><li>Logg ut</li></a>
    </ul>
</nav>
<section>
<div class="lagret">
    <?php
        $resultat = 0;
        require "assets/reuse/hentLagretQuiz.php";
        require "assets/reuse/hentLagretKurs.php";
        require "assets/reuse/hentLagretModul.php";
        if ($resultat < 1) {
            echo '<h2 style=" margin-top: 10rem;font-size: 3rem;width: 50%;">Ser ikke ut som du har lagret noe, du finner lagre knappene inne på kurs/moduler eller på nedtrekksmenyen på quiz- oversikten, lenker:<br><br>
            Nederst på <a style="background: linear-gradient(180deg,rgba(255, 255, 255, 0) 0%,rgba(255, 255, 255, 0) 60%,
            #d0d9f9 0%,#d0d9f9 0%);font-family: "Segoe UI";font-weight: 500;"
            href="kurs.php?kurs=29">Kurs</a><br>
            Nederst på <a <a style="background: linear-gradient(180deg,rgba(255, 255, 255, 0) 0%,rgba(255, 255, 255, 0) 60%,
            #a3ecc8 0%,#a3ecc8 0%);font-family: "Segoe UI";font-weight: 500;" href="modul.php?modul=3">Moduler</a><br>
            I nedtrekksmenyen på <a <a style="background: linear-gradient(180deg,rgba(255, 255, 255, 0) 0%,rgba(255, 255, 255, 0) 60%,
            #f2f088 0%,#f2f088 0%);font-family: "Segoe UI";font-weight: 500;" href="alleQuizer.php">Quizer</a></h2>';
        }
    ?>
</div>
</section>
</main>