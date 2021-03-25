<!DOCTYPE html>

<head>
    <?php
        include("../header.html");
    ?>
    <title>Recherche</title>
</head>

<body>

    <?php
        include("../navbar/nav_bar.php");
    ?>

    <div id="container">
        Résultat de la recherche de 
        <?php 
        echo $_POST["type"].' avec le mots clefs : '.$_POST['search'].'<br>';
        try{
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=web', 'root', '');
        }catch (PDOException $e) {
            echo "Connexion echouée : " . $e->getMessage();
        }


        switch ($_POST['type']) {
            case 'Stage':
                $stmt = $bdd->prepare("SELECT * FROM offre_de_stage INNER JOIN entreprise ON offre_de_stage.ID_Entreprise = entreprise.ID WHERE Competence LIKE ? ");
                $stmt->execute(array('%'.$_POST["search"].'%'));
                $rtrn=$stmt->fetch();
                while($rtrn){
                    ?>
    
                    <div>
                    ID Stage : <?=$rtrn['ID'];?>
                    <br>
                    Entreprise : <?=$rtrn['Nom'];?>
                    <br>
                    Nombre de places : <?=$rtrn['nombre_de_places'];?>
                    <br>
                    Competences demandés : <?=$rtrn['Competence'];?>
                    <br>
                    Niveau d'études : <?=$rtrn['types_de_promotions_concernees'];?>
                    <br>
                    Durée (en mois): <?=$rtrn['Duree'];?>
                    <br>
                    Date de création : <?=$rtrn['Date_de_creation'];?>
                    <br>
                    Rémunération : 
                    <?php
                    if ($rtrn['base_de_remuneration']!=NULL){
                        echo $rtrn['base_de_remuneration'];
                    }else{
                        echo 'Non attribué';
                    };?>
                    </div>
                    <?php
                    $rtrn=$stmt->fetch();
                }
                break;
            
            case 'Entreprise':
                $stmt = $bdd->prepare("SELECT * FROM entreprise WHERE Nom LIKE ? ");
                $stmt->execute(array('%'.$_POST["search"].'%'));
                $rtrn=$stmt->fetch();
                while($rtrn){
                    ?>
                    <div>
                    ID Entreprise : <?=$rtrn['ID'];?>
                    <br>
                    Entreprise : <?=$rtrn['Nom'];?>
                    <br>
                    Secteur d'activité : <?=$rtrn['Secteur_d_activite'];?>
                    <br>
                    Localité : <?=$rtrn['Localite'];?>
                    <br>
                    Note : 
                    <?php
                    if ($rtrn['Note']!=NULL){
                        echo $rtrn['Note'];
                    }else{
                        echo 'Non attribué';
                    };?>
                    <br>
                    Confiance du pilote : 
                    <?php
                    if ($rtrn['Confiance_du_pilote']!=NULL){
                        echo $rtrn['Confiance_du_pilote'];
                    }else{
                        echo 'Non attribué';
                    };?>
                    <br>
                    Stagiaire CESI acceptés : <?=$rtrn['Stagiaire_CESI_acceptes'];?>
                    </div>
                    <?php
                    $rtrn=$stmt->fetch();
                }
                break;

            case 'Etudiant':
                $stmt = $bdd->prepare("SELECT ID_Utilisateur, Username, utilisateur.Nom ,Prenom ,ID_Promotion ,promotion.Nom AS NomPromotion FROM etudiant INNER JOIN utilisateur ON etudiant.ID_Utilisateur = utilisateur.ID INNER JOIN promotion ON etudiant.ID_promotion = promotion.ID WHERE Username LIKE ? ");
                $stmt->execute(array('%'.$_POST["search"].'%'));
                $rtrn=$stmt->fetch();
                while($rtrn){
                    ?>
                    <div>
                    ID Etudiant : <?=$rtrn['ID_Utilisateur'];?>
                    <br>
                    Nom d'utilisateur : <?=$rtrn['Username'];?>
                    <br>
                    Nom : <?=$rtrn['Nom'];?>
                    <br>
                    Prenom : <?=$rtrn['Prenom'];?>
                    <br>
                    ID Promotion : <?=$rtrn['ID_Promotion'];?>
                    <br>
                    Nom de promotion : <?=$rtrn['NomPromotion'];?>
                    <br>
                    </div>
                    <?php
                    $rtrn=$stmt->fetch();
                }
                break;

            case 'Delegue':
                $stmt = $bdd->prepare("SELECT ID_Utilisateur, Username, Nom, Prenom, Droits FROM delegue INNER JOIN utilisateur ON delegue.ID_Utilisateur = utilisateur.ID WHERE Username LIKE ? ");
                $stmt->execute(array('%'.$_POST["search"].'%'));
                $rtrn=$stmt->fetch();
                while($rtrn){
                    ?>
                    <div>
                    ID Delegué : <?=$rtrn['ID_Utilisateur'];?>
                    <br>
                    Nom d'utilisateur : <?=$rtrn['Username'];?>
                    <br>
                    Nom : <?=$rtrn['Nom'];?>
                    <br>
                    Prenom : <?=$rtrn['Prenom'];?>
                    <br>
                    Droits : <?=$rtrn['Droits'];?>
                    <br>

                    </div>
                    <?php
                    $rtrn=$stmt->fetch();
                }
                break;

            case 'Pilote':
                $stmt = $bdd->prepare("SELECT ID_Utilisateur, Username, Nom, Prenom FROM pilote INNER JOIN utilisateur ON pilote.ID_Utilisateur = utilisateur.ID WHERE Username LIKE ? ");
                $stmt->execute(array('%'.$_POST["search"].'%'));
                $rtrn=$stmt->fetch();
                while($rtrn){
                    ?>
                    <div>
                    ID Pilote : <?=$rtrn['ID_Utilisateur'];?>
                    <br>
                    Nom d'utilisateur : <?=$rtrn['Username'];?>
                    <br>
                    Nom : <?=$rtrn['Nom'];?>
                    <br>
                    Prenom : <?=$rtrn['Prenom'];?>
                    <br>

                    </div>
                    <?php
                    $rtrn=$stmt->fetch();
                }
                break;
        }

        
        ?>

    </div>

    <?php include('../footer/footer.html') ?>

</body>