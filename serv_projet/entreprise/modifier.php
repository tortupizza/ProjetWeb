<?php
$name=$_GET["name"];
$ID=$_GET["ID"];
$next=urlencode($_GET["next"]);

try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=web', 'root', '');
}catch (PDOException $e) {
    echo "Connexion echouée : " . $e->getMessage();
}

$stmt = $bdd->prepare("SELECT * FROM entreprise WHERE ID = ?");
$stmt->execute(array($ID));
$rtrn=$stmt->fetch();
if($rtrn){
    $Nom=$rtrn["Nom"];
    $SA=$rtrn["Secteur_d_activite"];
    $Note=$rtrn["Note"];
    $StagiaireCESI=$rtrn["Stagiaire_CESI_acceptes"];
    $Confiance=$rtrn["Confiance_du_pilote"];
    $Localite=$rtrn["Localite"];
}else{
    echo "aucune entreprise ne correspond";
}

?>

<!DOCTYPE html>
<html>

    <head>
        <?php
            include("../header.html");
        ?>
        <title>modification d'entreprise</title>
    </head>

    <body>
        <?php
            include("../navbar/nav_bar.php");
        ?>
            <h4 style="text-align: center;">Modifier les charactéristique de : <?=$name;?> </h4>
            <div id='milieu'>
                <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote' or (isset($_SESSION['droits']) and $_SESSION['droits'][3]==1))){ ?>


                <form method="POST" action="BDDmodifier.php?next=<?=$next?>" id="my-form">

                    <input type="hidden" name="ID" value="<?=$ID?>" />

                    <p class="large">
                        <label for="Nom">Nom de l'entreprise :</label><br>
                        <input type="text" id="Nom" name="Nom" value="<?=$Nom?>"required>
                    </p>

                    <p class="large">
                        <label for="SA">Secteur d'activité :</label><br>
                        <input type="text" id="SA" name="SA" value="<?=$SA?>" required>
                    </p>

                    <p class="large">
                        <label for="Localité">Localité :</label><br>
                        <input type="text" id="Localité" name="Localité" value="<?=$Localite?>" required>
                    </p>

                    <p class="large">
                        <label for="StagiaireCESI">Stagiaires CESI acceptés :</label><br>
                        <input type="number" id="StagiaireCESI" name="StagiaireCESI" value="<?=$StagiaireCESI?>" required>
                    </p>

                    <p class="large">

                        <?php if($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote'){ ?>
                        <p class="large">
                            <label for="Confiance">Confiance des pilotes /20 :</label><br>
                            <input type="number" id="Confiance" name="Confiance" max="20" min="0" value="<?=$Confiance?>">
                        </p>
                        <?php } ?>

                        <?php if ($_SESSION['type']=='admin' or (isset($_SESSION['droits']) and $_SESSION['droits'][4]==1 )) { ?>
                            <p class="large">
                                <label for="NoteEtudiants">Note des étudiants :</label><br>
                                <input type="number" id="NoteEtudiants" name="NoteEtudiants" max="5" min="0" value="<?=$Note?>">
                            </p>
                        <?php } ?>

                    </p>

                    <br>
                    <button type="submit" class="large">Modifier</button>

                </form>
            
            <?php }else{ ?>
                <div class="large"> Vous n'avez pas les droits pour modifier des entreprises. </div>
                <br>
                <a href="../connexion" class="tab">Changer d'utilisateur / Se connecter</a>
            <?php } ?>

            </div>
                
        <?php include('../footer/footer.html') ?>

    </body>

</html>