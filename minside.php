<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/reset.css"/>
    <link rel="stylesheet" href="assets/css/global.css"/>
    <link rel="stylesheet" href="assets/css/minside.css">
</head>
    <body id="body">
        <?php
            require "assets/reuse/navbar.php";
        ?>
        <main>
            <nav id="admin-nav">
                <h1>Min profil</h1>
                <ul>
                    <li>Brukerinformasjon</li>
                    <li>Mine interesser</li>
                    <li>Lagrede kurs</li>
                </ul>
            </nav>
            <section>
                <!-- Oppdater brukerinfo --> 
                <form class="personlig-info" action="">
                    <div>
                        <!-- #TODO Sett inn bilde/last opp nytt - fikser css senere -->

                        <!-- #TODO Sett inn navn på bruker her -->
                        <h2>Veronika Hansen</h2>
                    </div>

                    <div>
                        <!-- #TODO??? Sette inn fornavn, etternavn og e-post i placeholderne?? -->
                        <div>
                            <label for="nyttfnavn">Fornavn</label>
                            <input name="nyttfnavn" type="text" id="nyttfnavn" placeholder="fornavn">
                        </div>
                        <div>
                            <label for="nyttenavn">Etternavn</label>
                            <input name="nytteenavn" type="text" id="nyttenavn" placeholder="etternavn">
                    
                        </div>
                    </div>
                    
                    <div>
                        <div>
                            <label for="nyepost">E-post</label>
                            <input name="nyepost" type="text" id="nyepost" placeholder="e-post">
                        </div>
                        <div>
                            <label for="nyepostconf">Bekreft e-post</label>
                            <input name="nyepostconf" type="text" id="nyepostconf" placeholder="bekreft epost">
                        </div>
                    </div>

                    <div>
                        <button type="submit">Registrer</button>
                    </div>
                </form>
            </section>

        </main>
    </body>
</html>