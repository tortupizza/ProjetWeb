<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="mode_administrateur/admin.css">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap-4.5.3-dist/css/bootstrap.css">
    <meta name="viewport" content="width=device-width,"> <!--initial-scale=1, shrink-to- fit=no">-->
    <meta charset="utf-8">
    <title>Page des droits déléguer</title>
    <link href="navbar.css" rel="stylesheet">
    
</head>
<!-- include'deleguer\deleguer.php'-->
<body onload="droits()">
  
  <script src="assets\bootstrap\bootstrap-5.0.0-beta3-dist\js\bootstrap.min.js" type="text/javascript"></script> 
  <script src="assets\bootstrap\bootstrap-5.0.0-beta3-dist\js\bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<main>
  <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            
            <a class="navbar-brand" href="#"><img src="ss.png" alt="ss"height="90"width="120"></a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample05">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        
          <li class="nav-item">
            
            <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">support</a>
          </li>
          <li>
            <a class="nav-link" href="#">contact</a>
          </li>
          <li>
            <a class="nav-link" href="inscription/inscription.html">se connecter</a>
          </li>
          </ul>
            </div>
          </nav>

<div id="container">
<div id="main">
  <p>droit d'utilisation pour les déléguers</p>


    <?php
session_start();

?>

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


<div id="footer">
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    
      
      
          <a class="nav-link" href="#">a propos</a>
          <a class="nav-link" href="#">info sur l'équipe</a>
          <a class="nav-link" href="#">autre</a>
          <a class="nav-link" href="#">autre</a>

    </nav>
  </div>
  
</body>

</html>