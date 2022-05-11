<main>
<nav id="admin-nav">
    <h1>Min profil</h1>
    <ul>
        <a href="minside.php?side=1"><li id="bruker-info">Brukerinformasjon</li></a>
        <a href="minside.php?side=2"><li id="bruker-interesser" class="side-nav-valgt">Mine interesser</li></a>
        <a href="minside.php?side=3"><li id="bruker-lagret">Lagret</li></a>
        <a href="assets/connection/logout.php"><li>Logg ut</li></a>
    </ul>
</nav>
<section>
<div class="interesser">
    <section>
        <h2>Dine interesser</h2>
        <?php
            require "assets/reuse/hentTema.php"
        ?>
    </section>

    <section id="finn-og-legg-til">
        <form method="post" action="assets/reuse/leggTilTema.php">
            <div class="dropdown">
                <input class="søk-input" id="myInput" type="text" placeholder="Søk og finn interesser ...">

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