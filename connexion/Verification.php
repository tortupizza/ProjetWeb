<?php
try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=web', 'root', '');
}catch (PDOException $e) {
    echo "Connexion echouée : " . $e->getMessage();
}
    $user = $_POST["Username"];
    $mdp = hash('sha512',hash('sha512',$_POST["Mdp"],false),false);

    $stmt = $bdd->prepare("SELECT 1 FROM utilisateur WHERE Username = :user AND MDP = :mdp ;");
    $stmt->bindParam(":user", $_POST["Username"]);
    $stmt->bindParam(":mdp", $mdp);
    $stmt->execute();
    if (!$stmt) {
        echo "erreur de requete : $req";
        die;
    }
    if (!$stmt->fetch()){
        header('Location: connexion.php?badlogin=1');
        exit();
    }else{
        session_start();
        $stmt=$bdd->prepare("SELECT ID FROM utilisateur WHERE Username = :user AND MDP = :mdp ;");
        $stmt->bindParam(":user", $_POST["Username"]);
        $stmt->bindParam(":mdp", $mdp);
        $stmt->execute();
        $rtrn=$stmt->fetch();
        $_SESSION['ID']=$rtrn["ID"];
        echo "utilisateur $user présent dans la BDD avec l'ID ".$_SESSION['ID']." <br>";
        $stmt->closeCursor();
    }
?>