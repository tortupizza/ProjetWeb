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
        echo $_GET["type"].' avec le mots clefs : '.$_GET['search'].'</h3>';
        try{
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=web', 'root', '');
        }catch (PDOException $e) {
            echo "Connexion echouée : " . $e->getMessage();
        }

        $next = urlencode($_SERVER['PHP_SELF'].'?search='.$_GET['search'].'&type='.$_GET['type']);
        
        switch ($_GET['type']) {
            case 'Stage':
                $stmt = $bdd->prepare("SELECT Nom, base_de_remuneration, offre_de_stage.ID AS IDStage, nombre_de_places, Competence, types_de_promotions_concernees, Duree, Date_de_creation FROM offre_de_stage INNER JOIN entreprise ON offre_de_stage.ID_Entreprise = entreprise.ID WHERE Competence LIKE ? ");
                $stmt->execute(array('%'.$_GET["search"].'%'));
                $rtrn=$stmt->fetch();
                while($rtrn){
                    $name=$rtrn['Nom'].' : '.$rtrn['types_de_promotions_concernees'].' ('.$rtrn['Duree'].'mois)';
                    ?>
                    <div class='resultat'>
                        <h2><?= $name ?></h2>
                        <br>
                        <div class="gestion">
                            <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'etudiant')){ ?>
                                <a class="postuler" href="#">Postuler</a>
                            <?php } ?>
                            <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote' or (isset($_SESSION['droits']) and ($_SESSION['droits'][9]==1)))){ ?>
                                <a class="modifier" href="../stage/modifier.php?name=<?=$name?>&ID=<?=$rtrn['IDStage'];?>&next=<?=$next;?>"><img src="../assets/Modifier.png" alt="Modifier" height="40px"></a>
                            <?php } ?>
                            <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote' or (isset($_SESSION['droits']) and ($_SESSION['droits'][10]==1)))){ ?>
                                <a class="supprimer" href="../stage/supprimer.php?name=<?=$name?>&ID=<?=$rtrn['IDStage'];?>&next=<?=$next;?>"><img src="../assets/Supprimer.png" alt="Supprimer" height="50px"></a>
                            <?php } ?>
                        </div>
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
                $stmt->execute(array('%'.$_GET["search"].'%'));
                $rtrn=$stmt->fetch();
                while($rtrn){
                    $name=$rtrn['Nom'];
                    ?>
                    <div class='resultat'>
                    <h2><?=$name;?></h2>
                        <div class="gestion">
                            <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote' or (isset($_SESSION['droits']) and ($_SESSION['droits'][3]==1)))){ ?>
                                <a class="modifier" href="../entreprise/modifier.php?name=<?=$name?>&ID=<?=$rtrn['ID'];?>&next=<?=$next;?>"><img src="../assets/Modifier.png" alt="Modifier" height="40px"></a>
                            <?php } ?>
                            <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote' or (isset($_SESSION['droits']) and ($_SESSION['droits'][5]==1)))){ ?>
                                
                                <a class="supprimer" href="../entreprise/supprimer.php?name=<?=$name?>&ID=<?=$rtrn['ID'];?>&next=<?=$next;?>"><img src="../assets/Supprimer.png" alt="Supprimer" height="50px"></a>
                            <?php } ?>
                        </div>
                    <div class="deuxieme">Secteur d'activité : <?=$rtrn['Secteur_d_activite'];?></div>
                    <br>
                    <div class="troisieme">Localité : <?=$rtrn['Localite'];?></div>
                    <br>
                        <div class="resteEM">
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
                $stmt = $bdd->prepare("SELECT etudiant.ID, ID_Utilisateur, Username, utilisateur.Nom ,Prenom ,ID_Promotion ,promotion.Nom AS NomPromotion FROM etudiant INNER JOIN utilisateur ON etudiant.ID_Utilisateur = utilisateur.ID INNER JOIN promotion ON etudiant.ID_promotion = promotion.ID WHERE Username LIKE ? ");
                $stmt->execute(array('%'.$_GET["search"].'%'));
                $rtrn=$stmt->fetch();
                while($rtrn){
                    $name=$rtrn['Username'];
                    ?>
                    <div class='resultat'>
                        <h2><?=$name;?></h2>
                        <div class="gestion">
                            <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote' or (isset($_SESSION['droits']) and ($_SESSION['droits'][23]==1)))){ ?>
                                <a class="modifier" href="../etudiant/modifier.php?name=<?=$name?>&user=<?=$rtrn['ID_Utilisateur'];?>&next=<?=$next;?>"><img src="../assets/Modifier.png" alt="Modifier" height="40px"></a>
                            <?php } ?>
                            <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote' or (isset($_SESSION['droits']) and ($_SESSION['droits'][24]==1)))){ ?>
                                <a class="supprimer" href="../etudiant/supprimer.php?name=<?=$name?>&ID=<?=$rtrn['ID'];?>&user=<?=$rtrn['ID_Utilisateur'];?>&next=<?=$next;?>"><img src="../assets/Supprimer.png" alt="Supprimer" height="50px"></a>
                            <?php } ?>
                        </div>
                        <div class="deuxieme">Nom : <?=$rtrn['Nom'];?></div>
                        <div class="troisieme">Prenom : <?=$rtrn['Prenom'];?></div>
                        <div class="reste50">
                            ID Promotion : <?=$rtrn['ID_Promotion'];?>
                            <br>
                            Nom de promotion : <?=$rtrn['NomPromotion'];?>
                            <br>
                            ID Utilisateur : <?=$rtrn['ID_Utilisateur'];?>
                            <br>
                            ID Etudiant : <?=$rtrn['ID'];?>
                        </div>
                    </div>
                    <?php
                    $rtrn=$stmt->fetch();
                }
                break;

            case 'Delegue':
                $stmt = $bdd->prepare("SELECT delegue.ID, ID_Utilisateur, Username, Nom, Prenom, Droits FROM delegue INNER JOIN utilisateur ON delegue.ID_Utilisateur = utilisateur.ID WHERE Username LIKE ? ");
                $stmt->execute(array('%'.$_GET["search"].'%'));
                $rtrn=$stmt->fetch();
                while($rtrn){
                    $name=$rtrn['Username'];
                    ?>
                    <div class='resultat'>
                        <h2><?=$name;?></h2>
                        <div class="gestion">
                            <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote' or (isset($_SESSION['droits']) and ($_SESSION['droits'][18]==1)))){ ?>
                                <a class="modifier" href="../delegue/modifier.php?name=<?=$name?>&ID=<?=$rtrn['ID'];?>&user=<?=$rtrn['ID_Utilisateur'];?>&next=<?=$next;?>"><img src="../assets/Modifier.png" alt="Modifier" height="40px"></a>
                            <?php } ?>
                            <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'pilote' or (isset($_SESSION['droits']) and ($_SESSION['droits'][19]==1)))){ ?>
                                <a class="supprimer" href="../delegue/supprimer.php?name=<?=$name?>&ID=<?=$rtrn['ID'];?>&user=<?=$rtrn['ID_Utilisateur'];?>&next=<?=$next;?>"> <img src="../assets/Supprimer.png" alt="Supprimer" height="50px"></a>
                            <?php } ?>
                        </div>              
                        <div class="deuxieme">Nom : <?=$rtrn['Nom'];?></div>
                        <div class="troisieme">Prenom : <?=$rtrn['Prenom'];?></div>
                        <div class="reste50">
                            Droits : <?=$rtrn['Droits'];?>
                            <br>
                            ID Delegué : <?=$rtrn['ID'];?>
                            <br>
                            ID Utilisateur : <?=$rtrn['ID_Utilisateur'];?>
                        </div>
                    </div>
                    <?php
                    $rtrn=$stmt->fetch();
                }
                break;

            case 'Pilote':
                $stmt = $bdd->prepare("SELECT pilote.ID, ID_Utilisateur, Username, Nom, Prenom FROM pilote INNER JOIN utilisateur ON pilote.ID_Utilisateur = utilisateur.ID WHERE Username LIKE ? ");
                $stmt->execute(array('%'.$_GET["search"].'%'));
                $rtrn=$stmt->fetch();
                while($rtrn){
                    $name=$rtrn['Username'];
                    ?>
                    <div class='resultat'>
                        <h2><?=$name;?></h2>
                        <div class="gestion">
                            <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or (isset($_SESSION['droits']) and ($_SESSION['droits'][14]==1)))){ ?>
                                <a class="modifier" href="../pilote/modifier.php?name=<?=$name?>&ID=<?=$rtrn['ID'];?>&user=<?=$rtrn['ID_Utilisateur'];?>&next=<?=$next;?>"><img src="../assets/Modifier.png" alt="Modifier" height="40px"></a>
                            <?php } ?>
                            <?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or (isset($_SESSION['droits']) and ($_SESSION['droits'][15]==1)))){ ?>
                                <a class="supprimer" href="../pilote/supprimer.php?name=<?=$name?>&ID=<?=$rtrn['ID'];?>&user=<?=$rtrn['ID_Utilisateur'];?>&next=<?=$next;?>"><img src="../assets/Supprimer.png" alt="Supprimer" height="50px"></a>
                            <?php } ?>
                        </div>
                        <div class="deuxieme">Nom : <?=$rtrn['Nom'];?></div>
                        <div class="troisieme">Prenom : <?=$rtrn['Prenom'];?></div>
                        <div class="reste50">
                            ID Pilote : <?=$rtrn['ID'];?>
                            <br>
                            ID Utilisateur : <?=$rtrn['ID_Utilisateur'];?>
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