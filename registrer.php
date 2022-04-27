<?php
    require "assets/connection/regg.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/common/reset.css"/>
    <link rel="stylesheet" href="assets/css/common/global.css"/>
    <link rel="stylesheet" href="assets/css/registrer.css"/>
    <!--
    <script src="assets/js/registrering.js">></script>--> 
    <script src="assets/js/registreringStyle.js"></script>
</head>
<body> 
    <header>
        <p>Da er du snart i gang! <br> Vennligst fyll ut all informasjon i feltene under </p>
   </header>
    <main>
        <form id="regform" action="registrer.php" method="post" enctype="multipart/form-data">

            <?php

            for ($i = 1; $i <= 6; $i++) {
                $valg = "valg";
                $valg .= $i;
                echo '<input type="hidden" name="';
                echo $valg;
                echo '" value="';
                echo $_POST[$valg];
                echo '"></input>';
            }
            ?>
            <div id="navn">
                <div>
                    <label for="name">Fornavn</label>
                    <?php echo '<input name="fnavn" type="text" id="fname" value="'; if (isset($fnavn)) echo $fnavn; echo '" placeholder="fornavn">'?>
                </div>

                <div>
                    <!-- Her har jeg satt inn et etternavn :-) -->
                    <label for="name">Etternavn</label>
                    <?php echo '<input name="enavn" type="text" id="ename" value="';if (isset($enavn)) echo $enavn; echo'" placeholder="etternavn">'; ?>
                </div>
            </div>

            <div id="profilbilde">
                <div>
                    <label>Profilbilde</label>
                    <label for="bilde" id="last-opp-btn">last opp</label>
                    <?php echo '<input type="file" id="bilde" name="bilde" value="';if (isset($fil)) echo $fil; echo'">'; ?>

                </div>

            </div>

            <div id="e-post">
                <div>
                    <label for="fname">E-post</label>
                    <?php echo '<input name="regEpost" type="text" value="';if (isset($epost)) echo $epost; echo'" id="email" placeholder="e-post">'; ?>
                </div>

                <div>
                    <!-- Felt for å bekreft e-post, vet ikke om dette er nødvendig - i så fall kan du ta det bort!! hvis ikke endre id..? -->
                    <label for="fname">Bekreft e-post</label>
                    <?php echo '<input name="gjentaRegEpost" type="text" value="';if (isset($epost)) echo $epost; echo'" id="email" placeholder="e-post">'; ?>
                </div>
            </div>

            <div id="passord">
                <div>
                    <label for="password">Passord</label>
                    <input name="regPassord" type="password" id="password" placeholder="passord">
                </div>

                <div>
                    <label for="password">Gjenta Passord</label>
                    <input name="bekreft-passord" type="password" id="password" placeholder="gjenta passord">
                </div>
            </div>

            <!-- vet ikke om du må ha den php-greia inn i div-en her -->
            <div id="registrer-div">
                <input name="reg-knapp" type="submit" value="Registrer">
            </div>
            <?php  if (count($errors) > 0) : ?>
                <div class="error">
                    <?php foreach ($errors as $error) : ?>
                    <p>* <?php echo $error ?></p>
                    <?php endforeach ?>
                </div>
            <?php  endif ?>
        </form>
    </main>
</body>
</html>