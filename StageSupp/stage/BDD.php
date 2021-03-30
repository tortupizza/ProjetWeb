<?php
try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=web', 'root', '');
}catch (PDOException $e) {
    echo "Connexion echouée : " . $e->getMessage();
}   
    $data = array($_POST["IDentreprise"],$_POST["Competences"],$_POST["Duree"],$_POST["Promotions"],$_POST['Remuneration'],$_POST["NbPlaces"],$_POST["DateCreation"]);
    $stmt = $bdd->prepare("INSERT INTO offre_de_stage (ID_Entreprise, Competence, Duree, types_de_promotions_concernees ,base_de_remuneration ,nombre_de_places ,Date_de_creation) VALUES (?,?,?,?,?,?,?);");
    $stmt->execute($data);
 
    header('Location: ../homepage');
    exit();
?>