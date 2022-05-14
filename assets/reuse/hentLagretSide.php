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
        require "assets/reuse/hentLagretQuiz.php";
        require "assets/reuse/hentLagretKurs.php";
        require "assets/reuse/hentLagretModul.php";
    ?>
</div>
</section>
</main>