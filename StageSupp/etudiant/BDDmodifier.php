<?php
try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=web', 'root', '');
}catch (PDOException $e) {
    echo "Connexion echouée : " . $e->getMessage();
}
    if(isset($_POST["Mdp"]) and $_POST["Mdp"] != ""){
        $Mdp=hash('sha512',hash('sha512',$_POST["Mdp"],false),false);
        $data = array($Mdp,$_POST["user"]);
        $stmt = $bdd->prepare("UPDATE utilisateur SET MDP=? WHERE ID=?;");
        $stmt->execute($data);
    }

    if($_POST["delegue"]){

        $nbdroits = 35;
        $droits = "1";
        for($i = 2 ; $i<=$nbdroits ; $i++){
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

        $data=array($droits,$_POST["user"]);
        $stmt = $bdd->prepare("INSERT INTO delegue (droits,ID_Utilisateur) VALUES (?,?);");
        $stmt->execute($data);

    }

    $data = array($_POST["Username"],$_POST["Nom"],$_POST["Prenom"],$_POST["user"]);
    $stmt = $bdd->prepare("UPDATE utilisateur SET Username=? , Nom=? , Prenom=? WHERE ID=?;");
    $stmt->execute($data);
    header('Location:'.$_GET['next']);
    exit();
?>