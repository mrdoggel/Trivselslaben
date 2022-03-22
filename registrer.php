<?php
    require "assets/connection/regg.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/reset.css"/>
    <link rel="stylesheet" href="assets/css/global.css"/>
    <link rel="stylesheet" href="assets/css/registrer.css"/>
    <script src="assets/js/sendinteresser.js">></script>
</head>
<body> 
    <header>
        <p>Da er du snart i gang! <br> Vennligst fyll ut all informasjon i feltene under </p>
   </header>
    <main>
        <!-- action="registrer.php" -->
        <form id="regform" method="post" enctype="multipart/form-data">
               <!-- HER KOMMER INTERESSE-FELTER: 
            id="valgx" name="valgx" value="interessen" 
            <input type="hidden" id="" name="" value="">
            -->

            <div id="navn">
                <div>
                    <label for="name">Fornavn</label>
                    <input name="fnavn" type="text" id="fname" placeholder="fornavn">
                </div>

                <div>
                    <!-- Her har jeg satt inn et etternavn :-) -->
                    <label for="name">Etternavn</label>
                    <input name="enavn" type="text" id="ename" placeholder="etternavn">
                </div>
            </div>

            <div id="bilde">
                <div>
                    <!-- Her kan du hente profilbilde, kan fikse css-en senere -->
                    <input type="file" name ="bilde" placeholder="">

                </div>
            </div>

            <div id="e-post">
                <div>
                    <label for="fname">E-post</label>
                    <input name="regEpost" type="text" id="email" placeholder="e-post">
                </div>

                <div>
                    <!-- Felt for å bekreft e-post, vet ikke om dette er nødvendig - i så fall kan du ta det bort!! hvis ikke endre id..? -->
                    <label for="fname">Bekreft e-post</label>
                    <input name="gjentaRegEpost" type="text" id="email" placeholder="e-post">
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
                <input id="registrer" name="reg-knapp" type="submit" value="Registrer">
            </div>
            <?php  if (count($errors) > 0) : ?>
                <div class="error">
                    <?php foreach ($errors as $error) : ?>
                    <p style="color: red;"><?php echo $error ?></p>
                    <?php endforeach ?>
                </div>
            <?php  endif ?>
        </form>
    </main>
</body>
</html>