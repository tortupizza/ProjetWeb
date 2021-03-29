<!DOCTYPE html>
<html>

    <head>
        <?php
            include("../header.html");
        ?>
        <title>Page d'inscription d'entreprise</title>
    </head>

    <body>
        <?php
            include("../navbar/nav_bar.php");
        ?>

        <div id="milieu">

            <img src="../SS.png" alt="logoStageSupp" id="logo" >

            <br>

            <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote' or (isset($_SESSION['droits']) and $_SESSION['droits'][2]==1))){ ?>


                <form method="POST" action="BDD.php" id="my-form">

                    <p class="large">
                        <label for="Nom">Nom de l'entreprise :</label><br>
                        <input type="text" id="Nom" name="Nom" required>
                    </p>

                    <p class="large">
                        <label for="SA">Secteur d'activité :</label><br>
                        <input type="text" id="SA" name="SA" required>
                    </p>

                    <p class="large">
                        <label for="Localité">Localité :</label><br>
                        <input type="text" id="Localité" name="Localité" required>
                    </p>

                    <p class="large">
                        <label for="StagiaireCESI">Stagiaires CESI acceptés :</label><br>
                        <input type="number" id="StagiaireCESI" name="StagiaireCESI" required>
                    </p>

                    <p class="large">

                        <?php if($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote'){ ?>
                        <p class="large">
                            <label for="Confiance">Confiance des pilotes /20 :</label><br>
                            <input type="number" id="Confiance" name="Confiance" max="20" min="0">
                        </p>
                        <?php } ?>

                        <?php if ($_SESSION['type']=='admin' or (isset($_SESSION['droits']) and $_SESSION['droits'][4]==1 )) { ?>
                            <p class="large">
                                <label for="NoteEtudiants">Note des étudiants :</label><br>
                                <input type="number" id="NoteEtudiants" name="NoteEtudiants" max="5" min="0" >
                            </p>
                        <?php } ?>

                    </p>

                    <br>
                    <button type="submit" class="large">Inscrire</button>

                </form>
            
            <?php }else{ ?>
                <div class="large"> Vous n'avez pas les droits pour inscrire des entreprises. </div>
                <br>
                <a href="../connexion" class="tab">Changer d'utilisateur / Se connecter</a>
            <?php } ?>
        </div>
        
        <?php include('../footer/footer.html') ?>

    </body>

</html>