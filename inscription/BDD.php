<?php

function sqltry($stmt){
    if (!$stmt) {
        echo "erreur de requete : $req";
        die;
    }
}

try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=web', 'root', '');
}catch (PDOException $e) {
    echo "Connexion echouée : " . $e->getMessage();
}
    $data = array($_POST["Nom"],$_POST["Prenom"],$_POST["Username"],hash('sha512',hash('sha512',$_POST["Mdp"],false),false));
    $stmt = $bdd->prepare("INSERT INTO utilisateur (Nom, Prenom, Username, MDP) VALUES (?,?,?,?);");
    $stmt->execute($data);
    sqltry($stmt);


    
    $stmt = $bdd->prepare("SELECT ID FROM utilisateur WHERE Nom=? AND Prenom=? AND Username=? AND MDP=?;");
    $stmt->execute($data);
    $type= $_POST["Type"];
    $rtrn=$stmt->fetch();
    $id=array($rtrn["ID"]);

    if($type == "Etudiant"){
        $prom=array($_POST["Promotion"]);
        $stmt = $bdd->prepare("SELECT ID FROM promotion WHERE Nom=?");
        $stmt->execute($prom);
        $rtrn=$stmt->fetch();
    
        $data=array($rtrn["ID"],$id[0]);
        $stmt = $bdd->prepare("INSERT INTO etudiant (ID_Promotion,ID_Utilisateur) VALUES (?,?);");
        $stmt->execute($data); 
        sqltry($stmt);

    }else{
        if ($type == "Pilote"){
            $stmt = $bdd->prepare("INSERT INTO pilote (ID_Utilisateur) VALUES (?);");
            $stmt->execute($id);
            sqltry($stmt);

        }else{
            if ($type == "Administrateur"){
                $stmt = $bdd->prepare("INSERT INTO administrateur (ID_Utilisateur) VALUES (?);");
                $stmt->execute($id);
                sqltry($stmt);
            }
        }
    }

    if($_POST["delegue"]){

        $nbdroits = 35;
        $droits = "";
        for($i = 1 ; $i<=$nbdroits ; $i++){
            $droit = "SFx".$i;
            if(isset($_POST[$droit])){

                if ($_POST[$droit]){
                    $droits.="1";
                }else{
                    $droits.="0";
                }
            }else{
                $droits.="0";
            }

        }

        $data=array($droits,$id[0]);
        $stmt = $bdd->prepare("INSERT INTO delegue (droits,ID_Utilisateur) VALUES (?,?);");
        $stmt->execute($data);
        sqltry($stmt);

    }



    header('Location: ../connexion/connexion.php');
    exit();
?>