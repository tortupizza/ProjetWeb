<?php
try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=web;charset=utf8', 'root', '');
}
catch (PDOException $e) {
    echo "Connexion echouée : " . $e->getMessage();
}

$ref = $_GET['ref'];

$req = "SELECT * FROM entreprise WHERE  ID = '$ref'";

$stmt = $bdd->query($req);

if (!$stmt){
	echo "erreur de requête : $req";
	die;
}
else {
	$donnees = $stmt->fetch();
	
	$id = $donnees['ID'];
}
?>

<!DOCTYPE html>
<html>

    <head>
        <?php
            include("../header.html");
        ?>
        <link rel="stylesheet" type="text/css" href="Entreprise.css">
        <title>Entreprise</title>
    </head>

    <body>
        <?php
            include("../navbar/nav_bar.php");
        ?>
            <div>

                <header>
                    <h1> <?php echo $donnees['Nom']; ?> </h1>
                </header>
                
                <main>			 
                    <div class="align"> <a href="<?php echo $donnees['Url']; ?>"> <img src="<?php echo $donnees['Logo']; ?>" height="150px" width="150px" alt="logo"/> </a> </div>			
        
                    <div class="align" id="h2"> Nombre de stagiaires CESI pris : <?php echo $donnees['Stagiaire_CESI_acceptes']; ?> </div> 
                    <div class="align" id="h3"> Evaluation des stagiaires : <?php echo $donnees['Note']; ?> </div> 
                    <div class="align" id="h4"> Note des pilotes : <?php echo $donnees['Confiance_du_pilote']; ?> </div>
                    <div class="align" id="h5"> Localité : <?php echo $donnees['Localite']; ?> </div>
                    
                    <br><br>

                    <section class="tab">
                        <table>
                            <caption> Tableau des offres de stage </caption>
                            <tr>
                                <th> Offre de stage </th>
                                <th> Promotion </th>
                                <th> Durée </th>
                                <th> Rénumération </th>
                                <th> Nombre de places disponibles </th>
                                <th> Lien vers l'offre </th>
                            </tr>				
                            <?php
                            $stmt->closeCursor(); // Termine le traitement de la requête

                            $req1 = "SELECT * FROM Offre_de_stage WHERE ID_Entreprise = '$id'";

                            $stmt1 = $bdd->query($req1);

                            if (!$stmt1){
                                echo "erreur de requête : $req1";
                                die;
                            }
                            else {
                                $i = 1;
                                while ($donnees1 = $stmt1->fetch()) {
                                    
                                    
                            ?>	
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $donnees1['types_de_promotions_concernees'];  ?> </td>
                                <td> <?php echo $donnees1['Duree']; ?> </td>
                                <td> <?php echo $donnees1['base_de_remuneration']; ?> </td>
                                <td> <?php echo $donnees1['nombre_de_places']; ?>  </td>
                                <td> <a href="Stage.php?ref=<?php $donnees1['ID']; ?>" >Voir plus </a> </td>
                            <?php
                                $i = $i+1;
                                }
                            }
                            $stmt1->closeCursor(); // Termine le traitement de la requête
                                
                            ?>
                            </tr>
                        </table>
                    </section>
                    
                    <br><br><br>
                    
                        
                </main>

            </div>
                
        <?php include('../footer/footer.html') ?>

    </body>

</html>