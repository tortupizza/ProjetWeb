<?php
    if (isset($_GET["badlogin"])) {
        $badlogin="block";
    }else{
        $badlogin="none";
    }
    
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Page de connexion</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        
        <style>
            .Caché {
                display: <?php echo $badlogin; ?>;
            }
        </style>

    </head>

    <body>
        <div id="espacedeconnexion">

        <img src="../SS.png" alt="logoStageSupp" id="logo" >
            <h3 id="titre" class="Caché">utilisateur ou mot de passe incorrect.<span id="mot-de-passe"></span></h3>

            <form method="POST" action="Verification.php" id="my-form">

                <p class="large">

                    <label for="Username">Nom d'utilisateur :</label><br>
                    <input type="text" id="Username" name="Username" required>

                </p>

                <p>
                    <label class="large" for="Mdp">Mot de passe :</label><br>
                    <input type="password" id="Mdp" name="Mdp" required>
                    <br>
                    <a href="connexion.php?nullos"> Mot de passe oublié</a>
                </p>

                <a href="../inscription/inscription.html" class="tab"> Inscription</a>
                <button type="submit" class="large">Valider</button>

            </form>
        </div>
    </body>