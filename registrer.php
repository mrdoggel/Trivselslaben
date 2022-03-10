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
    <link rel="stylesheet" href="assets/css/login.css"/>
</head>
<body>
    <main id="container">
        <section id="venstre">
            <div class="introtekst">
                <h1>Velkommen til Inova</h1>
                <h2>For deg som vil utvikle en solid start-up</h2>
            </div>
        </section>
        <aside id="høyre">
            <div class="bilde"><a href="index.html"><img src="assets/images/logo.png" alt="logo"></a></div>

            <div class="regBox">
                <form action="registrer.php" method="post">
                    <label for="name" class="venstre">Fornavn</label>
                    <input name="navn" type="text" id="fname" placeholder="fornavn">
                    <label for="fname" class="venstre">E-post</label>
                    <input name="epost" type="text" id="fname" placeholder="e-post">
                    <label for="password" class="venstre">Passord</label>
                    <input name="passord" type="password" id="password" placeholder="passord">
                    <label for="password" class="venstre">Gjenta Passord</label>
                    <input name="bekreft-passord" type="password" id="password" placeholder="gjenta passord">
                    <p class="glemt"><a href="glemt.php">Glemt passord?</a></p>
                    <p class="reg"><a href="login.php">Logg inn</a></p>
                    <input name="reg-knapp" type="submit" value="Registrer deg">
                    <?php  if (count($errors) > 0) : ?>
                    <div class="error">
                        <?php foreach ($errors as $error) : ?>
                        <p style="color: red;"><?php echo $error ?></p>
                        <?php endforeach ?>
                    </div>
                    <?php  endif ?>
                </form>
            </div>
        </aside>
    </main>
</body>
</html>