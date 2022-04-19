<?php
    require "assets/connection/conn.login.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/common/reset.css"/>
    <link rel="stylesheet" href="assets/css/common/global.css"/>
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

            <div class="loginBox">
                <form action="login.php" method="post">
                    <label for="fname" class="venstre">E-post</label>
                    <input name="epost" type="text" id="fname" placeholder="e-post">
                    <label for="password" class="venstre">Passord</label>
                    <input name="passord" type="password" id="password" placeholder="passord">
                    <p class="glemt"><a href="glemt.php">Glemt passord?</a></p>
                    <p class="reg"><a href="komigang.php">Ingen bruker?</a></p>
                    <input name="logginn-knapp" type="submit" value="Logg inn">
                    <?php if (count($errors) > 0) : ?>
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