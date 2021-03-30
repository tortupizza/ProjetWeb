<?php
$name=$_GET["name"];
$ID=$_GET["ID"];
$next=urlencode($_GET["next"]);

try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=web', 'root', '');
}catch (PDOException $e) {
    echo "Connexion echouée : " . $e->getMessage();
}

$stmt = $bdd->prepare("SELECT * FROM offre_de_stage WHERE ID = ?");
$stmt->execute(array($ID));
$rtrn=$stmt->fetch();
if($rtrn){
    $Duree=$rtrn["Duree"];
    $Date=$rtrn["Date_de_creation"];
    $Competence=$rtrn["Competence"];
    $remuneration=$rtrn["base_de_remuneration"];
    $Promotion=$rtrn["types_de_promotions_concernees"];
    $NbPlaces=$rtrn["nombre_de_places"];
    $IDentreprise=$rtrn["ID_Entreprise"];
}else{
    echo "aucun stage ne correspond";
}

?>

<!DOCTYPE html>
<html>

    <head>
        <?php
            include("../header.html");
        ?>
        <title>modification de stage</title>
    </head>

    <body>
        <?php
            include("../navbar/nav_bar.php");
        ?>

        <h4 style="text-align: center;">Modifier les charactéristique de : <?=$name;?> </h4>
        <div id='milieu'>
            <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote' or (isset($_SESSION['droits']) and $_SESSION['droits'][2]==1))){ ?>


                <form method="POST" action="BDDmodifier.php?next=<?=$next?>" id="my-form">
                    
                    <input type="hidden" name="ID" value="<?=$ID?>" />

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
                        <input type="text" id="Competences" name="Competences" required value="<?=$Competence?>">
                    </p>

                    <p class="large">
                        <label for="Duree">Durée (en mois):</label><br>
                        <input type="Number" id="Duree" name="Duree" min=0 required value="<?=$Duree?>">
                    </p>

                    <p class="large">
                        <label for="Promotions">Types de promotions concernées :</label><br>
                        <input type="text" id="Promotions" name="Promotions" required value="<?=$Promotion?>">
                    </p>

                    <p class="large">
                        <label for="Remuneration">Rémunération :</label><br>
                        <input type="text" id="Remuneration" name="Remuneration" min=1 required value="<?=$remuneration?>">
                    </p>

                    <p class="large">
                        <label for="NbPlaces">Nombres de places :</label><br>
                        <input type="number" id="NbPlaces" name="NbPlaces" min=1 required value="<?=$NbPlaces?>">
                    </p>

                    <p class="large">
                        <label for="DateCreation">Date de création :</label><br>
                        <input type="Date" id="DateCreation" name="DateCreation" required value="<?=$Date?>">
                    </p>

                    <br>
                    <button type="submit" class="large">Modifier</button>

                </form>
            
            <?php }else{ ?>
        <div class="large"> Vous n'avez pas les droits pour modifier des stages. </div>
        <br>
        <a href="../connexion" class="tab">Changer d'utilisateur / Se connecter</a>
        <?php } ?>

        </div>
                
        <?php include('../footer/footer.html') ?>

    </body>

</html>