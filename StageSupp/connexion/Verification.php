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
        header('Location:../connexion?badlogin=1');
        exit();
    }else{
        session_start();
        session_destroy();
        session_start();
        $stmt=$bdd->prepare("SELECT * FROM utilisateur WHERE Username = :user AND MDP = :mdp ;");
        $stmt->bindParam(":user", $_POST["Username"]);
        $stmt->bindParam(":mdp", $mdp);
        $stmt->execute();
        $rtrn=$stmt->fetch();
        $_SESSION['user']=$rtrn["Username"];
        $_SESSION['nom']=$rtrn["Nom"];
        $_SESSION['prenom']=$rtrn["Prenom"];
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

        
        $stmt->closeCursor();
        header('Location: ../homepage');
        exit();
    }
?>