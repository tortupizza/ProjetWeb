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
        <h3>
        Résultat de la recherche de 
        <?php 
        echo $_POST["type"].' avec le mots clefs : '.$_POST['search'].'</h3>';
        try{
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=web', 'root', '');
        }catch (PDOException $e) {
            echo "Connexion echouée : " . $e->getMessage();
        }


        switch ($_POST['type']) {
            case 'Stage':
                $stmt = $bdd->prepare("SELECT Nom, base_de_remuneration, offre_de_stage.ID AS IDStage, nombre_de_places, Competence, types_de_promotions_concernees, Duree, Date_de_creation FROM offre_de_stage INNER JOIN entreprise ON offre_de_stage.ID_Entreprise = entreprise.ID WHERE Competence LIKE ? ");
                $stmt->execute(array('%'.$_POST["search"].'%'));
                $rtrn=$stmt->fetch();
                while($rtrn){
                    ?>
    
                    <div class='resultat'>
                        <h2><?=$rtrn['Nom'];?> :  <?=$rtrn['types_de_promotions_concernees'];?> (<?=$rtrn['Duree'];?> mois) </h2>
                        <br>
                        <div class='deuxieme'> Competences demandés : <?=$rtrn['Competence'];?> </div>
                        <br>
                        <div class='troisieme'>Niveau d'études : <?=$rtrn['types_de_promotions_concernees'];?></div>
                        <br>
                        <div class='reste'>
                            Nombre de places : <?=$rtrn['nombre_de_places'];?>
                            <br>
                            Durée (en mois): <?=$rtrn['Duree'];?>
                            <br>
                            Rémunération : 
                            <?php
                                if ($rtrn['base_de_remuneration']!=NULL){
                                    echo $rtrn['base_de_remuneration'];
                                }else{
                                    echo 'Non attribué';
                                };
                            ?>
                            <br>
                            Entreprise : <?=$rtrn['Nom'];?>
                            <br>
                            ID Stage : <?=$rtrn['IDStage'];?>
                            <br>
                            Date de création : <?=$rtrn['Date_de_creation'];?>
                            <br>
                        </div>
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
                    <div class='resultat'>
                    <h2><?=$rtrn['Nom'];?></h2>
                    <br>
                    <div class="deuxieme">Secteur d'activité : <?=$rtrn['Secteur_d_activite'];?></div>
                    <br>
                    <div class="troisieme">Localité : <?=$rtrn['Localite'];?></div>
                    <br>
                        <div class="reste">
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
                                };
                                ?>
                            <br>
                            Stagiaire CESI acceptés : <?=$rtrn['Stagiaire_CESI_acceptes'];?>
                            <br>
                            ID Entreprise : <?=$rtrn['ID'];?>
                            <br>
                        </div>
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
                    <div class='resultat'>
                        <h2><?=$rtrn['Username'];?></h2>
                        <div class="deuxieme">Nom : <?=$rtrn['Nom'];?></div>
                        <div class="troisieme">Prenom : <?=$rtrn['Prenom'];?></div>
                        <div class="reste50">
                            ID Promotion : <?=$rtrn['ID_Promotion'];?>
                            <br>
                            Nom de promotion : <?=$rtrn['NomPromotion'];?>
                            <br>
                            ID Etudiant : <?=$rtrn['ID_Utilisateur'];?>
                        </div>
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
                    <div class='resultat'>
                        <h2><?=$rtrn['Username'];?></h2>                       
                        <div class="deuxieme">Nom : <?=$rtrn['Nom'];?></div>
                        <div class="troisieme">Prenom : <?=$rtrn['Prenom'];?></div>
                        <div class="reste50">
                            Droits : <?=$rtrn['Droits'];?>
                            <br>
                            ID Delegué : <?=$rtrn['ID_Utilisateur'];?>
                        </div>
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
                    <div class='resultat'>
                        <h2><?=$rtrn['Username'];?></h2>
                        <div class="deuxieme">Nom : <?=$rtrn['Nom'];?></div>
                        <div class="troisieme">Prenom : <?=$rtrn['Prenom'];?></div>
                        <div class="reste50">
                            ID Pilote : <?=$rtrn['ID_Utilisateur'];?>
                        </div>
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