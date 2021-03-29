<?php

try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=web', 'root', '');
}catch (PDOException $e) {
    echo "Connexion echouée : " . $e->getMessage();
}
    $data = array($_POST["IDentreprise"],$_POST["Competences"],$_POST["Duree"],$_POST["Promotions"],$_POST['Remuneration'],$_POST["NbPlaces"],$_POST["DateCreation"],$_POST["ID"]);
    $stmt = $bdd->prepare("UPDATE offre_de_stage SET ID_Entreprise=? , Competence=? , Duree=? , types_de_promotions_concernees=? , base_de_remuneration=? , nombre_de_places=? , Date_de_creation=? WHERE ID=?;");
    $stmt->execute($data); 
    header("location:".$_GET["next"]);
    exit();
?>