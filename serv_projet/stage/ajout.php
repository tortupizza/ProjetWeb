<!DOCTYPE html>
<?php 
    try{
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=web', 'root', '');
    }catch (PDOException $e) {
        echo "Connexion echouée : " . $e->getMessage();
    }
?>
<html>

    <head>
        <?php
            include("../header.html");
        ?>
        <title>Page de création de stage</title>
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
                    
                    <p class ="large">
                        <label for="IDentreprise">Nom de l'entreprise émettrice :</label><br>
                        <select name="IDentreprise" id="IDentreprise">
                            <?php
                                var_dump("ok");
                                $stmt = $bdd->prepare("SELECT ID,NOM FROM entreprise ");
                                $stmt->execute();
                                $rtrn=$stmt->fetch();
                                while($rtrn){
                                    $name=$rtrn['NOM'];
                                    $ID=$rtrn['ID'];
                                    $rtrn=$stmt->fetch();
                                    ?>
                                    <option value="<?=$ID?>"><?=$name?></option>
                            <?php } ?>

                        </select>
                    </p>

                    <p class="large">
                        <label for="Competences">Compétences requises :</label><br>
                        <input type="text" id="Competences" name="Competences" required>
                    </p>

                    <p class="large">
                        <label for="Duree">Durée (en mois):</label><br>
                        <input type="Number" id="Duree" name="Duree" min=0 required>
                    </p>

                    <p class="large">
                        <label for="Promotions">Types de promotions concernées :</label><br>
                        <input type="text" id="Promotions" name="Promotions" required>
                    </p>

                    <p class="large">
                        <label for="Remuneration">Rémunération :</label><br>
                        <input type="text" id="Remuneration" name="Remuneration" min=1 required>
                    </p>

                    <p class="large">
                        <label for="NbPlaces">Nombres de places :</label><br>
                        <input type="number" id="NbPlaces" name="NbPlaces" min=1 required>
                    </p>

                    <p class="large">
                        <label for="DateCreation">Date de création :</label><br>
                        <input type="Date" id="DateCreation" name="DateCreation" required>
                    </p>

                    <br>
                    <button type="submit" class="large">Ajouter</button>

                </form>
            
            <?php }else{ ?>
                <div class="large"> Vous n'avez pas les droits pour creer des stages. </div>
                <br>
                <a href="../connexion" class="tab">Changer d'utilisateur / Se connecter</a>
            <?php } ?>
        </div>
        
        <?php include('../footer/footer.html') ?>

    </body>