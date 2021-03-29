<?php
$name=$_GET["name"];
$user=$_GET["user"];
$next=urlencode($_GET["next"]);

try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=web', 'root', '');
}catch (PDOException $e) {
    echo "Connexion echouée : " . $e->getMessage();
}

$stmt = $bdd->prepare("SELECT 1 FROM pilote WHERE ID_utilisateur = ?");
$stmt->execute(array($user));
$rtrn=$stmt->fetch();
if($rtrn){
    
    $stmt = $bdd->prepare("SELECT * FROM utilisateur WHERE ID = ?");
    $stmt->execute(array($user));
    $rtrn=$stmt->fetch();
    
    $Nom=$rtrn["Nom"];
    $Prenom=$rtrn["Prenom"];
    $Username=$rtrn["Username"];
    $MDP="";

    $stmt = $bdd->prepare("SELECT 1 FROM delegue WHERE ID_utilisateur = ?");
    $stmt->execute(array($user));
    $rtrn=$stmt->fetch();
    if($rtrn){
        $delegue=1;
    }

}else{
    echo "aucun pilote ne correspond";
}

?>

<!DOCTYPE html>
<html>

    <head>
        <?php
            include("../header.html");
        ?>
        <title>modification d'un pilote</title>
    </head>

    <body>
        <?php
            include("../navbar/nav_bar.php");
        ?>
            <h4 style="text-align: center;">Modifier les charactéristique de : <?=$name;?> </h4>
            <div id='milieu'>
                <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote' or (isset($_SESSION['droits']) and $_SESSION['droits'][14]==1))){ ?>


                <form method="POST" action="BDDmodifier.php?next=<?=$next?>" id="my-form">

                    <input type="hidden" name="user" value="<?=$user?>" />

                    <form method="POST" action="BDD.php" id="my-form">

                    <p class="large">
                        <label for="Username">Nom d'utilisateur :</label><br>
                        <input type="text" id="Username" name="Username" required value="<?=$Username?>">
                    </p>

                    <p class="large">
                        <label for="Mdp">Mot de passe<br>(laisser vide pour ne pas modifier le MDP) :</label><br>
                        <input type="password" id="Mdp" name="Mdp" value="<?=$MDP?>">
                    </p>

                    <p class="large">
                        <label for="Nom">Nom :</label><br>
                        <input type="text" id="Nom" name="Nom" required value="<?=$Nom?>">
                    </p>

                    <p class="large">
                        <label for="Prenom">Prenom :</label><br>
                        <input type="text" id="Prenom" name="Prenom" required value="<?=$Prenom?>">
                    </p>


                    <?php 
                    if(isset($delegue)){
                        ?>
                        Cet utilisateur est délégué, pour supprimer ou modifier ses droits recherchez son profil de délégué.
                        <?php
                    }else{
                        if( $_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote' or (isset($_SESSION['droits']) and  $_SESSION['droits'][17]==1)){ ?>

                            <p class="large">
                                <input type="checkbox" name="delegue" value="1" id="delegue"> 
                                <label for="delegue">Délégué</label>
                            
                            </p>

                            <p id="droits" class="large">
                                <input type="checkbox" id="SFx2" name="SFx2" value="1" > 
                                <label for="SFx2">Rechercher une entreprise</label>
                                <br>

                                <input type="checkbox" id="SFx3" name="SFx3" value="1" > 
                                <label for="SFx3">Créer une entreprise</label>
                                <br>

                                <input type="checkbox" id="SFx4" name="SFx4" value="1" > 
                                <label for="SFx4">Modifier une entreprise</label>
                                <br>

                                <input type="checkbox" id="SFx5" name="SFx5" value="1" > 
                                <label for="SFx5">Evaluer une entreprise</label>
                                <br>

                                <input type="checkbox" id="SFx6" name="SFx6" value="1" > 
                                <label for="SFx6">Supprimer une entreprise</label>
                                <br>

                                <input type="checkbox" id="SFx7" name="SFx7" value="1" > 
                                <label for="SFx7">Consulter les stats des entreprises</label>
                                <br>

                                <input type="checkbox" id="SFx8" name="SFx8" value="1" > 
                                <label for="SFx8">Rechercher une offre</label>
                                <br>

                                <input type="checkbox" id="SFx9" name="SFx9" value="1" > 
                                <label for="SFx9">Céer une offre</label>
                                <br>

                                <input type="checkbox" id="SFx10" name="SFx10" value="1" > 
                                <label for="SFx10">Modifier une offre</label>
                                <br>

                                <input type="checkbox" id="SFx11" name="SFx11" value="1" > 
                                <label for="SFx11">Supprimer une offre</label>
                                <br>

                                <input type="checkbox" id="SFx12" name="SFx12" value="1" > 
                                <label for="SFx12">Consulter les stats des offres</label>
                                <br>

                                <input type="checkbox" id="SFx13" name="SFx13" value="1" > 
                                <label for="SFx13">Rechercher un compte pilote</label>
                                <br>

                                <input type="checkbox" id="SFx14" name="SFx14" value="1" > 
                                <label for="SFx14">Créer un compte pilote</label>
                                <br>

                                <input type="checkbox" id="SFx15" name="SFx15" value="1" > 
                                <label for="SFx15">Modifier un compte pilote</label>
                                <br>

                                <input type="checkbox" id="SFx16" name="SFx16" value="1" > 
                                <label for="SFx16">Supprimer un compte pilote</label>
                                <br>

                                <input type="checkbox" id="SFx17" name="SFx17" value="1" > 
                                <label for="SFx17">Rechercher un compte délégué</label>
                                <br>

                                <input type="checkbox" id="SFx18" name="SFx18" value="1" > 
                                <label for="SFx18">Créer un compte délégué</label>
                                <br>

                                <input type="checkbox" id="SFx19" name="SFx19" value="1" > 
                                <label for="SFx19">Modifier un compte délégué</label>
                                <br>

                                <input type="checkbox" id="SFx20" name="SFx20" value="1" > 
                                <label for="SFx20">Supprimer un compte délégué</label>
                                <br>

                                <input type="checkbox" id="SFx22" name="SFx22" value="1" > 
                                <label for="SFx22">Rechercher un compte étudiant</label>
                                <br>

                                <input type="checkbox" id="SFx23" name="SFx23" value="1" > 
                                <label for="SFx23">Créer un compte étudiant</label>
                                <br>

                                <input type="checkbox" id="SFx24" name="SFx24" value="1" > 
                                <label for="SFx24">Modifier un compte étudiant</label>
                                <br>

                                <input type="checkbox" id="SFx25" name="SFx25" value="1" > 
                                <label for="SFx25">Supprimer un compte étudiant</label>
                                <br>

                                <input type="checkbox" id="SFx26" name="SFx26" value="1" > 
                                <label for="SFx26">Consulter les stats des étudiants</label>
                                <br>

                                <input type="checkbox" id="SFx32" name="SFx32" value="1" > 
                                <label for="SFx32">Informer le système de l'avancement de la candidature à l'étape 3</label>
                                <br>

                                <input type="checkbox" id="SFx33" name="SFx33" value="1" > 
                                <label for="SFx33">Informer le système de l'avancement de la candidature à l'étape 4</label>
                                <br>

                            </p>
                        <?php }
                            
                    } ?>

                    <script src="formulaire+delegue.JS"></script>

                    <br>
                    <button type="submit" class="large">Modifier</button>

                </form>
            
            <?php }else{ ?>
                <div class="large"> Vous n'avez pas les droits pour modifier un pilote. </div>
                <br>
                <a href="../connexion" class="tab">Changer d'utilisateur / Se connecter</a>
            <?php } ?>

            </div>
                
        <?php include('../footer/footer.html') ?>

    </body>

</html>