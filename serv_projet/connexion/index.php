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
        <?php
            include("../header.html");
        ?>
        <style>
            .Caché {
                display: <?php echo $badlogin; ?>;
            }
        </style>

        <title>Page de connexion</title>
    </head>

    <body>

        <?php
            include("../navbar/nav_bar.php");
        ?>

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
                    <input class="large" type="password" id="Mdp" name="Mdp" required>
                    <br>
                    <a href="?nullos"> Mot de passe oublié</a>
                </p>

                <!--<a href="../inscription/inscription.php" class="tab"> Inscription</a>-->
                <button type="submit" class="large">Valider</button>

            </form>
        </div>
        
        <?php include('../footer/footer.html') ?>

    </body>

