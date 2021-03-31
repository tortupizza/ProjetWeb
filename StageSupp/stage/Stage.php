<?php
try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=web;charset=utf8', 'root', '');
}
catch (PDOException $e) {
    echo "Connexion echouée : " . $e->getMessage();
}

$ref = $_GET['ref'];

$req = "SELECT * FROM offre_de_stage WHERE ID = '$ref'";

$stmt = $bdd->query($req);

if (!$stmt){
	echo "erreur de requête : $req";
	die;
}
else {
	$donnees = $stmt->fetch();
}

$IDent = $donnees['ID_Entreprise'];

$req1 = "SELECT * FROM entreprise WHERE ID = '$IDent'";

$stmt1 = $bdd->query($req1);

if (!$stmt1){
	echo "erreur de requête : $req";
	die;
}
else {
	$donnees1 = $stmt1->fetch();
}

$name = $donnees1['Nom'].' : '.$donnees['types_de_promotions_concernees'].' ('.$donnees['Duree'].'mois)';
$next = urlencode($_SERVER['PHP_SELF'].'?ref='.$_GET['ref']);
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
    		<h1 class="align"> Offre de stage </h1>
        </header>
		
		<main>			 
			<div class="align"> <a href="../entreprise/Entreprise.php?ref=<?php echo $donnees['ID_Entreprise']; ?>"> <img src="<?php //$donnees1['Logo']; ?>" height="150px" width="150px" alt="Page entreprise" />  </a> </div>	
			
			<?php if(isset($_SESSION['type']) and ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'etudiant')){ ?>
			<div id="block1" class="align"> <a href="StagePost.php?ref=<?php echo $donnees['ID']; ?>"> <button id="btn_w"> Ajouter à la Wishlist </button> </a> </div> 
			<div id="block2" class="align"> <a class="postuler" href="../stage/postuler.php?name=<?=$name?>&ID=<?=$rtrn['ID'];?>&next=<?=$next;?>"> <button id="btn_p">Postuler</button> </a> </div> 
			<?php } ?>
			
			<br><br><br>
			
			<div id="tabs">
				<ul>
					<li><button id="btn_ent"> Description </button></li>
					<li><button id="btn_sta"> Caractéristiques </button></li>
				</ul>
			</div>

			<div id="tabcontent">
				<div id="ent" class="tabpanel" style="display:none">
					<div> 
						<div> Description du stage </div> <br>
						<li> <?php echo $donnees['Description']; ?> </li> 
					</div>
				</div>	
				<table id="sta" class="tabpanel" style="display:inline">
					<tr>
						<td>Promotion : <?php echo $donnees['types_de_promotions_concernees']; ?> </td>
						<td> Compétence : <?php echo $donnees['Competence']; ?> </td>
						<td> Date de création : <?php echo $donnees['Date_de_creation']; ?> </td>
						<td> Durée :  <?php echo $donnees['Duree']; ?> </td>
						<td> Rénumération : <?php echo $donnees['base_de_remuneration']; ?> </td>
						<td> Nombre de places disponibles : <?php echo $donnees['nombre_de_places']; ?> </td>
					</tr>
				</table> 
			</div>	
					
		</main>

		<script type="text/javascript" src="Stage.js"> </script>

		<footer>
			<?php include('../footer/footer.html') ?>
		</footer>  
    </body>
</html>

<?php
	
$stmt->closeCursor(); // Termine le traitement de la requête
$stmt1->closeCursor(); // Termine le traitement de la requête
	
?>


