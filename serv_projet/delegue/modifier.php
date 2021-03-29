<?php
$name=$_GET["name"];
$ID=$_GET["user"];
$next=urlencode($_GET["next"]);

try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=web', 'root', '');
}catch (PDOException $e) {
    echo "Connexion echouée : " . $e->getMessage();
}

$stmt = $bdd->prepare("SELECT Droits FROM delegue WHERE ID_Utilisateur = ?");
$stmt->execute(array($ID));
$rtrn=$stmt->fetch();
if($rtrn){
    $Droits=$rtrn["Droits"];

}else{
    echo "aucun délégué ne correspond";
}

?>

<!DOCTYPE html>
<html>

    <head>
        <?php
            include("../header.html");
        ?>
        <title>modification de délégué</title>
    </head>

    <body>
        <?php
            include("../navbar/nav_bar.php");
        ?>
            <h4 style="text-align: center;">Modifier les charactéristique de : <?=$name;?> </h4>
            <div id='milieu'>
                <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote' or (isset($_SESSION['droits']) and $_SESSION['droits'][18]==1))){ ?>


                <form method="POST" action="BDDmodifier.php?next=<?=$next?>" id="my-form">

                    <input type="hidden" name="ID" value="<?=$ID?>" />

                    <p id="droits" class="large">
                        <input type="checkbox" id="SFx2" name="SFx2" value="1" <?php if($Droits['1']==1){echo 'checked';} ?> >
                        <label for="SFx2">Rechercher une entreprise</label>
                        <br>

                        <input type="checkbox" id="SFx3" name="SFx3" value="1" <?php if($Droits['2']==1){echo 'checked';} ?>> 
                        <label for="SFx3">Créer une entreprise</label>
                        <br>

                        <input type="checkbox" id="SFx4" name="SFx4" value="1" <?php if($Droits['3']==1){echo 'checked';} ?>> 
                        <label for="SFx4">Modifier une entreprise</label>
                        <br>

                        <input type="checkbox" id="SFx5" name="SFx5" value="1" <?php if($Droits['4']==1){echo 'checked';} ?>> 
                        <label for="SFx5">Evaluer une entreprise</label>
                        <br>

                        <input type="checkbox" id="SFx6" name="SFx6" value="1" <?php if($Droits['5']==1){echo 'checked';} ?>> 
                        <label for="SFx6">Supprimer une entreprise</label>
                        <br>

                        <input type="checkbox" id="SFx7" name="SFx7" value="1" <?php if($Droits['6']==1){echo 'checked';} ?>> 
                        <label for="SFx7">Consulter les stats des entreprises</label>
                        <br>

                        <input type="checkbox" id="SFx8" name="SFx8" value="1" <?php if($Droits['7']==1){echo 'checked';} ?>> 
                        <label for="SFx8">Rechercher une offre</label>
                        <br>

                        <input type="checkbox" id="SFx9" name="SFx9" value="1" <?php if($Droits['8']==1){echo 'checked';} ?>> 
                        <label for="SFx9">Céer une offre</label>
                        <br>

                        <input type="checkbox" id="SFx10" name="SFx10" value="1" <?php if($Droits['9']==1){echo 'checked';} ?>> 
                        <label for="SFx10">Modifier une offre</label>
                        <br>

                        <input type="checkbox" id="SFx11" name="SFx11" value="1" <?php if($Droits['10']==1){echo 'checked';} ?>> 
                        <label for="SFx11">Supprimer une offre</label>
                        <br>

                        <input type="checkbox" id="SFx12" name="SFx12" value="1" <?php if($Droits['11']==1){echo 'checked';} ?>> 
                        <label for="SFx12">Consulter les stats des offres</label>
                        <br>

                        <input type="checkbox" id="SFx13" name="SFx13" value="1" <?php if($Droits['12']==1){echo 'checked';} ?>> 
                        <label for="SFx13">Rechercher un compte pilote</label>
                        <br>

                        <input type="checkbox" id="SFx14" name="SFx14" value="1" <?php if($Droits['13']==1){echo 'checked';} ?>> 
                        <label for="SFx14">Créer un compte pilote</label>
                        <br>

                        <input type="checkbox" id="SFx15" name="SFx15" value="1" <?php if($Droits['14']==1){echo 'checked';} ?>> 
                        <label for="SFx15">Modifier un compte pilote</label>
                        <br>

                        <input type="checkbox" id="SFx16" name="SFx16" value="1" <?php if($Droits['15']==1){echo 'checked';} ?>> 
                        <label for="SFx16">Supprimer un compte pilote</label>
                        <br>

                        <input type="checkbox" id="SFx17" name="SFx17" value="1" <?php if($Droits['16']==1){echo 'checked';} ?>> 
                        <label for="SFx17">Rechercher un compte délégué</label>
                        <br>

                        <input type="checkbox" id="SFx18" name="SFx18" value="1" <?php if($Droits['17']==1){echo 'checked';} ?>> 
                        <label for="SFx18">Créer un compte délégué</label>
                        <br>

                        <input type="checkbox" id="SFx19" name="SFx19" value="1" <?php if($Droits['18']==1){echo 'checked';} ?>> 
                        <label for="SFx19">Modifier un compte délégué</label>
                        <br>

                        <input type="checkbox" id="SFx20" name="SFx20" value="1" <?php if($Droits['19']==1){echo 'checked';} ?>> 
                        <label for="SFx20">Supprimer un compte délégué</label>
                        <br>

                        <input type="checkbox" id="SFx22" name="SFx22" value="1" <?php if($Droits['21']==1){echo 'checked';} ?>> 
                        <label for="SFx22">Rechercher un compte étudiant</label>
                        <br>

                        <input type="checkbox" id="SFx23" name="SFx23" value="1" <?php if($Droits['22']==1){echo 'checked';} ?>> 
                        <label for="SFx23">Créer un compte étudiant</label>
                        <br>

                        <input type="checkbox" id="SFx24" name="SFx24" value="1" <?php if($Droits['23']==1){echo 'checked';} ?>> 
                        <label for="SFx24">Modifier un compte étudiant</label>
                        <br>

                        <input type="checkbox" id="SFx25" name="SFx25" value="1" <?php if($Droits['24']==1){echo 'checked';} ?>> 
                        <label for="SFx25">Supprimer un compte étudiant</label>
                        <br>

                        <input type="checkbox" id="SFx26" name="SFx26" value="1" <?php if($Droits['25']==1){echo 'checked';} ?>> 
                        <label for="SFx26">Consulter les stats des étudiants</label>
                        <br>

                        <input type="checkbox" id="SFx32" name="SFx32" value="1" <?php if($Droits['31']==1){echo 'checked';} ?>> 
                        <label for="SFx32">Informer le système de l'avancement de la candidature à l'étape 3</label>
                        <br>

                        <input type="checkbox" id="SFx33" name="SFx33" value="1" <?php if($Droits['32']==1){echo 'checked';} ?>> 
                        <label for="SFx33">Informer le système de l'avancement de la candidature à l'étape 4</label>
                        <br>

                    </p>

                    <br>
                    <button type="submit" class="large">Modifier</button>

                </form>
            
            <?php }else{ ?>
                <div class="large"> Vous n'avez pas les droits pour modifier des délégués. </div>
                <br>
                <a href="../connexion" class="tab">Changer d'utilisateur / Se connecter</a>
            <?php } ?>

            </div>
                
        <?php include('../footer/footer.html') ?>

    </body>

</html>