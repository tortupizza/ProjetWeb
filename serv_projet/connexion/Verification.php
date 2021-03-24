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
        session_destroy();
        session_start();
        $stmt=$bdd->prepare("SELECT ID FROM utilisateur WHERE Username = :user AND MDP = :mdp ;");
        $stmt->bindParam(":user", $_POST["Username"]);
        $stmt->bindParam(":mdp", $mdp);
        $stmt->execute();
        $rtrn=$stmt->fetch();
        $_SESSION['ID']=$rtrn["ID"];

        //recherche du type de l'utilisateur connecté
        $stmt = $bdd->prepare("SELECT 1 FROM administrateur WHERE ID_Utilisateur = ? ;");
        $stmt->execute(array($_SESSION['ID']));

        if (!$stmt) {
            echo "erreur de requete : $req";
            die;
        }
        if (!$stmt->fetch()){
            $stmt = $bdd->prepare("SELECT 1 FROM pilote WHERE ID_Utilisateur = ? ;");
            $stmt->execute(array($_SESSION['ID']));
    
            if (!$stmt) {
                echo "erreur de requete : $req";
                die;
            }
            if (!$stmt->fetch()){
                $stmt = $bdd->prepare("SELECT 1 FROM etudiant WHERE ID_Utilisateur = ? ;");
                $stmt->execute(array($_SESSION['ID']));
        
                if (!$stmt) {
                    echo "erreur de requete : $req";
                    die;
                }
                if (!$stmt->fetch()){
                    $_SESSION['type']='rien';
                }else{
                    $_SESSION['type']='etudiant';
                }
            }else{
                $_SESSION['type']='pilote';
            }
        }else{
            $_SESSION['type']='admin';
        }
        $stmt = $bdd->prepare("SELECT droits FROM delegue WHERE ID_Utilisateur = ? ;");
        $stmt->execute(array($_SESSION['ID']));

        if (!$stmt) {
            echo "erreur de requete : $req";
            die;
        }
        $rtrn=$stmt->fetch();
        if($rtrn){
            $_SESSION['droits']=$rtrn["droits"];
        }

        echo "utilisateur $user présent dans la BDD avec l'ID ".$_SESSION['ID']." <br> Vous êtes connecté avec le role :".$_SESSION["type"]."<br> <a href='../inscription/inscription.php' class='tab'> Inscription</a>";
        if (isset($_SESSION['droits'])){
            echo "<br>Tu es délégué avec ces droits : ".$_SESSION['droits'];
        }
        $stmt->closeCursor();
    }
?>