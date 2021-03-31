<!DOCTYPE html>
<html>

    <head>
        <?php
            include("../header.html");
        ?>
        <title>Droits</title>
    </head>

    <body>
        <?php
            include("../navbar/nav_bar.php");
        ?>
        
        <main>
            <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
            
                <div id='milieu'>
                    <p>droit d'utilisation pour les déléguers</p>

                    <div id="droits">
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][0]==1){echo 'checked="checked"';} ?> />
                        <label for="Authentifier">- Authentifier</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][1]==1){echo 'checked="checked"';} ?> />
                        <label for="rechercher une entreprise">- rechercher une entreprise</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][2]==1){echo 'checked="checked"';} ?> />
                        <label for="rechercher une entreprise">- Créer une entreprise</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][3]==1){echo 'checked="checked"';} ?> />
                        <label for="rechercher une entreprise">- Modifier une entreprise</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][4]==1){echo 'checked="checked"';} ?> />
                        <label for="Evaluer une entreprise">- Evaluer une entreprise</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][5]==1){echo 'checked="checked"';} ?> />
                        <label for="Supprimer une entreprise">- Supprimer une entreprise</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][6]==1){echo 'checked="checked"';} ?> />
                        <label for="Consulter les stats des entreprises">- Consulter les stats des entreprises</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][7]==1){echo 'checked="checked"';} ?> />
                        <label for="rechercher une offre de stage">- rechercher une offre de stage</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][8]==1){echo 'checked="checked"';} ?> />
                        <label for="Créer une offre">- Créer une offre</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][9]==1){echo 'checked="checked"';} ?> />
                        <label for="rechercher une offre de stage">- rechercher une offre de stage</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][10]==1){echo 'checked="checked"';} ?> />
                        <label for="Supprimer une offre">- Supprimer une offre</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][11]==1){echo 'checked="checked"';} ?> />
                        <label for="Consulter les stats des offres">- Consulter les stats des offres</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][12]==1){echo 'checked="checked"';} ?> />
                        <label for="Rechercher un compte pilote">- Rechercher un compte pilote</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][13]==1){echo 'checked="checked"';} ?> />
                        <label for="Créer un compte pilote">- Créer un compte pilote</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][14]==1){echo 'checked="checked"';} ?> />
                        <label for="Modifier un compte pilote">- Modifier un compte pilote</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][15]==1){echo 'checked="checked"';} ?> />
                        <label for="Supprimer un compte pilote">- Supprimer un compte pilote</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][16]==1){echo 'checked="checked"';} ?> />
                        <label for="Rechercher un compte délégué">- Rechercher un compte délégué</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][17]==1){echo 'checked="checked"';} ?> />
                        <label for="Créer un compte délégué">- Créer un compte délégué</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][18]==1){echo 'checked="checked"';} ?> />
                        <label for="Modifier un compte délégué">- Modifier un compte délégué</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][19]==1){echo 'checked="checked"';} ?> />
                        <label for="Supprimer un compte délégué">- Supprimer un compte délégué</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][20]==1){echo 'checked="checked"';} ?> />
                        <label for="Rechercher un compte étudiant">- Rechercher un compte étudiant</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][21]==1){echo 'checked="checked"';} ?> />
                        <label for="Créer un compte étudiant">- Créer un compte étudiant</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][22]==1){echo 'checked="checked"';} ?> />
                        <label for="Modifier un compte étudiant">- Modifier un compte étudiant</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][23]==1){echo 'checked="checked"';} ?> />
                        <label for="Supprimer un compte étudiant">- Supprimer un compte étudiant</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][24]==1){echo 'checked="checked"';} ?> />
                        <label for="Consulter les stats des offres">- Consulter les stats des offres</label><br>
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][25]==1){echo 'checked="checked"';}?> />
                        <label for="Informer le système de l'avancement de la candidature step 3">- Informer le système de l'avancement de la candidature step 3</label><br> 
                        <input name="myvalue" type="checkbox" disabled="disabled" <?php if($_SESSION["droits"][26]==1){echo 'checked="checked"';} ?> />
                        <label for="Informer le système de l'avancement de la candidature step 4">- Informer le système de l'avancement de la candidature step 4</label><br>

                    </div>

                </div>

            </main>
                
        <?php include('../footer/footer.html') ?>

    </body>

</html>