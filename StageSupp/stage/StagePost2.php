<?php 
// Connection BDD
try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=web;charset=utf8', 'root', '');
}
catch (PDOException $e) {
    echo "Connexion echouée : " . $e->getMessage();
}

//Candidature

$ref = $_GET['ref'];

$req1 ="INSERT INTO Candidature VALUES (ID_Offre_de_stage='$ref', ID_Etudiant='$USER->id')";

$stmt1 = $bdd->query($req1);
?>

<!doctype html> 
<html lang="fr"> 
    <head>
	    <link rel="stylesheet" type="text/css" href="Stage.css">
		<link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
		<?php include("../header.html") ?>
    </head>
	
    <body>
		<header>
			<?php include("../navbar/nav_bar.php"); ?>
    		<h1 class="align"> Posstuler </h1>
        </header>
		
		<main>			 
			<div> <a href="javascript:history.go(-1)"> <img src="Retour.jpg" height="25" width="25" style="border:0px" alt="retour">  </a> </div>	
			
			<br><br><br>


<?php
if (!$stmt1){
	echo "erreur de requête : $req1";
	die;
}

if ($ligne = $stmt1->fetch(PDO::FETCH_LAZY)){
	echo "Erreur, impossible de postuler. \n";
}
else{
	echo "Vous avez postuler avec succès à l'offre. N'oubliez pas de rajouter votre CV et votre lettre de motivation. <br>";
	$smt1->closeCursor();
}
?>				
					
		</main>


		<footer>
			<?php include('../footer/footer.html') ?>
		</footer>  
    </body>
</html>



