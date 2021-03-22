<?php
try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=web', 'root', '');
}catch (PDOException $e) {
    echo "Connexion echouée : " . $e->getMessage();
}
    $data = array($_POST["Nom"],$_POST["Prenom"],$_POST["Username"],hash('sha512',hash('sha512',$_POST["Mdp"],false),false));
    $stmt = $bdd->prepare("INSERT INTO utilisateur (Nom, Prenom, Username, MDP) VALUES (?,?,?,?);");
    $stmt->execute($data);
    if (!$stmt) {
        echo "erreur de requete : $req";
        die;
    }
    header('Location: ../connexion/connexion.php');
    exit();
?>