<?php
// Connection BDD
try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=web;charset=utf8', 'root', '');
}
catch (PDOException $e) {
    echo "Connexion echouée : " . $e->getMessage();
}
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
    		<h1 class="align"> Ajouter à la Wishlist </h1>
        </header>
		
		<main>			 
			<div> <a href="javascript:history.go(-1)"> <img src="Retour.jpg" height="25" width="25" style="border:0px" alt="retour">  </a> </div>	
			
			<br><br><br>

<?php

//Wishlist

$ref = $_GET['ref'];
$user = $_SESSION['ID'];

$req1 ="INSERT INTO wish (ID_Offre_de_stage, ID_Etudiant) VALUES ('$ref','$user');";

$stmt1 = $bdd->query($req1);

if (!$stmt1){
	echo "erreur de requête : $req1";
	die;
}

if ($ligne = $stmt1->fetch(PDO::FETCH_LAZY)){
	echo "Erreur, impossible de rajouter à la Wishlist \n";
}
else{
	echo "L'offre a été rajouté à la Wishlist  <br>";
	$stmt1->closeCursor();
}
?>			
					
		</main>


		<footer>
			<?php include('../footer/footer.html') ?>
		</footer>  
    </body>
</html>




